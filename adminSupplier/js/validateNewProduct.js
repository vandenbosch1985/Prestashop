function updateUnitPriceWithoutTax()
{
	var unitPriceWithOutTax = $('#unitPriceWithoutTax').val();

	if ( $('#taxRules option:selected').text() == 'No Tax' )
	{
	$('#unitPriceWithoutTaxLabel').val(unitPriceWithOutTax);	
	}
	
	if ( $('#taxRules option:selected').text() == '21% Standar Arg Tax' )
	{
	$('#unitPriceWithoutTaxLabel').val(unitPriceWithOutTax*1.21);	
	}
}


function updateARSPer()
{
var data = $('#unitPriceWithoutTaxARG').val();
$('#unitPriceWithoutTaxARGLabel').val(data);
}

//Onchange DropDown Taxes
function calculateFinalPrice(price)
{
	var priceWithOutIva = $('#priceMenorSIVA').val();

	if ( $('#taxRules option:selected').text() == 'No Tax' )
	{
	$('#FinalPriceWithOutLabel').val(priceWithOutIva);
	$('#FinalPriceLabel').val(priceWithOutIva);
	$('#priceVentaCIVA').val(priceWithOutIva);
	$('#unitPriceWithoutTaxLabel').val( $('#unitPriceWithoutTax').val());	
	}
	
	if ( $('#taxRules option:selected').text() == '21% Standar Arg Tax' )
	{
	$('#FinalPriceWithOutLabel').val(priceWithOutIva);
	$('#FinalPriceLabel').val(priceWithOutIva*1.21);
	$('#priceVentaCIVA').val(priceWithOutIva*1.21);
	$('#unitPriceWithoutTaxLabel').val( $('#unitPriceWithoutTax').val() * 1.21);	
	}
}

function updateTotalPrice()
{
  var priceWithOutIva = $('#priceMenorSIVA').val();
  var TotalPrice =0;
  if ( $('#taxRules option:selected').text() == 'No Tax' )
	{
		TotalPrice = priceWithOutIva;
	}
	
	if ( $('#taxRules option:selected').text() == '21% Standar Arg Tax' )
	{
		TotalPrice = priceWithOutIva * 1.21;
	}
	
	$('#FinalPriceWithOutLabel').val(priceWithOutIva);
	$('#FinalPriceLabel').val(TotalPrice);
	$('#priceVentaCIVA').val(TotalPrice);
  
}



function validateNewProduct()
{
	//Check if the product name is empty
	if ( $('#nameProduct').val() == "")
	{
		$('#nameProduct').css('borderColor','red');
		$('#nameProduct').css('borderWidth','2px');
		$('#nameProduct').css('borderStyle','Solid');	
		$('#nameProduct').focus();
		return false;
	}
	else
	{
		$('#nameProduct').css('borderColor','#000000');
		$('#nameProduct').css('borderWidth','1px');
		$('#nameProduct').css('borderStyle','Solid');	
	}
	
	
	//Check if the product reference is empty
	if ( $('#referenceProduct').val() == "")
	{
		$('#referenceProduct').css('borderColor','red');
		$('#referenceProduct').css('borderWidth','2px');
		$('#referenceProduct').css('borderStyle','Solid');	
		$('#referenceProduct').focus();
		return false;
	}
	else
	{
		$('#referenceProduct').css('borderColor','#000000');
		$('#referenceProduct').css('borderWidth','1px');
		$('#referenceProduct').css('borderStyle','Solid');	
	}
	
	
	//Check if the price Mayorista sin IVA is empty
	if (   $('#priceMayoristaSIVA').val() =="" )
	{
		$('#priceMayoristaSIVA').css('borderColor','red');
		$('#priceMayoristaSIVA').css('borderWidth','2px');
		$('#priceMayoristaSIVA').css('borderStyle','Solid');	
		$('#priceMayoristaSIVA').focus();
		return false;
	}
	else
	{
		$('#priceMayoristaSIVA').css('borderColor','#000000');
		$('#priceMayoristaSIVA').css('borderWidth','1px');
		$('#priceMayoristaSIVA').css('borderStyle','Solid');	
	}
	
	
		//Check if the price Mayorista sin IVA is numeric
	if ( !IsNumeric( $('#priceMayoristaSIVA').val() ) )
	{
		$('#priceMayoristaSIVA').css('borderColor','red');
		$('#priceMayoristaSIVA').css('borderWidth','2px');
		$('#priceMayoristaSIVA').css('borderStyle','Solid');	
		$('#priceMayoristaSIVA').focus();
		return false;
	}
	else
	{
		$('#priceMayoristaSIVA').css('borderColor','#000000');
		$('#priceMayoristaSIVA').css('borderWidth','1px');
		$('#priceMayoristaSIVA').css('borderStyle','Solid');	
	}
	
	
	//Check if the price Menor sin IVA is empty
	if (  $('#priceMenorSIVA').val() =="" )
	{
		$('#priceMenorSIVA').css('borderColor','red');
		$('#priceMenorSIVA').css('borderWidth','2px');
		$('#priceMenorSIVA').css('borderStyle','Solid');	
		$('#priceMenorSIVA').focus();
		return false;
	}
	else
	{
		$('#priceMenorSIVA').css('borderColor','#000000');
		$('#priceMenorSIVA').css('borderWidth','1px');
		$('#priceMenorSIVA').css('borderStyle','Solid');	
	}
	
	
		//Check if the price Menor sin IVA is numeric
	if ( !IsNumeric( $('#priceMenorSIVA').val() ) )
	{
		$('#priceMenorSIVA').css('borderColor','red');
		$('#priceMenorSIVA').css('borderWidth','2px');
		$('#priceMenorSIVA').css('borderStyle','Solid');	
		$('#priceMenorSIVA').focus();
		return false;
	}
	else
	{
		$('#priceMenorSIVA').css('borderColor','#000000');
		$('#priceMenorSIVA').css('borderWidth','1px');
		$('#priceMenorSIVA').css('borderStyle','Solid');	
	}
	
	
	
	if (  $('#taxRules').val() =="" )
	{
		$('#taxRules').css('borderColor','red');
		$('#taxRules').css('borderWidth','2px');
		$('#taxRules').css('borderStyle','Solid');	
		$('#taxRules').focus();
		return false;
	}
	else
	{
		$('#taxRules').css('borderColor','#000000');
		$('#taxRules').css('borderWidth','1px');
		$('#taxRules').css('borderStyle','Solid');	
	}
	
	
		//Check if the price Venta con IVA is empty
	if ( $('#priceVentaCIVA').val() =="" )
	{
		$('#priceVentaCIVA').css('borderColor','red');
		$('#priceVentaCIVA').css('borderWidth','2px');
		$('#priceVentaCIVA').css('borderStyle','Solid');	
		$('#priceVentaCIVA').focus();
		return false;
	}
	else
	{
		$('#priceVentaCIVA').css('borderColor','#000000');
		$('#priceVentaCIVA').css('borderWidth','1px');
		$('#priceVentaCIVA').css('borderStyle','Solid');	
	}
	
	
		//Check if the price Venta con IVA is numeric
	if ( !IsNumeric( $('#priceVentaCIVA').val() ) )
	{
		$('#priceVentaCIVA').css('borderColor','red');
		$('#priceVentaCIVA').css('borderWidth','2px');
		$('#priceVentaCIVA').css('borderStyle','Solid');	
		$('#priceVentaCIVA').focus();
		return false;
	}
	else
	{
		$('#priceVentaCIVA').css('borderColor','#000000');
		$('#priceVentaCIVA').css('borderWidth','1px');
		$('#priceVentaCIVA').css('borderStyle','Solid');	
	}
	
	
	
	
		//Check if the Initial Stock is empty
	if (   $('#initialStock').val() =="" )
	{
		$('#initialStock').css('borderColor','red');
		$('#initialStock').css('borderWidth','2px');
		$('#initialStock').css('borderStyle','Solid');	
		$('#initialStock').focus();
		return false;
	}
	else
	{
		$('#initialStock').css('borderColor','#000000');
		$('#initialStock').css('borderWidth','1px');
		$('#initialStock').css('borderStyle','Solid');	
	}
	
	
		//Check if the Initial Stock is numeric
	if ( !IsNumeric( $('#initialStock').val() ) )
	{
		$('#initialStock').css('borderColor','red');
		$('#initialStock').css('borderWidth','2px');
		$('#initialStock').css('borderStyle','Solid');	
		$('#initialStock').focus();
		return false;
	}
	else
	{
		$('#initialStock').css('borderColor','#000000');
		$('#initialStock').css('borderWidth','1px');
		$('#initialStock').css('borderStyle','Solid');	
	}
	
	//Check if the miniumQuantity is empty
	if (  $('#miniumQuantity').val() =="" )
	{
		$('#miniumQuantity').css('borderColor','red');
		$('#miniumQuantity').css('borderWidth','2px');
		$('#miniumQuantity').css('borderStyle','Solid');	
		$('#miniumQuantity').focus();
		return false;
	}
	else
	{
		$('#miniumQuantity').css('borderColor','#000000');
		$('#miniumQuantity').css('borderWidth','1px');
		$('#miniumQuantity').css('borderStyle','Solid');	
	}
	
	
		//Check if the miniumQuantity is numeric
	if ( !IsNumeric( $('#miniumQuantity').val() ) )
	{
		$('#miniumQuantity').css('borderColor','red');
		$('#miniumQuantity').css('borderWidth','2px');
		$('#miniumQuantity').css('borderStyle','Solid');	
		$('#miniumQuantity').focus();
		return false;
	}
	else
	{
		$('#miniumQuantity').css('borderColor','#000000');
		$('#miniumQuantity').css('borderWidth','1px');
		$('#miniumQuantity').css('borderStyle','Solid');	
	}
	
	
	
	
	// Get the HTML contents of the currently active editor
	//console.debug(tinyMCE.activeEditor.getContent());

	// Get the raw contents of the currently active editor
	tinyMCE.activeEditor.getContent({format : 'raw'});
	
	
	
	//Check if the descripcionCorta is empty
	if ( tinyMCE.get('descripcionCorta').getContent() =="" )
	{	
		$('#msgDescripcionCorta').css('display','table');		
		$('#descripcionCorta').focus();
		return false;
	}
	else
	{
		$('#msgDescripcionCorta').css('display','none');				
	}
	
	//Check if the descripcion is empty
	if ( tinyMCE.get('descripcion').getContent() =="" )
	{
		$('#msgDescripcion').css('display','table');		
		$('#descripcion').focus();
		return false;
	}
	else
	{
		$('#msgDescripcion').css('display','none');
	}
	
	
	
	//Validate if load any features
	var arrayStringFeatures=$('#arrayFeatures').val();
	var arrayResult = arrayStringFeatures.split(",");
	var flag=true;
	var featureName ="";
	
	for (i=0; i<arrayResult.length; i++)
	{
		if (arrayResult[i]!="")
		{
		featureName = arrayResult[i];
		var auxTotalValue="#"+featureName+"TotalValue";				
		var auxValue="#featurePredefined"+featureName+" option:selected";
		auxValue = auxValue.replace("\n","");			
		auxTotalValue = auxTotalValue.replace("\n","");			
		
		if ( $(auxValue).val() != 0 )
			{									
			flag=false;
			}
		if ( $(auxTotalValue).val() != "" )
			flag=false;
		}
	}
		
	if (flag==true)
		{
			displayFeaturesPanel();
			$('#msgFeaturesError').html("At least one feature is required.");
			return false;
		}
	else
		$('#msgFeaturesError').html("");
	

return true;
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
   
   
   function vacio(q) {  
        for ( i = 0; i < q.length; i++ ) {  
                if ( q.charAt(i) != " " ) {  
                        return true  
                }  
        }  
        return false  
}  