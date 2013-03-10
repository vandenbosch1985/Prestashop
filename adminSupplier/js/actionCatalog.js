//Global Variables for save the actions in the catalog
var actions = new Array();
var actionsProduct = new Array();
var actionsNewCategory = new Array();
var cont=0;

//Save the action: Move a product from a category to Draft
function saveFromCategoryToDraft(idProducto)
{
	var strActions=$('#actions').val();
	var strActionsIdProduct=$('#actionsIdProduct').val();
	var strActionsCategory = $('#actionsCategory').val();
	
	strActions = strActions+"FromCategoryToDraft,";
    strActionsIdProduct = strActionsIdProduct+idProducto+",";
    strActionsCategory = strActionsCategory+" ,";
	
	$('#actions').val(strActions);
	$('#actionsIdProduct').val(strActionsIdProduct);
	$('#actionsCategory').val(strActionsCategory);
}


//Save the action: Move a product from the active region to Draft
function saveFromActiveToDraft(idProducto)
{
	
	var strActions=$('#actions').val();
	var strActionsIdProduct=$('#actionsIdProduct').val();
	var strActionsCategory = $('#actionsCategory').val();
	
	strActions = strActions+"FromActiveToDraft,";
    strActionsIdProduct = strActionsIdProduct+idProducto+",";
    strActionsCategory = strActionsCategory+" ,";
	
	$('#actions').val(strActions);
	$('#actionsIdProduct').val(strActionsIdProduct);
	$('#actionsCategory').val(strActionsCategory);
}


//Save the action: Restore From Draft to a Category
function restoreFromDraft(idProducto)
{
	
	var strActions=$('#actions').val();
	var strActionsIdProduct=$('#actionsIdProduct').val();
	var strActionsCategory = $('#actionsCategory').val();
	
	strActions = strActions+"RestoreProductFromDraft,";
    strActionsIdProduct = strActionsIdProduct+idProducto+",";
    strActionsCategory = strActionsCategory+" ,";
	
	$('#actions').val(strActions);
	$('#actionsIdProduct').val(strActionsIdProduct);
	$('#actionsCategory').val(strActionsCategory);
	
}


function saveMoveCategoryFromAnotherCategory(idProducto, newCategory)
{
	
	var strActions=$('#actions').val();
	var strActionsIdProduct=$('#actionsIdProduct').val();
	var strActionsCategory = $('#actionsCategory').val();
	
	strActions = strActions+"MoveCategory,";
    strActionsIdProduct = strActionsIdProduct+idProducto+",";
    strActionsCategory = strActionsCategory+newCategory+",";
	
	$('#actions').val(strActions);
	$('#actionsIdProduct').val(strActionsIdProduct);
	$('#actionsCategory').val(strActionsCategory);
}
