<?php

include_once("class.base.php");
define("PHOTO_IMAGE_PATH", $rootPath.FILES_DIR."photos/");

class Photos extends Base
{
	
	public $ItemImagePrefix    = "photo-";
	public $ItemImagePath      = PHOTO_IMAGE_PATH;
	public $ItemImageUrl       = "";
	//public $ItemImageMaxWidth  = 1200;
	//public $ItemImageMaxHeight = 1200;
	public $ItemThumbMaxWidth  = 160;
	public $ItemThumbMaxHeight = 160;
	//public $ItemIconMaxWidth  = 80;
	//public $ItemIconMaxHeight = 80;
	
	public $DbFields = array();
	public $DbKey    = "photo_id";
	public $DbTable  = TABLE_PHOTOS;
	public $DbOrder  = "photo_order";
	public $DbAlias  = "ph";
	
	public function SetItemDbFields()
	{
		$dbField['name'] = 'Описание';
		$dbField['field'] = 'photo_name';
		$dbField['type'] = 'text';
		$dbField['empty'] = true;
		$dbField['default'] = '';
		$dbField['edit'] = true;
		$dbField['show'] = true;
		$dbField['ajax'] = true;
		$this->DbFields[] = $dbField; $dbField = false;

		$dbField['name'] = 'Галерея';
		$dbField['field'] = 'gallery_id';
		$dbField['type'] = 'key';
		$dbField['key_table'] = TABLE_GALLERY;
		$dbField['key_alias'] = 'ga';
		$dbField['key_value'] = 'gallery_name';
		$dbField['empty'] = false;
		$dbField['default'] = 0;
		$dbField['edit'] = true;
		$dbField['show'] = false;
		$dbField['ajax'] = false;
		$this->DbFields[] = $dbField; $dbField = false;
		
		return true;
	}
	
	public function SetAdminConfig()
	{
		$this->ItemConfig['itemName']    = "Фото"; // Item name
		$this->ItemConfig['itemNames']   = "Фото"; // Item plural name
		$this->ItemConfig["adminScript"] = substr($_SERVER['PHP_SELF'], strrpos($_SERVER['PHP_SELF'], "/")+1); // Running file
		$this->ItemConfig["classFile"]   = "class.photos.php"; // Current class file
		$this->ItemConfig["className"]   = get_class($this); // Current class name
		$this->ItemConfig["showImage"]   = true; // Show image
		$this->ItemConfig["imagePath"]   = $this->ItemImageUrl; // Image path
		$this->ItemConfig["adminTpl"]    = "photos.tpl"; // Template file
	}

	public function SaveItemImage($id, $imagePath="")
	{
		$imagePath = $imagePath ? $imagePath : $this->ItemImagePath;
		
		if(isset($_FILES["image"]) && $_FILES["image"]["name"])
		{
			if($fileName = $this->UploadItemImage($_FILES["image"], $this->ItemImagePrefix.$id, $imagePath."original/"))
			{
				$this->ResizeImage($imagePath."original/".$fileName, $imagePath.$fileName, $this->ItemThumbMaxWidth, $this->ItemThumbMaxHeight, true, true, true);
			}
		}
		
		return "";
	}
	
	public function DeleteItemImage($fileName, $imagePath="")
	{
		$imagePath = $imagePath ? $imagePath : $this->ItemImagePath;
		
		if(@unlink($imagePath."original/".$fileName) && @unlink($imagePath.$fileName))
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	
}

?>