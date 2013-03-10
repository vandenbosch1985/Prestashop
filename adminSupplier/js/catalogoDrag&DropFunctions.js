  function handleDragStart(e) {
  // Target (this) element is the source node.
  this.style.opacity = '0.4';

  dragSrcEl = this;
  e.dataTransfer.effectAllowed = 'move';
  e.dataTransfer.setData('text/html', this.innerHTML);
}




function handleDragOver(e) {
  if (e.preventDefault) {

    e.preventDefault(); // Necessary. Allows us to drop.
  }

  e.dataTransfer.dropEffect = 'move';  // See the section on the DataTransfer object.

  return false;
}

function handleDragEnter(e) {
  // this / e.target is the current hover target.
  this.classList.add('over');
}

function handleDragLeave(e) {
  this.classList.remove('over');  // this / e.target is previous target element.
}

function handleDrop(e) {
 // this/e.target is current target element.
  if (e.stopPropagation) {
    e.stopPropagation(); // Stops some browsers from redirecting.
  }

  // Don't do anything if dropping the same column we're dragging.

  if (dragSrcEl != this) {

	  if ( dragSrcEl.draggable ) //If is a draggable element. do the drag
	  {
		  
		  var deleteLink="";

		  //******************************************************************************************************//
		  //Action for save the movement		  
		  var actionIdProductoAux = dragSrcEl.parentNode.innerHTML;
		  actionIdProductoAux = actionIdProductoAux.substring(actionIdProductoAux.indexOf('editar(')+7,actionIdProductoAux.indexOf('getDeleteProduct') );
		  actionIdProductoAux = actionIdProductoAux.substr(0, actionIdProductoAux.indexOf(')'));
  		  //******************************************************************************************************//

		  // this.innerHTML has the destiny source code
  		  //Delete the product from the exist category if is there		  
		  var cleanName = dragSrcEl.innerHTML;
		  cleanName = deleteProductFromExistCategory(cleanName);
		  var id="Category"+cleanName.replace(" ","_");
		 		  
		  //Insert the product in the Category
		  var resultInsert = new Array(2);
		  resultInsert=insertproductInCategory(this.innerHTML,dragSrcEl.innerHTML,actionIdProductoAux,id);
		  title = resultInsert[0];
		  idHeaderCategory = resultInsert[1];
		  Categoria = resultInsert[2];
		  
		  //Delete the product from the Draft if come from a category
		  deleteProductFromDraftIfComeFromCategory(dragSrcEl.innerHTML);		  		  	  
		  
		  //Delete the product from the draft if come from active products
		  var miarray=deleteProductFromDraftIfComeFromActiveProducts(dragSrcEl.innerHTML);		 
		  deleteLink=miarray[0];
		  productPrice = miarray[1];
		 
		  //Insert the category in actve products region
		  insertCategoryInActiveList(cleanName,deleteLink,title,productPrice);
		  
		  dragSrcEl=null;
		    var cols = document.querySelectorAll('#columns .column');
[].forEach.call(cols, function(col) {
  col.addEventListener('dragstart', handleDragStart, false);
  col.addEventListener('dragenter', handleDragEnter, false)
  col.addEventListener('dragover', handleDragOver, false);
  col.addEventListener('dragleave', handleDragLeave, false);
  col.addEventListener('drop', handleDrop, false);
  col.addEventListener('dragend', handleDragEnd, false);
}); 
	  }
  }

  return false;
}


function insertCategoryInActiveList(cleanName,deleteLink,title,productPrice)
{
		var Identity=title;
		Identity = Identity.substr(Identity.indexOf('id="')+4, Identity.substr(Identity.indexOf('id="')+4).indexOf('"'));
		
		
		//Pregunto si ya existe en active products									  
		  var strActive =$('#mainActiveProducts').html();
		  cleanName=cleanName.replace('#Draft','');
		  cleanName = cleanName.replace(" ","_").replace(" ","_");
		  cleanName = cleanName.replace('\n','');
		  cleanName = cleanName.replace(' ','').replace(' ','').replace(' ','');
		  cleanName = cleanName.replace(' ','').replace(' ','').replace(' ','');
		  var posInputPos = cleanName.indexOf('<input');
		  cleanName = cleanName.substr(0,posInputPos);
		  
		  //Check if the product exist in the active products
		  var newAux=dragSrcEl.innerHTML;
		  
		  var posImg=newAux.indexOf('<img');
		  var posImgEnd=newAux.indexOf('>')+1;
		  var urlImg=newAux.substr(posImg,posImgEnd);
		  newAux = newAux.replace(urlImg,"");		  		  		  
		  
		  newAux =newAux.replace('<header class="prod_head">','');		  		  
		  newAux = newAux.replace('</header>','');
		  newAux = newAux.replace('<header style="background:white;margin-left:-100px;">',''); 
		  newAux = newAux.replace('</header>','');		  		  
		  var posPrice = newAux.indexOf('<p');
		  var substringDeletePrice = newAux.substr(posPrice, newAux.indexOf('/p>'));
		  newAux = newAux.replace(substringDeletePrice,"");

		  newAux = newAux.replace(" ","_").replace(" ","_");
		  newAux = newAux.replace(" ","_").replace(" ","_");;
		  newAux = newAux.replace(" ","").replace(" ","").replace(" ","").replace(" ","").replace(" ","").replace(" ","").replace(" ","").replace(" ","");;
  		  var oldAux = newAux;
		  newAux=newAux.replace('#Draft','');
		  newAux = newAux.replace('\n','');
		  newAux = newAux.substr(0,newAux.indexOf('<input') );
		  newAux = newAux.replace(' ','').replace(' ','').replace(' ','');
		  
		 //Delete input from title
		 title = title.substr(0,title.indexOf('<input'));		 
			var exist="";

			
			
		  if (newAux != "")
		     {
				 exist = strActive.indexOf("active"+Identity);
				 }
			else
			{
				exist = strActive.indexOf("active"+oldAux);
				}
				
		if (newAux=="")
				newAux  = oldAux.replace(" ","_");		
		  
		  
		  
		  if ( exist == -1 ) //Not exist, so insert the new product
		  {						
		  
		  var strNewActive = "<div id='active"+Identity+"' title='"+Identity+"' class='active_prod'><div class='column' draggable='true' style='margin-bottom:20px;' id='active'>"+urlImg+"<header class='prod_head'>"+title+"<input id='"+Identity+"' type='hidden' value='"+idHeaderCategory+"' title='"+Categoria.replace("_"," ")+"'/></header><p id='categoryName' style='color:#000;'>"+Categoria.replace("_"," ")+"</p><p id='productPrice' style='color:#000;'>"+$(productPrice[0]).html()+"</p></div><img src='img/tilde.png' width='22' height='17' onclick='removeToDraftFromActive(this.parentNode);' class='tilde' onmouseover='changeIconTilde();'/> <img src='img/editar.png' width='23' height='18' onclick='' style='margin-top:15px;' /><img src='img/papeleraReciclaje.gif' width='23' height='22' onclick='"+deleteLink+"' style='margin-top:15px;' /></div>";
		  strActive = strActive + strNewActive;
		  $('#mainActiveProducts').html(strActive);
		  }
		  else
		  {

		  //If exist the product change the category						  
		  var price = $('#active'+Identity+' p')[1].innerHTML;
		  var categoryNow = $('#active'+Identity+' p')[0].innerHTML;
		  var strNow1 = "<p style='color:#000;' id='categoryName'>"+idHeaderCategory.replace("_"," ").replace("categoryMain","")+"</p>";
		  var strNow2 = "<p style='color:#000;' id='productPrice'>"+price+"</p>";
		  
		  $( $('#active'+Identity+' p')[0] ).html(idHeaderCategory.replace("_"," ").replace("categoryMain",""));
		  $( $('#active'+Identity+' p')[1] ).html(price);
		
		  }
}


function deleteProductFromDraftIfComeFromActiveProducts(drag_InnerHTML)
{
		  var cleanName = drag_InnerHTML;
		  
		  var posImg=cleanName.indexOf('<img');
		  var posImgEnd=cleanName.indexOf('>');
		  cleanName = cleanName.replace(cleanName.substr(posImg,posImgEnd+1),"");		  		  		  
		  cleanName =cleanName.replace('<header class="prod_head">','');
		  cleanName = cleanName.replace('</header>','');
		  
		  cleanName = cleanName.replace('<header style="background:white;margin-left:-100px;">',''); 
		  cleanName = cleanName.replace('</header>','');
		  
		  cleanName = cleanName.replace(" ","_").replace(" ","_");
		  cleanName = cleanName.substr(0,cleanName.indexOf('<') );
		  
		  
		  if ( $(cleanName).find('p')[1] != undefined )
			productPrice=$(cleanName).find('p')[1].innerHTML;
		  
		  cleanName='#'+'Draft'+ cleanName;	  
		  
		  if ( $( $(cleanName).find("img")[2] ).attr("onclick") != null )
			  deleteLink = $( $(cleanName).find("img")[2] ).attr("onclick");		
		  else
			  deleteLink ="";
		
		  $(cleanName).remove()
		  
		  var miarray = new Array(2);
		  miarray[0]= deleteLink;
		  miarray[1]= productPrice;
		  return miarray;
}

function deleteProductFromDraftIfComeFromCategory(drag_innerHTML)
{
		  var cleanName = drag_innerHTML;	
		  
		  var posImg=cleanName.indexOf('<img');
		  var posImgEnd=cleanName.indexOf('>');
		  cleanName = cleanName.replace(cleanName.substr(posImg,posImgEnd+1),"");		  		  		  
		  cleanName =cleanName.replace('<header class="prod_head">','');		  		  
		  cleanName = cleanName.replace('</header>','');
		  cleanName = cleanName.replace('<header style="background:white;margin-left:-100px;">','');
		  cleanName = cleanName.replace('</header','');
		  		
		  var Identity=cleanName;
		  Identity = Identity.substr(Identity.indexOf('id="')+4, Identity.substr(Identity.indexOf('id="')+4).indexOf('"'));
		  
		  
		  var pos =cleanName.indexOf('<');
		  if (pos!=-1)
		  {
		  cleanName=cleanName.substr(0,pos);
		  cleanName = cleanName.replace(" ","_").replace(" ","_");
		  cleanName = cleanName.replace(" ","").replace(" ","").replace(" ","").replace(" ","").replace(" ","").replace(" ","").replace(" ","").replace(" ","");
		  cleanName =cleanName.replace(" ","").replace(" ","").replace(" ","").replace(" ","").replace(" ","").replace(" ","").replace(" ","").replace(" ","").replace(" ","").replace(" ","").replace(" ","").replace(" ","").replace(" ","").replace(" ","").replace(" ","").replace(" ","");
		   cleanName=cleanName.replace('\n','');
		   cleanName = cleanName.replace('undefined','');
		  }
		  cleanName = cleanName.replace(" ","_").replace(" ","_");
		  cleanName = cleanName.replace(" ","").replace(" ","").replace(" ","").replace(" ","").replace(" ","").replace(" ","").replace(" ","").replace(" ","");
		  cleanName=cleanName.replace('\n','');
		  cleanName='#'+'Draft'+ cleanName;
		  cleanName= cleanName.replace(" ","");			  
		  
		  if ( $(cleanName).find('p')[0] != undefined )
			productPrice=$(cleanName).find('p')[0].innerHTML;
		  
		 if ( $( $(cleanName).find("img")[2] ).attr("onclick") != null )
			  deleteLink = $( $(cleanName).find("img")[2] ).attr("onclick");		
		  		  
		  $('#'+'Draft'+Identity).remove();
}

function insertproductInCategory(this_InnerHTML,drag_InnerHTML,actionIdProductoAux,id)
{
		  var destiny = this_InnerHTML;
		  var pos =destiny.indexOf('id="categoryMain')+16;
		  var posFin = destiny.substr(pos).indexOf('"');
		  var Categoria = destiny.substr(pos,posFin);
		  var idHeaderCategory="categoryMain"+destiny.substr(pos,posFin);		 
		  
		  var cleanName = drag_InnerHTML;
		  
		  var posImg=cleanName.indexOf('<img');
		  var posImgEnd=cleanName.indexOf('>');
		  cleanName = cleanName.replace(cleanName.substr(posImg,posImgEnd+1),"");		  		  		  
		  cleanName =cleanName.replace('<header class="prod_head">','');
		  cleanName = cleanName.replace('</header>','');
		   cleanName = cleanName.replace('<header style="background:white;margin-left:-100px;">',''); 
		  cleanName = cleanName.replace('</header>','');
		  var intermediate = cleanName;
		  if ( cleanName.indexOf('<input')!= -1 )
		  {
		  var title = cleanName.substr(0,cleanName.indexOf('<input') );
		  cleanName = cleanName.replace(" ","_").replace(" ","_");
		  title = title.replace("\n","").replace("_","").replace("_","").replace("_","").replace("_","");
		  }
		  else
		    title = cleanName;
		  	
			//Delete the P tag: Category and Price
		  var posTagP = intermediate.indexOf('<p');	
		  var p=intermediate.substr(posTagP, intermediate.indexOf('/p>'));		  
		  intermediate = intermediate.replace(p,"");		   		  
		  posTagP = intermediate.indexOf('<p');	
		  p=intermediate.substr(posTagP, intermediate.indexOf('/p>'));		  		  
		  intermediate = intermediate.replace(p,"");		   
		  title = intermediate;
		  
		  
		 //*****************************************************************************************//
		 //Get the category that the product and call the function to save the movement
		  saveMoveCategoryFromAnotherCategory(actionIdProductoAux, idHeaderCategory.replace("categoryMain",""))
		  //***************************************************************************************//
		  
		  
		  var str = $("#"+idHeaderCategory)[0].innerHTML;

		  if (id=="Category")
		  {
			id = id+title.replace(" ","_");  
		  }
		  
		  var newStr = "<div id='"+id+"' title='"+title+"' style='margin-left:80px;margin-top:10px;margin-right:5px;width:250px;'><b>"+title+"</b><img style='margin-left:10px;' src='img/draftIcon.png' width='18' height='23' onclick='removeProductToDraft(this.parentNode);'></div>";		  
		  

		  str = str + newStr;
		  $('#'+idHeaderCategory).html(str);
		  
		  var miarray = new Array(2);
		  miarray[0]=title;
		  miarray[1]=idHeaderCategory;
		  miarray[2]=Categoria;
		  return miarray;
}

function deleteProductFromExistCategory(cleanName)
{
		  //Delete all the img tag
		  var posImg=cleanName.indexOf('<img');
		  var posImgEnd=cleanName.indexOf('>');
		  cleanName = cleanName.replace(cleanName.substr(posImg,posImgEnd+1),"");		  
		  cleanName =cleanName.replace('<header class="prod_head">','');
		  cleanName = cleanName.replace('</header>','');
		  
		  var Identity=cleanName;
		  Identity = Identity.substr(Identity.indexOf('id="')+4, Identity.substr(Identity.indexOf('id="')+4).indexOf('"'));
		  
		  
		  var pos =cleanName.indexOf('<');
		  cleanName=cleanName.substr(0,pos);
		  cleanName = cleanName.replace(" ","_").replace(" ","_");
		  cleanName = cleanName.replace(" ","").replace(" ","").replace(" ","").replace(" ","").replace(" ","").replace(" ","").replace(" ","").replace(" ","");
		  cleanName =cleanName.replace(" ","").replace(" ","").replace(" ","").replace(" ","").replace(" ","").replace(" ","").replace(" ","").replace(" ","").replace(" ","").replace(" ","").replace(" ","").replace(" ","").replace(" ","").replace(" ","").replace(" ","").replace(" ","");
		   cleanName=cleanName.replace('\n','');
		   cleanName = cleanName.replace('undefined','');		   
		  $("#Category"+Identity).remove();
		  return cleanName;
}

function handleDragEnd(e) {
  // this/e.target is the source node.
  [].forEach.call(cols, function (col) {
    col.classList.remove('over');
  });
}


var dragSrcEl = null;

var cols = document.querySelectorAll('#columns .column');
[].forEach.call(cols, function(col) {
  col.addEventListener('dragstart', handleDragStart, false);
  col.addEventListener('dragenter', handleDragEnter, false)
  col.addEventListener('dragover', handleDragOver, false);
  col.addEventListener('dragleave', handleDragLeave, false);
  col.addEventListener('drop', handleDrop, false);
  col.addEventListener('dragend', handleDragEnd, false);
});