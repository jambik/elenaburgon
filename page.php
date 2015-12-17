<?php

	$rootPath = "./";
	
	// Includes
	require_once($rootPath."common.php");
	require_once($rootPath.INC_DIR."class.pages.php");
	require_once($rootPath.INC_DIR."class.settings.php");
	
	// Smarty
	$smarty = new Smarty();
	$smarty->template_dir = SMARTY_TEMPLATES_DIR;
	$smarty->compile_dir  = SMARTY_COMPILE_DIR;
	
	// Page Values
	$page["description"] = "";
	$page["keywords"]    = "";
	$page["title"]       = "";
	$page["onload"]      = "";
	$page["rootpath"]    = $config["folder"];
	$page["tplpath"]     = $page["rootpath"].SMARTY_TEMPLATES_DIR;
	$page["meta"]        = '<script src="'.$page["rootpath"].INC_JQUERY.'jquery.min.js" type="text/javascript"></script>'.
												 "\n\t".'<script src="'.$page["rootpath"].INC_DIR.'swfobject-2.2/swfobject.js" type="text/javascript"></script>'.
												 "\n\t".'<script type="text/javascript">swfobject.embedSWF("book.swf", "ebook", "600", "600", "9.0.0");</script>'.
												 "\n\t".'<script src="'.$page["rootpath"].INC_JQUERY_PLUGINS.'jquery.fancybox-2.1.4/jquery.fancybox.pack.js" type="text/javascript"></script>'.
												 "\n\t".'<link href="'.$page["rootpath"].INC_JQUERY_PLUGINS.'jquery.fancybox-2.1.4/jquery.fancybox.css" type="text/css" rel="stylesheet" />';
	
	$pageId = isset($_GET["page"]) && is_numeric($_GET["page"]) ? intval($_GET["page"]) : false;
	$pageAlias = isset($_GET["alias"]) ? $_GET["alias"] : false;
	
	$pages = new Pages();
	
	if($pageId)
	{
		$item = $pages->GetItem($pageId);
		if($item)
		{
			header("HTTP/1.1 301 Moved Permanently");
			header("Location: /".$item["page_alias"]);
			return;
		}
		else
		{
			header("HTTP/1.1 404 Not Found");
			header("Location: /404.php");
			return;
		}
	}
	
	if($pageAlias)
	{
		if( $pageAlias[strlen($pageAlias)-1] == "/" ) $pageAlias = substr ($pageAlias, 0, strlen($pageAlias)-1);
		$pageItem = $pages->GetItems(false, false, "", "", "", " AND {$pages->DbAlias}.page_alias = '{$pageAlias}' ", true);
		if($pageItem)
		{
			$page["title"] = $pageItem[0]["page_title"] ? $pageItem[0]["page_title"] : $pageItem[0]["page_name"];
			$page["description"] = $pageItem[0]["page_description"];
			$page["keywords"] = $pageItem[0]["page_keywords"];
			$page["content"] = $pageItem[0]["page_text"];
			$page["module"] = $pageItem[0]["page_module"];
			$page["id"] = $pageItem[0]["page_id"];
			
			// Articles
			if($pageItem[0]["page_module"] == 1)
			{
				require_once($rootPath.INC_DIR."class.articles.php");
				$articles = new Articles();
				
				$id = isset($_GET["id"]) && is_numeric($_GET["id"]) ? intval($_GET["id"]) : false;

				if($id)
				{
					$articleItem = $articles->GetItem($id);
					if($articleItem) $page["title"] = $articleItem["article_title"]." - Статьи - ".$config["site_name"];
					$smarty->assign("articleItem", $articleItem);
				}
				else
				{
					$page["title"] = "Статьи";
					$smarty->assign("allarticles", $articles->GetItems(false, false, "", "", "", "", true));
				}
			}
			
			// Gallery
			if($pageItem[0]["page_module"] == 2)
			{
				require_once($rootPath.INC_DIR."class.gallery.php");
				require_once($rootPath.INC_DIR."class.photos.php");

				$gallery = new Gallery();
				$photos = new Photos();
				
				if(isset($_GET["gallery"]))
				{
					$galleryId = intval($_GET["gallery"]);
					$smarty->assign("photos", $photos->GetItems(false, false, "", "", "", " AND {$photos->DbAlias}.gallery_id = {$galleryId} ", true));
					$selectedGallery = $gallery->GetItem($galleryId);
					$page["title"] = $selectedGallery["gallery_name"]." - Фотогалерея - ".$config["site_name"];
					$smarty->assign("selectedGallery", $selectedGallery);
				}
				else
				{
					$galleryItems = $gallery->GetItems(false, false, "", "", "", "", true);
					if($galleryItems)
					{
						foreach($galleryItems as $key=>$value)
						{
							$galleryItems[$key]["photos"] = $photos->GetItems(1, 7, "", "", "", " AND {$photos->DbAlias}.gallery_id = {$value['gallery_id']} ", true);
						}
						$smarty->assign("galleries", $galleryItems);
					}
				}
			}
		}
		else
		{
			header("HTTP/1.1 404 Not Found");
			header("Location: /404.php");
			return;
		}
	}
	
	// Send message
	if(isset($_POST["submit"]))
	{
		include_once($rootPath.INC_PHPMAILER."class.phpmailer.php");

		$smartyMsg = new Smarty();
		$smartyMsg->template_dir = SMARTY_TEMPLATES_DIR."email/";
		$smartyMsg->compile_dir  = SMARTY_COMPILE_DIR."email/";
		$smartyMsg->assign("config", $config);
		$smartyMsg->assign("post", $_POST);

		$bodyMessage = isset($_POST["template"]) ? $smartyMsg->fetch($_POST["template"]) : $smartyMsg->fetch("message.tpl");

		$mail = new PHPMailer();

		$mail->CharSet    = "utf-8";
		$mail->FromName   = $config["site_name"];
		$mail->Subject    = isset($_POST["subject"]) ? $_POST["subject"] : "Письмо с сайта";
		$mail->Body       = $bodyMessage;

		if($settings["email_request"])
		{
			$emails = explode(',', $settings["email_request"]);
			foreach($emails as $value)
			{
				$mail->AddAddress($value);

				if($mail->Send())
				{
					$page["info"] = "Письмо отправлено";
				}
				else
				{
					$page["error"] = "Ошибка при отправке письма";
					return false;
				}

				$mail->ClearAddresses();
			}
		}
	}
	
	// Assign Template Values
	$smarty->assign("page", $page);
	$smarty->assign("config", $config);
	$smarty->assign("settings", $settings);
	$smarty->assign("menu", $pages->GetItems(false, false, "", "", "", " AND {$pages->DbAlias}.page_show = 1 "));
	
	// Display Template
	$smarty->display("page.tpl");
	
	$db->sql_close();
	
?>