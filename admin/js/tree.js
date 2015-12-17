//tree object
var tree;
//xml loader to load details from database
var xmlLoader = new dtmlXMLLoaderObject(doLoadDetails,window);
//default label for new item
var newItemLabel = "New Item";
//id for new (unsaved) item
var newItemId = "-1";
//ckeditor instance for description
var ckeditorDesc = false;

//load tree on page
function loadTree()
{
	tree = new dhtmlXTreeObject("treebox","100%","100%",0);
	tree.setImagePath(dhtmlXTreeImgPath);
	tree.enableDragAndDrop(true);
	tree.setDragHandler(doOnBeforeDrop);
	tree.setOnClickHandler(doOnSelect);
	tree.enableTreeImages(false);
	tree.loadXML("treeprocessor.php?action=loadtree&table="+tableName);
	status();
}

//add new node next to currently selected (or the first in tree)
function addNewPeer()
{
	clearPhoto()
	
	if(tree.getLevel(newItemId)!=0) //check if unsaved item already exists
	{
		alert("New Item (unsaved) already exists")
		return false;
	}
	
	var selectedId = tree.getSelectedItemId();
	if(selectedId!="")
	{
		tree.insertNewNext(selectedId,newItemId,newItemLabel,"","","","","SELECT,CALL",0);
	}
	else
	{
		tree.insertNewItem(0,newItemId,newItemLabel,"","","","","SELECT,CALL",0)
	}
}

//add new child node to selected item (or the first item in tree)
function addNewChild()
{
	clearPhoto()
	
	if(tree.getLevel(newItemId)!=0) //check if unsaved item already exists
	{
		alert("New Item (unsaved) already exists")
		return false;
	}
	
	var selectedId = tree.getSelectedItemId();
	if(selectedId!="")
	{
		tree.insertNewItem(selectedId,newItemId,newItemLabel,"","","","","SELECT,CALL",0)
	}
	else
	{
		tree.insertNewItem(0,newItemId,newItemLabel,"","","","","SELECT,CALL",0)
	}
}

//delete item (from database)
function deleteNode()
{
	status(true);
	var f = document.forms["detailsForm"];
	if(tree.getSelectedItemId()!=newItemId) //delete node from db
	{
		if(!confirm("Are you sure you want to delete selected node?"))
		{
			return false;
		}
		f.action = "treeprocessor.php?action=delete&table="+tableName;
		f.submit();
	}
	else //delete unsaved node
	{
		doDeleteTreeItem(newItemId);
	}
}

//remove item from tree
function doDeleteTreeItem(id)
{
	document.getElementById("details").style.visibility = "hidden";
	var pId = tree.getParentId(id);
	tree.deleteItem(id);
	if(pId!="0")
	{
		tree.selectItem(pId,true);
	}
	status();
}

//save item
function saveItem()
{
	status(true);
	var f = document.forms["detailsForm"];
	f.action = "treeprocessor.php?action=save&table="+tableName;
	f.submit();
}

//save moved (droped) item to db. Cancel drop if save failed or item is new
function doOnBeforeDrop(id,parentId)
{
	if(id==newItemId)
	{
		return false;
	}
	else
	{
		status(true);
		var dropSaver = new dtmlXMLLoaderObject(null,null,false);//sync mode
		dropSaver.loadXML("treeprocessor.php?action=drop&id="+id+"&parent_id="+parentId+"&table="+tableName);
		var root = dropSaver.getXMLTopNode("succeedded");
		var id = root.getAttribute("id");
		if(id==-1)
		{
			alert("Save failed");
			status();
			return false;
		}
		else
		{
			if(tree.getSelectedItemId()==id)//update details (really need only parent id)
			{
				loadDetails(id);
			}
		}
		status();
		return true;
	}
}

//update item
function doUpdateItem(id, label)
{
	var f = document.forms["detailsForm"];
	f.item_id.value = id;
	tree.changeItemId(tree.getSelectedItemId(),id);
	tree.setItemText(id,label);
	tree.setItemColor(id,"black","white");
	status();
}

//what to do when item selected
function doOnSelect(itemId)
{
	document.getElementById("item_photo").value = "";
	if(itemId!=newItemId)
	{
		if(tree.getLevel(newItemId)!=0)
		{
			if(confirm("Do you want to save changes?"))//save changes to new item
			{
				tree.selectItem(newItemId,false)
				saveItem();
				return;
			}
			tree.deleteItem(newItemId);
		}	
	}
	else //set color to new item label
	{
		tree.setItemColor(itemId,"red","pink")
	}
	
	loadDetails(itemId);//load details for selected item
}

//send request to the server to load details
function loadDetails(id)
{
	status(true);
	xmlLoader.loadXML("treeprocessor.php?action=loaddetails&id="+id+"&table="+tableName);
}

//populate form of details
function doLoadDetails(obj)
{
	var f = document.forms["detailsForm"];
	var root = xmlLoader.getXMLTopNode("details")
	var id = root.getAttribute("id");
	document.getElementById("details").style.visibility = "visible";
	if(id==newItemId)
	{
		f.item_nm.value = tree.getItemText(id);
		f.item_desc.value = "";
	}
	else
	{
		// Name
		f.item_nm.value = root.getElementsByTagName("name")[0].firstChild.nodeValue;
		
		//ckeditorDesc
		if(root.getElementsByTagName("desc")[0].firstChild!=null)
		{
			if(ckeditorDesc)
			{
				ckeditorDesc.setData(root.getElementsByTagName("desc")[0].firstChild.nodeValue);
			}
			else
			{
				f.item_desc.value = root.getElementsByTagName("desc")[0].firstChild.nodeValue;
				ckeditorDesc = CKEDITOR.replace("textarea");
			}
		}
		else
		{
			if(ckeditorDesc)
			{
				ckeditorDesc.setData("");
			}
			else
			{
				f.item_desc.value = "";
				ckeditorDesc = CKEDITOR.replace("textarea");
			}
		}
		
		if(root.getElementsByTagName("photo")[0].firstChild!=null)
		{
			document.getElementById("photoContainer").innerHTML = '<img src="'+categoryImagePath+root.getElementsByTagName("photo")[0].firstChild.nodeValue+'" /><div><a target="actionframe" href="'+"treeprocessor.php?action=deletephoto&id="+id+'&table='+tableName+'">удалить</a></div>';
		}
		else
		{
			document.getElementById("photoContainer").innerHTML = '<div>Нет фото</div>';
		}
	}
	f.item_id.value = id
	f.item_order.value = get_order(id);
	f.item_parent_id.value = tree.getParentId(id);
	status();
}

function clearPhoto()
{
	document.getElementById("photoContainer").innerHTML = "";
}

function get_order(itemId)
{
	var z=tree._globalIdStorageFind(itemId);
	var z2=z.parentObject;
	for (var i=0; i<z2.childsCount; i++)
	{
		if (z2.childNodes[i]==z) return i;
	}
	return -1;
}

//show status of request on page
function status(fl)
{
	var d = document.getElementById("showproc");
	if(fl)
	{
		d.style.display = "";
	}
	else
	{
		d.style.display = "none";
	}
}