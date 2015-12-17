<?php

	$rootPath = "../";
	
	require_once($rootPath."common.php");
	require_once($rootPath.INC_DIR."class.admin.php");
	require_once($rootPath.INC_DIR."class.photos.php");
	require_once($rootPath.INC_DIR."class.gallery.php");
	
	// Admin
	$admin = new Admin();
	if(!$admin->Admin) return "";
	
	// Smarty
	$smarty = new Smarty();
	$smarty->template_dir = $rootPath.ADMIN_TPL_DIR;
	$smarty->compile_dir  = $rootPath.SMARTY_COMPILE_DIR."admin/";
	
	$gallery = isset($_GET["gallery"]) && is_numeric($_GET["gallery"]) ? intval($_GET["gallery"]) : false;
	
	// Items Class
	$items = new Photos();
	
	// Assign Page properties
	$page["rootpath"] = $config["folder"];
	$page["admpath"]  = $page["rootpath"].ADMIN_DIR;
	$page["incpath"]  = $page["rootpath"].INC_DIR;
	$page["title"]    = "Администрирование - ".$items->ItemConfig["itemNames"];
	$page["meta"]     = "\n\t".'<script src="/'.ADMIN_DIR.'js/functions.js" type="text/javascript"></script>';
	$page["onload"]   = "";

	if($gallery)
	{
		$galleryObj = new Gallery();
		$smarty->assign("gallery", $galleryObj->GetItem($gallery));
		$where = $gallery ? " AND {$items->DbAlias}.gallery_id = $gallery " : "";
	}
	
	if(!isset($_GET["quantity"])) $_GET["quantity"] = 100;
	
	### Include controller file ###
	include_once("base.php");
	
	$page["info"]  = $items->Info;
	$page["error"] = $items->Error;
	
	$smarty->assign("page", $page);
	$smarty->assign("config", $config);
	
	$smarty->display($items->ItemConfig["adminTpl"]);
	
	$db->sql_close();

?>