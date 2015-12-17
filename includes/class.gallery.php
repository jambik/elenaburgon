<?php

include_once("class.base.php");

class Gallery extends Base
{
	
	public $DbFields = array();
	public $DbKey    = "gallery_id";
	public $DbTable  = TABLE_GALLERY;
	public $DbAlias  = "ga";
	public $DbOrder  = "gallery_order";
	
	public function SetItemDbFields()
	{
		$dbField['name'] = 'Название';
		$dbField['field'] = 'gallery_name';
		$dbField['type'] = 'text';
		$dbField['empty'] = false;
		$dbField['default'] = '';
		$dbField['edit'] = true;
		$dbField['show'] = true;
		$dbField['ajax'] = true;
		$this->DbFields[] = $dbField; $dbField = false;
		
		$dbField['name'] = 'Описание';
		$dbField['field'] = 'gallery_text';
		$dbField['type'] = 'html';
		$dbField['empty'] = true;
		$dbField['default'] = '';
		$dbField['edit'] = true;
		$dbField['show'] = false;
		$dbField['ajax'] = false;
		$this->DbFields[] = $dbField; $dbField = false;
		
		return true;
	}
	
	public function SetAdminConfig()
	{
		$this->ItemConfig['itemName']    = "Галерея"; // Item name
		$this->ItemConfig['itemNames']   = "Галереи"; // Item plural name
		$this->ItemConfig["adminScript"] = substr($_SERVER['PHP_SELF'], strrpos($_SERVER['PHP_SELF'], "/")+1); // Running file
		$this->ItemConfig["classFile"]   = "class.gallery.php"; // Current class file
		$this->ItemConfig["className"]   = get_class($this); // Current class name
		$this->ItemConfig["adminTpl"]    = "gallery.tpl"; // Template file
	}
	
}

?>