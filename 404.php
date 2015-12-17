<?php

	$rootPath = "./";

	// Includes
	require_once($rootPath."common.php");
	require_once($rootPath.INC_DIR."class.pages.php");

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
	$page["meta"]        = '<script src="'.$page["rootpath"].INC_JQUERY.'jquery.min.js" type="text/javascript"></script>';

	$pages = new Pages();
	
	// Assign Template Values
	$smarty->assign("page", $page);
	$smarty->assign("config", $config);
	$smarty->assign("menu", $pages->GetItems(false, false, "", "", "", " AND {$pages->DbAlias}.page_show = 1 "));

	// Display Template
	$smarty->display("404.tpl");

	$db->sql_close();

?>