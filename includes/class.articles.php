<?php

include_once("class.base.php");

class Articles extends Base
{
	
	public $DbFields = array();
	public $DbKey    = "article_id";
	public $DbTable  = TABLE_ARTICLES;
	public $DbAlias  = "ar";
	public $DbOrder  = "article_order";
	
	public function SetItemDbFields()
	{
		$dbField['name'] = 'Название';
		$dbField['field'] = 'article_title';
		$dbField['type'] = 'text';
		$dbField['empty'] = false;
		$dbField['default'] = '';
		$dbField['edit'] = true;
		$dbField['show'] = true;
		$dbField['ajax'] = true;
		$this->DbFields[] = $dbField; $dbField = false;
		
		$dbField['name'] = 'Текст';
		$dbField['field'] = 'article_text';
		$dbField['type'] = 'html';
		$dbField['empty'] = true;
		$dbField['default'] = '';
		$dbField['edit'] = true;
		$dbField['show'] = true;
		$dbField['ajax'] = true;
		$this->DbFields[] = $dbField; $dbField = false;
		
		return true;
	}
	
	public function SetAdminConfig()
	{
		$this->ItemConfig['itemName']    = "Статья"; // Item name
		$this->ItemConfig['itemNames']   = "Статьи"; // Item plural name
		$this->ItemConfig["adminScript"] = substr($_SERVER['PHP_SELF'], strrpos($_SERVER['PHP_SELF'], "/")+1); // Running file
		$this->ItemConfig["classFile"]   = "class.articles.php"; // Current class file
		$this->ItemConfig["className"]   = get_class($this); // Current class name
		$this->ItemConfig["adminTpl"]    = "base.tpl"; // Template file
	}

}

?>