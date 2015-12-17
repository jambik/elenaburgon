function AddParamLine(el)
{
	//alert($(el).prev().html());
	$(el).before($(el).prev().clone());
	
}

function AddParam()
{
	$("#params_area").before($("#param_tpl").html());
	var nextId = $("#params_area").parent().find(".param_box").length;
	$("#params_area").prev().find(':hidden').each(function(index) {
    $(this).val(nextId);
	});
}

function AddOption()
{
	$("#options_area").before($("#option_tpl").html());
}

var CodeMirrorEditor;

function LoadCodeMirror(elementId)
{
	CodeMirrorEditor = CodeMirror.fromTextArea(document.getElementById(elementId), {mode: "css", lineNumbers: true, lineWrapping: true});
}

function OnCssCodeSubmit()
{
	CodeMirrorEditor.save();
	return true;
}