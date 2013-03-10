function restoreFromDraftToCategory(productToRestore)
{
	
	var id = '#'+productToRestore.id.replace('\n','');
	//Put the tilde icon to the product
	var str = $(id).html();	
	var nameProduct = $(id).attr('title');
	nameProduct = nameProduct.replace(" ","_");
	var categoryName = $(id+" header ").find('input').attr('title');
	var activeNameProduct = 'active'+nameProduct.replace(" ","_");
	var categoryNameWithOutSpaces = categoryName.replace(" ","_");
	var urlImg = $( $(id+' img')[0] ).attr('src')
	
	var productPrice = $(id).find("p")[1].innerHTML;
	var deleteLink = $( $(id).find("img")[2] ).attr("onclick");		
	//Change from draft icon to tilde icon and change event onclick for active products
	str=str.replace("draft.png","tilde.png");
	str=str.replace("24","22");
	str=str.replace("23","17");
	str=str.replace("restoreFromDraftToCategory(this.parentNode)","removeToDraftFromActive(this.parentNode)");
	
	
	//***********************************************************************************************************//
	//Save the action
	var auxId= deleteLink;
	auxId = auxId.substring( auxId.indexOf("(")+1, auxId.indexOf(")"));	
	restoreFromDraft(auxId);
	//***********************************************************************************************************//
	
	
	//Get all the active products for insert in the last div the new Product
	//var mainActiveProducts = $('#mainActiveProducts').html();
	var newActiveProduct = "<div id='"+deleteWrongCharacters(activeNameProduct)+"' title='"+nameProduct+"' class='active_prod'><div class='column' draggable='true' style='margin-bottom:20px;'  id='active'><img src='"+urlImg+"' width='60' height='50' align='left'><header class='prod_head'>"+nameProduct.replace("_"," ").replace("_"," ").replace("_"," ").replace("_"," ").replace("_"," ").replace("_"," ").replace("_"," ").replace("_"," ").replace("_"," ").replace("_"," ").replace("_"," ").replace("_"," ")+"<input id='"+nameProduct+"' type='hidden' value='categoryMain"+categoryNameWithOutSpaces+"' title='"+categoryName+"'/></header><p id='categoryName' style='color:#000;'>"+categoryName.replace("_"," ")+"</p><p id='productPrice' style='color:#000;'>"+productPrice+"</p></div><img src='img/tilde.png' width='22' height='17' onclick='removeToDraftFromActive(this.parentNode);' class='tilde' onmouseover='changeIconTilde();'/><img src='img/editar.png' width='23' height='18' onclick='' style='margin-top:15px;' /><img src='img/papeleraReciclaje.gif' width='23' height='22'  style='margin-top:15px;' onclick='"+deleteLink+"'/></div>";


	//mainActiveProducts = mainActiveProducts + newActiveProduct;
	$('#mainActiveProducts').append(newActiveProduct);
	
	//Delete from Draft the product
	$(id).remove();
	
	//Insert into category 
	var categoryMain="categoryMain"+categoryNameWithOutSpaces;
	
	var str = $("#"+categoryMain)[0].innerHTML;
	
	
	nameProduct = nameProduct.replace(" ","_");
	
	
	var newStr = "<div id='Category"+deleteWrongCharacters(nameProduct)+"' title='"+nameProduct+"' style='margin-left:80px;margin-top:10px;margin-right:5px;width:250px;'><b>"+nameProduct.replace("_"," ").replace("_"," ").replace("_"," ").replace("_"," ").replace("_"," ").replace("_"," ").replace("_"," ").replace("_"," ").replace("_"," ").replace("_"," ").replace("_"," ").replace("_"," ")+"</b><img style='margin-left:10px;' src='img/draftIcon.png' width='18' height='23' onclick='removeProductToDraft(this.parentNode);'></div>";		  
	
	 str = str + newStr;
	 $('#'+categoryMain).html(str);
	
	
}


function removeToDraftFromActive(productToRemove)
{
	var id = '#'+productToRemove.id.replace('\n','');	
	//Put the draft icon to the product
	
	
	var str = $(id).html();
	
	
	//*****************************************************************************************//
	//Save the action 	
	var auxEditLink = $( $(id+' img')[2] ).attr('onClick');
	auxEditLink = auxEditLink.substring( auxEditLink.indexOf("(")+1, auxEditLink.indexOf(")"));
	
	saveFromActiveToDraft(auxEditLink);	
	
	//*****************************************************************************************//
	
	str=str.replace("tilde.png","draft.png");
	str=str.replace("22","24");
	str=str.replace("17","23");
	str=str.replace("removeToDraftFromActive(this.parentNode)","restoreFromDraftToCategory(this.parentNode)");
	
	
	var idReplace = "Draft"+productToRemove.id.replace('active','').replace('\n',''); 
	str= "<div id='"+deleteWrongCharacters(idReplace)+"' title='"+productToRemove.title+"' class='active_prod'>" + str;
	

			
	//Insert the product in draft
	if ( $('#contenedorBorrador').html()!=null)
	{
		var strContenedorBorrador = $('#contenedorBorrador').html();
	}
	else
	{
		var strContenedorBorrador = "";
	}
	
	strContenedorBorrador = strContenedorBorrador +  "<tr><td>" +str+"</td></tr>";
	

	
	$('#contenedorBorrador').html(strContenedorBorrador);
	
	
	//Delete the active product from active List	
	$(id).remove();
	
	//Delete the active product from the category	
	var idActiveProduct = '#'+productToRemove.id.replace("active","Category");
    $(idActiveProduct).remove();
	
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

function removeProductToDraft(productToRemove)
{

	var str= "#"+productToRemove.id.replace('\n','');
	
	var titleCorrect = productToRemove.title.replace("Category","").replace("_"," ");
	titleCorrect = titleCorrect.replace("_"," ").replace("_"," ").replace("_"," ").replace("_"," ").replace("_"," ")
	.replace("_"," ").replace("_"," ").replace("_"," ");
		
	//Remove from category List
	$(str).remove();

	str=str.replace('Category','active');
	
	nameProductAux =str;
	
	
		
	var productPrice = $(nameProductAux).find("p")[1].innerHTML;
	var deleteLink = $( $(nameProductAux).find("img")[2] ).attr("onclick");		
	var urlImg = $( $(str+' img')[0] ).attr('src');
	
	$(str).remove();
	
	//******************************************************************************//
	//Call the function to save the movement
	var auxId= deleteLink;
	auxId = auxId.substring( auxId.indexOf("(")+1, auxId.indexOf(")"));
	saveFromCategoryToDraft(auxId);	
	//******************************************************************************//
	
	
	
	$(nameProductAux).remove();
	
	//Insert in to the draft List
	var cleanName = productToRemove.id.replace("Category","Draft").replace("category","Draft").replace('\n','');


	productToRemove.title = productToRemove.title.replace(' ','').replace(' ','').replace(' ','').replace(' ','').replace(' ','').replace(' ','').replace(' ','');
	
	

	if ($('#contenedorBorrador').html()!= null)
		var strContenedorBorrador = $('#contenedorBorrador').html();
	else
		var strContenedorBorrador ="";
	

	strContenedorBorrador = strContenedorBorrador +  "<tr><td><div id='"+deleteWrongCharacters(cleanName)+"' title='"+productToRemove.title+"' class='active_prod'><div class='column' draggable='true' style='margin-bottom:20px;'><img src='"+urlImg+"' width='60' height='50' align='left' /><header style='background:white;margin-left:-100px;'>"+titleCorrect+"</header><p id='productPrice' style='color:#000;'>"+productPrice+"</p></div><img src='img/draft.png' width='24' height='23' onclick='removeToDraftFromActive(this.parentNode.parentNode);' class='tilde' onmouseover='changeIconTilde();'/><img src='img/editar.png' width='23' height='18'  style='margin-top:15px;' /><img src='img/papeleraReciclaje.gif' width='23' height='22' style='margin-top:15px;' onclick='"+deleteLink+"' /></div></td></tr>";
	
	$('#contenedorBorrador').html(strContenedorBorrador);
	
	
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






	function validateNewCategory(cate)
	{
		var categoryName = $('#categoryName').val();
		var costoCategoria = $('#costoCategoria').val();
		var tiempoCategoria = $('#tiempoCategoria').val();
				
		//Check if the categoryName is empty
		if (categoryName == "")
		{
			$('#categoryName').css('borderColor','#FF0000');
			$('#categoryName').css('borderWidth','2px');
			$('#categoryName').css('borderStyle','Solid');		
			return false;
		}
		else
		{
		$('#categoryName').css('borderColor','#000000');
			$('#categoryName').css('borderWidth','1px');
			$('#categoryName').css('borderStyle','Solid');	
		}
		
		if ( hasWrongCharacters(categoryName) )
		{
			$('#categoryName').css('borderColor','#FF0000');
			$('#categoryName').css('borderWidth','2px');
			$('#categoryName').css('borderStyle','Solid');		
			return false;
		}
		else
		{
			$('#categoryName').css('borderColor','#000000');
			$('#categoryName').css('borderWidth','1px');
			$('#categoryName').css('borderStyle','Solid');	
		}
		
		
		//Check if the prices of the shipping is empty
		if ( costoCategoria=="")
		{
			$('#costoCategoria').css('borderColor','#FF0000');
			$('#costoCategoria').css('borderWidth','2px');
			$('#costoCategoria').css('borderStyle','Solid');		
			return false;
		}
		else
		{
		   $('#costoCategoria').css('borderColor','#000000');
			$('#costoCategoria').css('borderWidth','1px');
			$('#costoCategoria').css('borderStyle','Solid');	
		}
		
		//Check if the prices of the shipping is a numeric
		if ( !IsNumeric(costoCategoria) )
		{
			$('#costoCategoria').css('borderColor','#FF0000');
			$('#costoCategoria').css('borderWidth','2px');
			$('#costoCategoria').css('borderStyle','Solid');		
			return false;
		}
		else
		{
		   $('#costoCategoria').css('borderColor','#000000');
			$('#costoCategoria').css('borderWidth','1px');
			$('#costoCategoria').css('borderStyle','Solid');	
		}
		
		//Check if the time of the shipping is empty
		if ( tiempoCategoria=="")
		{
			$('#tiempoCategoria').css('borderColor','#FF0000');
			$('#tiempoCategoria').css('borderWidth','2px');
			$('#tiempoCategoria').css('borderStyle','Solid');		
			return false;
		}
		else
		{
		   $('#tiempoCategoria').css('borderColor','#000000');
			$('#tiempoCategoria').css('borderWidth','1px');
			$('#tiempoCategoria').css('borderStyle','Solid');	
		}
		
		//Check if the time of the shipping is a numeric
		if ( !IsNumeric(tiempoCategoria) )
		{
			$('#tiempoCategoria').css('borderColor','#FF0000');
			$('#tiempoCategoria').css('borderWidth','2px');
			$('#tiempoCategoria').css('borderStyle','Solid');		
			return false;
		}
		else
		{
		   $('#tiempoCategoria').css('borderColor','#000000');
			$('#tiempoCategoria').css('borderWidth','1px');
			$('#tiempoCategoria').css('borderStyle','Solid');	
		}
		
		//If the fields are correct, create the new category
		createNewCategory(cate);
	
	}
	

	function IsNumeric(sText)

{
   var ValidChars = "0123456789.";
   var IsNumber=true;
   var Char;

 
   for (i = 0; i < sText.length && IsNumber == true; i++) 
      { 
      Char = sText.charAt(i); 
      if (ValidChars.indexOf(Char) == -1) 
         {
         IsNumber = false;
         }
      }
   return IsNumber;
   
   }

function validateCategoryEdit(categoryName)
{


	var flag=true;

	//*******************************************************//
	//Validate the edit of the information of the category
	
	if ( hasWrongCharacters(categoryName) )
		{
			return false;
			$('#name'+categoryName).css('borderColor','#FF0000');
			$('#name'+categoryName).css('borderWidth','2px');
			$('#name'+categoryName).css('borderStyle','Solid');		

		}
		else
		{
			$('#name'+categoryName).css('borderColor','#000000');
			$('#name'+categoryName).css('borderWidth','1px');
			$('#name'+categoryName).css('borderStyle','Solid');	
		}
	

		var categoryName = $('#name'+categoryName).val();
		var costoCategoria = $('#costo'+categoryName).val();
		var tiempoCategoria = $('#tiempo'+categoryName).val();
						
		//Check if the categoryName is empty
		if (categoryName == "")
		{
			$('#name'+categoryName).css('borderColor','#FF0000');
			$('#name'+categoryName).css('borderWidth','2px');
			$('#name'+categoryName).css('borderStyle','Solid');		
			flag= false;
		}
		else
		{
		$('#name'+categoryName).css('borderColor','#000000');
		$('#name'+categoryName).css('borderWidth','1px');
		$('#name'+categoryName).css('borderStyle','Solid');	
		}
		
		
		
		
		//Check if the prices of the shipping is empty
		if ( costoCategoria=="")
		{
			$('#costo'+categoryName).css('borderColor','#FF0000');
			$('#costo'+categoryName).css('borderWidth','2px');
			$('#costo'+categoryName).css('borderStyle','Solid');		
			flag= false;
		}
		else
		{
		   $('#costo'+categoryName).css('borderColor','#000000');
			$('#costo'+categoryName).css('borderWidth','1px');
			$('#costo'+categoryName).css('borderStyle','Solid');	
		}
		
		//Check if the prices of the shipping is a numeric
		if ( !IsNumeric(costoCategoria) )
		{
			$('#costo'+categoryName).css('borderColor','#FF0000');
			$('#costo'+categoryName).css('borderWidth','2px');
			$('#costo'+categoryName).css('borderStyle','Solid');		
			flag=false;
		}
		else
		{
		   $('#costo'+categoryName).css('borderColor','#000000');
			$('#costo'+categoryName).css('borderWidth','1px');
			$('#costo'+categoryName).css('borderStyle','Solid');	
		}
		
		//Check if the time of the shipping is empty
		if ( tiempoCategoria=="")
		{
			$('#tiempo'+categoryName).css('borderColor','#FF0000');
			$('#tiempo'+categoryName).css('borderWidth','2px');
			$('#tiempo'+categoryName).css('borderStyle','Solid');		
			flag=false;
		}
		else
		{
		   $('#tiempo'+categoryName).css('borderColor','#000000');
			$('#tiempo'+categoryName).css('borderWidth','1px');
			$('#tiempo'+categoryName).css('borderStyle','Solid');	
		}
		
		//Check if the time of the shipping is a numeric
		if ( !IsNumeric(tiempoCategoria) )
		{
			$('#tiempo'+categoryName).css('borderColor','#FF0000');
			$('#tiempo'+categoryName).css('borderWidth','2px');
			$('#tiempo'+categoryName).css('borderStyle','Solid');		
			flag= false;
		}
		else
		{
		   $('#tiempo'+categoryName).css('borderColor','#000000');
			$('#tiempo'+categoryName).css('borderWidth','1px');
			$('#tiempo'+categoryName).css('borderStyle','Solid');	
		}
	//******************************************************//	
	return flag;
}

	function displayInfoCategoryEdit(categoryName)
	{	
	
		if ( $("#"+categoryName+"Edit").css('display') == 'none')
		{
	
		$("#"+categoryName+"Edit").css('display','table');			
		$("#editIcon"+categoryName).attr('src','img/floppy-disk-icon.gif');
		$("#editIcon"+categoryName).width(16);		
		$("#editIcon"+categoryName).height(16);		
		}
		else
		{
			if ( validateCategoryEdit(categoryName) )
			{
		$("#"+categoryName+"Edit").css('display','none');	
		var strHtml = $("#name"+categoryName).val() +"<img id='editIcon"+categoryName.replace(" ","_")+"'";
		strHtml= strHtml+ 'onclick="displayInfoCategoryEdit(';
		strHtml = strHtml + "'"+categoryName.replace(" ","_")+"'";
		strHtml = strHtml +');" ';
		strHtml= strHtml + "src='img/editar.png' align='right' width='20' height='16'>";
		$("#header"+categoryName).html( strHtml );
		$("#editIcon"+categoryName).attr('src','img/editar.png');
		$("#editIcon"+categoryName).width(20);		
		$("#editIcon"+categoryName).height(16);
			}
		}
		
	}

function createNewCategory(form)
{
	var categoryName = $('#categoryName').val();
	var costoCategoria = $('#costoCategoria').val();
	var tiempoCategoria = $('#tiempoCategoria').val();
	var medidaTiempo = $('input[name=medidaTiempo]:checked').val();
	
	//***************** Category cmb ********************************//
	
    var selectedCmbCategory = $('#cmbCategory').val();
	var indexSelectedCategory=0;

	
	for (var i=0; i<  $ ( $ ( $('#cmbCategory').html() ) ).length; i++)
	{
		if ( $ ( $ ( $('#cmbCategory').html() )[i] ).val() ==  selectedCmbCategory )
		{
			indexSelectedCategory= i;
		}
	}	

	$("#cmbCategory option:eq("+indexSelectedCategory+")").attr("selected", "selected");
	var htmlcmbCategory = 	$('#cmbCategory').html();
	//***************************************************************//
	
	


	var checkedHoras = '';
	var checkedDias = '';

	if (medidaTiempo == 'horas')	
		checkedHoras = 'checked="checked"';			
	else
		checkedDias = 'checked="checked"';
	categoryNameWithOutReplace = categoryName;
	categoryName=categoryName.replace(" ","_").replace(" ","_").replace(" ","_").replace(" ","_").replace(" ","_").replace(" ","_").replace(" ","_").replace(" ","_");
	var str="<tr><td><div id='button"+categoryName.replace(" ","_")+"' class='column' style='margin-bottom:20px; height:30px;width:250px;display:inline-table;margin-left:0px;'  onclick='' id='category'><img src='http://190.105.235.50/~jalfaro/PrestaShopProject/img/c/thumb.png' width='60' height='51' align='left' style='margin-right:60px'><header id='header"+categoryName+"'>"+categoryNameWithOutReplace+"<img id='editIcon"+categoryName.replace(" ","_")+"'";
	str= str+ 'onclick="displayInfoCategoryEdit(';
	str = str + "'"+categoryName.replace(" ","_")+"'";
	str = str +');" ';
	str= str + "src='img/editar.png' align='right' width='20' height='16'></header><div id='category"+categoryName.replace(" ","_")+"' style='display:none;' ></div><div id='"+categoryName.replace(" ","_")+"Edit' style='display:none;'><p><label>Nombre:</label><input type='text' value='"+categoryNameWithOutReplace+"' id='name"+categoryName.replace(" ","_")+"' name='"+categoryName.replace(" ","_")+"' /></p><p><label>Costo de Envio:</label><input type='text'";
	str = str + 'value="'+costoCategoria.toString()+'" id="costo'+categoryName.replace(" ","_")+'" name="costoCategoria" size="2" ></p><p><label>Tiempo de Envio:</label><input type="text" value="'+tiempoCategoria.toString()+'" id="tiempo'+categoryName.replace(" ","_")+'" name="tiempoCategoria" size="2"><br /><br /><input type="radio" '+checkedHoras+' value="horas" id="medidaTiempo'+categoryName.replace(" ","_")+'" name="medidaTiempo" /> Horas <input type="radio" '+checkedDias+' value="dias" name="medidaTiempo" id="medidaTiempo'+categoryName.replace(" ","_")+'"/> Dias</p><p><select id="cmbCategory'+categoryName+'" name="cmbCategory">'+htmlcmbCategory+'</selected></p></div></td></tr>';
	
	$('#costo'+categoryName).val(costoCategoria);
	$('#tiempo'+categoryName).val(tiempoCategoria);

	str = document.getElementById("lastRow").innerHTML + str;
	
	$('#lastRow').html(str);
	

	$('#labelNewCategory').css('display','table');
		$('#newCategory').css('display','none');
	
	$('#categoryName').attr('value','');
	$('#costoCategoria').attr('value','');
	$('#tiempoCategoria').attr('value','');
	$("#cmbCategory option:eq(0)").attr("selected", "selected");
}

function displayCategoriaChicos()
		{
			if ( $('#categoryMainPara_Chicos').css("display") == "none" )
				{			
					$('#categoryMainPara_Chicos').slideDown('slow', function() {
    					$('#categoryMainPara_Chicos').css("display","table");
  					});
					$('#categoryMainAccesorios').css("display","none");
					$('#categoryMainPara_Mujeres').css("display","none");
				}
			else
			{
			$('#categoryMainPara_Chicos').slideUp('slow', function() {
				$('#categoryMainPara_Chicos').css("display","none");
				});
			}
		}
		
function displayCategoriaAccesorios()
		{
			if ( $('#categoryMainAccesorios').css("display") == "none" )
				{			
					$('#categoryMainAccesorios').slideDown('slow', function() {
    					$('#categoryMainAccesorios').css("display","table");
  					});
					$('#categoryMainPara_Chicos').css("display","none");
					$('#categoryMainPara_Mujeres').css("display","none");
				}
			else
			{
			$('#categoryMainAccesorios').slideUp('slow', function() {
				$('#categoryMainAccesorios').css("display","none");
				});
			}
		}
		
function displayCategoriaMujeres()
		{
			if ( $('#categoryMainPara_Mujeres').css("display") == "none" )
				{			
					$('#categoryMainPara_Mujeres').slideDown('slow', function() {
    					$('#categoryMainPara_Mujeres').css("display","table");
  					});
					$('#categoryMainPara_Chicos').css("display","none");
					$('#categoryMainAccesorios').css("display","none");
				}
			else
			{
			$('#categoryMainPara_Mujeres').slideUp('slow', function() {
				$('#categoryMainPara_Mujeres').css("display","none");
				});
			}
		}

	function changeIconTilde()
		{
		$('.tilde').css( 'cursor', 'pointer' );
		}
		
		
function displayCategoria(form)
{

	var categoryName = form.id.replace("buttonCategory","");

			if ( $('#categoryMain'+categoryName).css("display") == "none" )
				{			
					$('#categoryMain'+categoryName).slideDown('slow', function() {
    					$('#categoryMain'+categoryName).css("display","table");
  					});
				}
			else
			{
			$('#categoryMain'+categoryName).slideUp('slow', function() {
				$('#categoryMain'+categoryName).css("display","none");
				});
			}

}

function editar(idProducto)
{
	window.location.href=  "NewProduct.php?idProducto="+idProducto;	
}


function deleteWrongCharacters(input)
{
	input = input.replace("/","").replace("/","").replace("/","").replace("/","").replace("/","");
	input = input.replace("-","").replace("-","").replace("-","").replace("-","").replace("-","");
	input = input.replace("(","").replace("(","").replace("(","").replace("(","").replace("(","");
	input = input.replace(")","").replace(")","").replace(")","").replace(")","").replace(")","");	
	return input;
}


function hasWrongCharacters(q)
{
	
	for ( i = 0; i < q.length; i++ ) {                          

		
		if ( q.charAt(i) == '<')
			return true;
		
		if ( q.charAt(i) == '>')
			return true;
		
		if ( q.charAt(i) == '{')
			return true;
			
		if ( q.charAt(i) == '}')
			return true;
			
		if ( q.charAt(i) == ';')
			return true;
			
		if ( q.charAt(i) == '=')
			return true;
		
		if ( q.charAt(i) == '#')
			return true;
			
} 
return false;
}