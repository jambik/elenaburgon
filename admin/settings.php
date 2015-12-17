<?php

	$rootPath = "../";
	
	require_once($rootPath."common.php");
	require_once($rootPath.INC_DIR."class.admin.php");
	require_once($rootPath.INC_DIR."class.settings.php");
	require_once($rootPath.INC_CKEDITOR."ckeditor.php");
	
	// Admin
	$admin = new Admin();
	if(!$admin->Admin) return "";
	
	// Smarty
	$smarty = new Smarty();
	$smarty->template_dir = $rootPath.ADMIN_TPL_DIR;
	$smarty->compile_dir  = $rootPath.SMARTY_COMPILE_DIR."admin/";
	
	// Assign Page properties
	$page["rootpath"] = $config["folder"];
	$page["admpath"]  = $page["rootpath"].ADMIN_DIR;
	$page["incpath"]  = $page["rootpath"].INC_DIR;
	$page["title"]    = "Администрирование - Настройки";
	$page["meta"]     = "\n\t".'<script src="/'.INC_JQUERY.'jquery.js" type="text/javascript"></script>';
	
	// Settings
	$settings = new Settings();
	
	// If Settings has submitted
	if($settings->SettingsSubmitted())
	{
		$settings->SaveSettings();
	}
	
	$settingsItem = $settings->GetSettings();
	
	// Set Template Variables
	$smarty->assign("settings", $settingsItem);
	
	$page["info"]  = $settings->Info;
	$page["error"] = $settings->Error;
	
	$smarty->assign("page", $page);
	$smarty->assign("config", $config);
	
	$smarty->display('settings.tpl');
	
	$db->sql_close();

?>