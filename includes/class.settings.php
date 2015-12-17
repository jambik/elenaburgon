<?php

class Settings
{
	
	var $Valid             = true;
	var $Error             = "";
	var $Info              = "";
	
	/**
	 * Constructor.
	 */
	public function Settings()
	{
		
	}
	
	public function SettingsSubmitted()
	{
		return (isset($_POST["submit_settings"]))? true: false;
	}
	
	public function SaveSettings()
	{
		global $db;
		
		$updateSql = "";
		
		foreach($_POST as $key=>$value)
		{
			if($key != "submit_settings")
			{
				$updateSql .= "$key = '$value',";
			}
		}
		$updateSql = substr($updateSql, 0, strlen($updateSql)-1);
		
		$sql = "UPDATE ".TABLE_SETTINGS."
						SET $updateSql
						WHERE settings_id = 1";
		if(!$result = $db->sql_query($sql))
		{
			$this->SetError("Ошибка при обновлении настроек", __FILE__, __LINE__, $db->sql_error());
			return false;
		}
		else
		{
			$this->SetInfo("Настройки сохранены");
			return true;
		}
		
		return false;
	}
	
	public function GetSettings($settingsId = 1)
	{
		global $db;
		
		$sql = "SELECT *
						FROM ".TABLE_SETTINGS."
						WHERE settings_id = $settingsId";
		if(!$result = $db->sql_query($sql))
		{
			$this->SetError("Ошибка при выборе настроек", __FILE__, __LINE__, $db->sql_error());
			return false;
		}
		else
		{
			if($db->sql_numrows($result))
			{
				$settings = $db->sql_fetchrow($result);
				$db->sql_freeresult($result);
				return $settings;
			}
		}
		
		return false;
	}
	
	public function SetError($_error = "", $_file = "", $_line = "", $_sqlError = false)
	{
		$this->Valid = false;
		$error = "<div>";
		
		if($_error != "") $error .= $_error;
		if($_file != "" || $_line != "") $error .= " (File: ".$_file.", Line: ".$_line.")";
		if($_sqlError) $error .= " - Error: ".$_sqlError["message"]." (".$_sqlError["code"].")";		
		
		$error .= "</div>";
		$this->Error .= $error;
	}
	
	public function SetInfo($_info = "")
	{
		$info = "<div>";
		
		if($_info != "") $info .= $_info;
		
		$info .= "</div>";
		$this->Info .= $info;
	}
	
}

$settingsObj = new Settings();
$settings = $settingsObj->GetSettings();

?>