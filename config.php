<?php

//	if(strpos($_SERVER['HTTP_HOST'], ".ru"))
//	{
		// Mysql - remote
		$dbType = "mysqli";
		$dbHost = "localhost";
		$dbName = "elenaburgon";
		$dbUser = "elenaburgon";
		$dbPass = "xmvK8eH7URRbEAx3";

		$config["folder"] = "/";
//	}
//	else
//	{
//		// Mysql - local
//		$dbType = "mysqli";
//		$dbHost = "localhost";
//		$dbName = "elenaburgon";
//		$dbUser = "root";
//		$dbPass = "root";
//
//		$config["folder"] = "/";
//	}

	$config["admin_group"][1] = "Администратор";
	$config["admin_group"][2] = "Модератор";
	
	$config["log_status"][0] = "<span style='color:red;'>Ошибка</span>";
	$config["log_status"][1] = "<span style='color:green;'>Инфо</span>";
	
	$config["modules"][1] = "Статьи";
	$config["modules"][2] = "Фотогалерея";

	$config["site_name"] = "ElenaBurgon";
	
?>