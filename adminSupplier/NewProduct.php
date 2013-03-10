<?php session_start();
require_once("commons/functions.php");
include("init/newProduct/loadFeatures.php");
include("init/newProduct/loadLegalDirection.php");
include("init/newProduct/loadProduct.php");
if (!isset($_SESSION['k_username'])) { ?>
<SCRIPT LANGUAGE="javascript">
location.href = "login.php";
</SCRIPT>
<?php
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Supplier Dashboard</title>
<LINK REL="stylesheet" TYPE="text/css" HREF="styles/styleSheet.css">	

<script type="text/javascript" src="js/jquery.js"></script>		
        		<script type="text/javascript" src="js/ajaxfileupload.js"></script>		        

                <!--<script language="javascript" src="js/jquery-1.3.1.min.js"></script>
<script language="javascript" src="js/AjaxUpload.2.0.min.js"></script>
		<script type="text/javascript" src="js/ajaxfileupload.js"></script>		
        		<script type="text/javascript" src="js/jquery.js"></script>		
		<script type="text/javascript" src="js/jquery-1.2.6.js"></script>	-->	
<script type="text/javascript" src="js/imageProductsFunctions.js"></script>		
		<script type="text/javascript" src="js/validateNewProduct.js"></script>		
<script type="text/javascript" src="js/ajax/ajax_newProduct.js" > </script>
<!-- TinyMCE -->
<script type="text/javascript" src="js/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript">
	tinyMCE.init({
		// General options
		mode : "textareas",
		theme : "advanced",
		skin : "o2k7",
		plugins : "autolink,lists,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,inlinepopups,autosave",

		// Theme options
		theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,|,styleselect,formatselect,fontselect,fontsizeselect",
		theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
		theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
		theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak,restoredraft",
		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
		theme_advanced_statusbar_location : "bottom",
		theme_advanced_resizing : true,

		// Example word content CSS (should be your site CSS) this one removes paragraph margins
		content_css : "css/word.css",

		// Drop lists for link/image/media/template dialogs
		template_external_list_url : "lists/template_list.js",
		external_link_list_url : "lists/link_list.js",
		external_image_list_url : "lists/image_list.js",
	media_external_list_url : "lists/media_list.js",

		// Replace values for the template plugin
		template_replace_values : {
			username : "Some User",
			staffid : "991234"
		}
	});

<!-- /TinyMCE -->		

function initBody()
{
	
$("#priceVentaCIVA").keyup(function() {
	$("#priceVentaCIVA").val(  $("#priceVentaCIVA").val().replace(",",".") );
});
	
$("#priceMayoristaSIVA").keyup(function() {
	
  $("#priceMayoristaSIVA").val( $("#priceMayoristaSIVA").val().replace(",",".") );
});
	
$("#priceMenorSIVA").keyup(function() {
  $("#priceMenorSIVA").val( $("#priceMenorSIVA").val().replace(",",".") );
  updateTotalPrice();
});

$("#unitPriceWithoutTax").keyup(function() {
  
  $("#unitPriceWithoutTax").val( $("#unitPriceWithoutTax").val().replace(",",".") );
  updateUnitPriceWithoutTax();
});

$("#unitPriceWithoutTaxARG").keyup(function() {

  $("#unitPriceWithoutTaxARG").val( $("#unitPriceWithoutTaxARG").val().replace(",",".") );	
  updateARSPer();
});

}
        
        function displayInfoPanel()
		{
			$('#infoPanel').css('display','table');
			$('#featuresPanel').css('display','none');
		}
		
		function displayFeaturesPanel()
		{
			$('#infoPanel').css('display','none');
			$('#featuresPanel').css('display','table');
		}
		
		function onMouseOverLinkInfoPanel()
		{
			$('#linkInfoPanel').css( 'cursor', 'pointer' );
		}
		
		function onMouseOverLinkFeaturesPanel()
		{
			$('#linkFeaturesPanel').css( 'cursor', 'pointer' );
		}
		
		        
	

    
  
function changeValuePack()
{
  if ( $('#pack').val()  == 1 )
	$('#pack').val(0);
else
	$('#pack').val(1);
}

function changeValueiconRebajas()
{
  if ( $('#iconRebajas').val()  == 1 )
	$('#iconRebajas').val(0);
else
	$('#iconRebajas').val(1);
}



		
        </script>
	</head>  
<body id="login" onLoad="initBody();">		
<div id="login-wrapper" class="png_bg">
			<div id="login-top">
				<img src="img/Supplier-logo.png"  />			
		  </div>			                                        
</div>
<div id="dummy">
  <div id="panelControl"  style="padding-top:150px; padding-left:-90px;float:left; width:600px;" >
        <?php
		  echo "<b><strong><font color='#339933' face='Arial'>Welcome: </font></strong></b><font color='#333333' face='Arial'  style='font-style:normal'>".$_SESSION['k_email']."</font><font style='color:#333333;'>   |   </font>"; 
		echo "<a style='color:#009900;' href='supplier_InformationV2.php'>Personal Information</a><font style='color:#333333;'>   |   </font> "; 
		echo '<a href="logout.php" style="color:#009900;">Logout</a>';
		?>
        </div>
       
</div>
<br />

<div id="resultSaveNewProduct" align="center"></div>

<div style="margin-left:220px;" align="left" id="panelLinks"> <a id="linkInfoPanel" style="margin-right:10px;color:#009900;" onClick="displayInfoPanel();" onMouseOver="onMouseOverLinkInfoPanel();" >1. Info </a>  |  <a id="linkFeaturesPanel" style="margin-right:10px;margin-left:10px;color:#009900;" onClick="displayFeaturesPanel();" onMouseOver="onMouseOverLinkFeaturesPanel();" > 2. Features </a></div>
<div id="dummy2" align="center" style="margin-bottom:60px;">
<div id="infoPanel" style="display:table;">
<table width="900" style="margin-top:30px;">

<tr>
<td colspan="2">
<font size="-1"><b>Product Global Information -</b></font>
<a href="catalogo.php" ><font style="font-size:14px;font-family:Arial;margin-top:-20px;color:#FFF;margin-left:580px;margin-right:-40px;"><img src="img/arrow2.gif" />Back to Catalogo</font></a>
<hr color="#A8CE66"  size="1"   />
</td>
</tr>

<tr>
<td>
<table  align="left" width="350" style="border-right: 1px solid #A8CE66;" cellspacing="13">

<form id="form" name="form" action="./actions/action_NewProduct.php" method="POST" enctype="multipart/form-data">
<tr>
<td style="font-size:15px;font-family:Arial;" width="150px">
Nombre:
</td>
<td style="font-size:15px;font-family:Arial;">
<input id="nameProduct" name="nameProduct" type="text" value="
<?php
echo $nameProduct;
?>
" size="35" style="margin-right:15px;"/>
</td>
</tr>

<tr>
<td style="font-size:15px;font-family:Arial;" width="150px">
Referencia:
</td>
<td style="font-size:15px;font-family:Arial;">
<input id="referenceProduct" name="referenceProduct"  type="text" value="
<?php
echo $reference;
?>
" size="20" />
</td>
</tr>

<tr>
<td style="font-size:15px;font-family:Arial;" width="150px">
Supplier Reference:
</td>
<td style="font-size:15px;font-family:Arial;">
<input id="supplierReference" name="supplierReference" type="text" value="
<?php
echo $supplier_reference;
?>
" size="20" />
</td>
</tr>

<tr>
<td style="font-size:15px;font-family:Arial;" width="150px">
UPC:
</td>
<td style="font-size:15px;font-family:Arial;">
<input type="text" value="
<?php
echo $UPC;
?>
" size="20" id="UPC"  name="UPC" /> ( US, Canada )
</td>
</tr>


<tr>
<td style="font-size:15px;font-family:Arial;" width="150px">
Location(Warehouse):
</td>
<td style="font-size:15px;font-family:Arial;">
<input type="text" value="
<?php
if ( $location == "" )
	echo $legalDirection;
else
	echo $location;
?>
" size="20" id="locationWarehouse" name="locationWarehouse" />
</td>
</tr>

<tr>
<td style="font-size:15px;font-family:Arial;" width="150px">
Width (package):
</td>
<td style="font-size:15px;font-family:Arial;">
<input type="text" value="
<?php
echo $width;
?>
" size="3" id="width" name="width" /> pie
</td>
</tr>

<tr>
<td style="font-size:15px;font-family:Arial;" width="150px">
Height (package):
</td>
<td style="font-size:15px;font-family:Arial;">
<input type="text" value="
<?php
echo $height;
?>
" size="3" id="height" name="height" /> pie
</td>
</tr>

<tr>
<td style="font-size:15px;font-family:Arial;" width="150px">
Deep (package):
</td>
<td style="font-size:15px;font-family:Arial;">
<input type="text" value="
<?php
echo $depth;
?>
" size="3" id="deep" name="deep"/> pie
</td>
</tr>

<tr>
<td style="font-size:15px;font-family:Arial;" width="150px">
Weight (package):
</td>
<td style="font-size:15px;font-family:Arial;">
<input type="text" value="
<?php
echo $weight;
?>
" size="3" id="weight" name="weight" /> libra
</td>
</tr>

</table>


<table align="left" style="margin-left:15px;" cellspacing="13">
<tr>
<td style="font-size:15px;font-family:Arial;"><b>Estado:</b></td>
<td style="font-size:15px;font-family:Arial;"> <input id="state" name="state" checked="checked" type="radio"  /><img src="img/enabled.gif" style="margin-right:5px;margin-left:5px;">Activo</td>
</tr>

<tr>
<td colspan="2" style="font-size:15px;font-family:Arial;"><input id="state"  name="state" type="radio" style="margin-left:73px;"  /><img src="img/disabled.gif" style="margin-right:5px;margin-left:5px;">Draft</td>
</tr>


</table>

</td>
</tr>

<tr>
<td style="display:none;">
<hr color="#A8CE66"  size="1"   />
</td>
</tr>

<tr>
<td style="display:none;">
<input id="pack" type="checkbox" name="pack"  onChange="changeValuePack();"
<?php
if ($cache_is_pack==1)
    echo "checked value='1' ";
 else
 echo "value='0' ";
    
?>
   /><font style="font-size:15px;font-weight:bold;font-family:Arial" >Pack</font>
</td>
</tr>

<tr>
<td>
<hr color="#A8CE66"  size="1"   />
</td>
</tr>

<table  align="center" width="900" cellspacing="13" >
<tr>
<td style="font-size:15px;font-family:Arial;">Precio Mayorista s/IVA:</td>
<td style="font-size:15px;font-family:Arial;"><input name="priceMayoristaSIVA" id="priceMayoristaSIVA" type="text" value="
<?php
    echo $priceMayoristaSIVA;
?>
" size="10" style="margin-right:15px;margin-left:-30px;"/>ARS  * El precio al que compró este producto como mayorista</td>
</tr>

<tr>
<td style="font-size:15px;font-family:Arial;">Precio por Menor s/IVA:</td>
<td style="font-size:15px;font-family:Arial;"><input name="priceMenorSIVA" id="priceMenorSIVA" type="text" value="
<?php
if ( $priceMenorSIVA !="" )
{
	echo $priceMenorSIVA;
}
?>
" size="10" style="margin-right:15px;margin-left:-30px;"/>ARS  * Precios para vender este producto sin impuestos</td>

</tr>

<tr>
<td style="font-size:15px;font-family:Arial;">Tax Rules:</td>
<td style="font-size:15px;font-family:Arial;"><select name="taxRules" id="taxRules" style="margin-right:15px;margin-left:-30px;" onChange="calculateFinalPrice(this);" >
<?php 
if ( $id_tax_rules_group == 0 )
	$checkedNoTax = "selected='selected'";
else
	$checkedNoTax = "";

if ( $id_tax_rules_group == 1 )
	$checkedTaxArg = "selected='selected'";
else
	$checkedTaxArg = "";
?>
<option value="0"  id="noTax" name="noTax" <?php echo $checkedNoTax; ?> >No Tax</option>
<option value="1" id="21ArgTax" name="21ArgTax" <?php echo $checkedTaxArg; ?>>21% Standar Arg Tax</option>
</select></td>
</tr>

<tr>
<td style="font-size:15px;font-family:Arial;">Precio de Venta c/IVA:</td>
<td style="font-size:15px;font-family:Arial;"><input name="priceVentaCIVA" id="priceVentaCIVA" type="text" value="" size="10" style="margin-right:15px;margin-left:-30px;"/>ARS</td>
</tr>

<tr>
<td style="font-size:15px;font-family:Arial;">Unit Price without tax:</td>
<td style="font-size:15px;font-family:Arial;"><input  name="unitPriceWithoutTax" id="unitPriceWithoutTax" type="text" value="
<?php
echo $unitPriceWithoutTax;
?>
" size="10" style="margin-right:15px;margin-left:-30px;"/>ARS per<input name="unitPriceWithoutTaxARG" id="unitPriceWithoutTaxARG" type="text" value="
<?php
echo $unitPriceWithoutTaxARG;
?>
" size="10" style="margin-right:15px;margin-left:15px;"/>or
<input  disabled="disabled" type="text" id="unitPriceWithoutTaxLabel" name="unitPriceWithoutTaxLabel" value="0" style="background:#1B1B1B; border:none;width:40px;margin-left:5px;color:white;font-weight:bold;" /> 
ARS per
<input  disabled="disabled" type="text" id="unitPriceWithoutTaxARGLabel" name="unitPriceWithoutTaxARGLabel" value="0" style="background:#1B1B1B; border:none;width:40px;margin-left:5px;color:white;font-weight:bold;" /> 
 with tax</td>
</tr>

<tr>
<td style="font-size:15px;font-family:Arial;"></td>
<td style="font-size:15px;font-family:Arial;font-weight:bold;"><input name="iconRebajas" id="iconRebajas" type="checkbox" 
Onchange="changeValueiconRebajas();"
<?php
if ($iconRebajas != "")
{
if ($iconRebajas==1)
    echo "checked value='1' ";
 else
	echo "value='0' ";
}
echo "value='0' ";
?>
style="margin-right:15px;margin-left:-30px;" />Mostrar el icono "en rebajas" en la página producto y texto en la lista de productos.</td>
</tr>

<tr>
<td style="font-size:15px;font-family:Arial;font-weight:bold;">Precio de Venta Final:</td>
<td style="font-size:15px;font-family:Arial;">
<label style="margin-left:-30px;"><b><input  disabled="disabled" type="text" id="FinalPriceLabel" name="FinalPriceLabel" value="0" style="background:#1B1B1B; border:none;width:40px;margin-left:5px;color:white;font-weight:bold;" /></b> ARS (tax incl.) / <b><input  disabled="disabled" type="text" id="FinalPriceWithOutLabel" name="FinalPriceWithOutLabel" value="0" style="background:#1B1B1B; border:none;width:40px;margin-left:5px;color:white;font-weight:bold;" /></b> ARS (tax excl.)</label>
</td>
</tr>

<tr>
<td colspan="2">
<hr color="#A8CE66"  size="1"   />
</td>
</tr>

<tr>
<td style="font-size:15px;font-family:Arial;">Initial Stock:</td>
<td style="font-size:15px;font-family:Arial;"><input name="initialStock" id="initialStock" type="text" value="
<?php
echo $initialStock;
?>
" size="10" style="margin-right:15px;margin-left:-30px;"/></td>
</tr>

<tr>
<td style="font-size:15px;font-family:Arial;">Minium Quantity:</td>
<td style="font-size:15px;font-family:Arial;"><input name="miniumQuantity" id="miniumQuantity" type="text" value="
<?php
echo $minimal_quantity;
?>
" size="10" style="margin-left:-30px;"/><br />
<p style="margin-top:5px;font-size:12px;margin-left:-30px;">The minimum quantity to buy this product (set to 1 to disable this feature)</p></td>
</tr>

<tr>
<td colspan="2">
<hr color="#A8CE66"  size="1"   />
</td>
</tr>

<tr>
<td style="font-size:15px;font-family:Arial;">Additional shipping cost:</td>
<td style="font-size:15px;font-family:Arial;"><input name="additionalShippingCost" id="additionalShippingCost" type="text" value="
<?php
echo $additionalShippingCost;
?>" size="10" style="margin-right:15px;margin-left:-30px;"/>ARS (tax excl.)
<label style="font-size:12px;margin-left:15px;">Carrier tax will be applied.</label></td>
</tr>


<tr>
<td style="font-size:15px;font-family:Arial;">Disponibilidad:</td>
<td style="font-size:15px;font-family:Arial;"><input name="disponibilidad" id="disponibilidad" type="text" value="
<?php
echo $disponibilidad;
?>
" size="10" style="margin-right:15px;margin-left:-30px;"/>
</td>
</tr>

<tr>
<td colspan="2" style="font-size:15px;font-family:Arial;"><input name="alowwPedidos" id="alowwPedidos" type="radio" checked="checked" value="" style="margin-right:15px;margin-left:158px;display:none;"/></td>
</tr>

<tr>
<td colspan="2">
<hr color="#A8CE66"  size="1"   />
</td>
</tr>


<tr>
<td style="font-size:15px;font-family:Arial;" >Descripción Corta:<div id="msgDescripcionCorta" align="center" style="margin-top:10px;Color:red;font-weight:bold;display:none;">Required Field</div></td>
<td style="font-size:15px;font-family:Arial;">
<textarea id="descripcionCorta" name="descripcionCorta" rows="15" cols="80" style="width: 80%">
<?php
echo $description_short;
?>
</textarea>

</td>
</tr>

<tr>
<td style="font-size:15px;font-family:Arial;" >Descripción:<div id="msgDescripcion" align="center" style="margin-top:10px;Color:red;font-weight:bold;display:none;">Required Field</div></td>
<td style="font-size:15px;font-family:Arial;">
<textarea id="descripcion" name="descripcion" rows="15" cols="80" style="width: 80%">
<?php
echo $description;
?>
</textarea>

</td>
</tr>

<tr>
<td style="font-size:15px;font-family:Arial;" >Etiquetas:</td>
<td style="font-size:15px;font-family:Arial;"><input name="etiquetas" id="etiquetas"  type="text" value="
<?php if ( $tags!="")echo $tags; else echo "";?>"  size="15" style="margin-right:15px;margin-left:-30px;"/><br />
<label style="font-size:12px;margin-left:-30px;">Etiquetas separadas por comas (ejm: dvd, hifi...)</label>
</td>
</tr>

<tr>
<td colspan="2">
<hr color="#A8CE66"  size="1"   />
</td>
</tr>

<tr>
<td style="font-size:15px;font-family:Arial;" >Fichero:</td>
<td style="font-size:15px;font-family:Arial;">
<div id="inputFilePanel" style="display:table;">

<?php
for ($i=0; $i < count($hasImage); $i++)
{
	$number = $i + 1;
	if ( $hasImage[$i] == '0' )
	{		
		echo "<input id='fileToUpload".$number."' type='file' size='45' name='fileToUpload".$number."' class='input' onChange='displayImageInput".$number."();' style='display:table;'><input type='checkbox' name='checkfileToUpload".$number."' id='checkfileToUpload".$number."' value='0' class='unique' onChange='show_checked".$number."();' />Cover del Producto";		
		echo "</div><ul  id='listaImg".$number."'></ul >";
		echo "<input type='hidden' id='hasImage".$number."' name='hasImage".$number."' value='0' />";
	}
	else
	{
		echo "<input id='fileToUpload".$number."' type='file' size='45' name='fileToUpload".$number."' class='input' onChange='displayImageInput".$number."();' style='display:none;'></div><ul  id='listaImg".$number."'>Image".$number."<img src='img/disabled.gif' style='margin-right:5px;margin-left:5px;' onclick='RemoveImage".$number."();'><img id='imgProduct".$number."' src='".$imgSRC[$i]."' width='60' height='45' style='displat:table;' /></ul >";
		echo "<input type='hidden' id='hasImage".$number."' name='hasImage".$number."' value='".$idImages[$i]."' />";
	}
}

?>
<label style="font-size:12px;font-family:Arial;" >Formato: JPG, GIF, PNG. Tamaño: 2000Kb max. </label>
</td>
</tr>
<tr>
<td colspan="2">
<hr color="#A8CE66"  size="1"   />
</td>
</tr>

<tr >
<td align="left">
<a href="catalogo.php"><img src="img/arrow2.gif" /><font style="font-size:14px;font-family:Arial;margin-top:-20px;color:#FFF;margin-left:8px;">Back to Catalogo</font></a>
</td>
<td  align="right">
<input type="button" value="Cancelar" class="btn" style="margin-left:150px;" >
<input type="button" value="Guardar" class="btn" style="margin-left:150px;" onClick="submitForm();" >
<input id="submitButton" type="submit" value="Guardar" class="btn" style="margin-left:10px;visibility:hidden;"  >
</td>
</tr>

</table>

</table>
</div>

<div id="featuresPanel" style="display:none;" >
<table width="900" style="margin-top:30px;">
<tr>
<td colspan="2">
<font size="-1"><b>Product Features - <div id="msgFeaturesError" style="Color:red;Width:200px;"></div></b></font>
<a href="catalogo.php" ><font style="font-size:14px;font-family:Arial;margin-top:-20px;color:#FFF;margin-left:580px;margin-right:-40px;"><img src="img/arrow2.gif" />Back to Catalogo</font></a>
<hr color="#A8CE66"  size="1"   />
</td>
</tr>

<tr>
<td>
<table  align="left" width="350" style="border-right: 1px solid #A8CE66;" cellspacing="13">
<tr>
<td align="center">Características</td>
<td align="center">Valor Predefinido</td>
<td align="center" >Total Valor</td>
</tr>
<?php

for ($i=0;$i< count($FeatureId); $i++)
{
?>
	<tr> <td align="center" style="font-size:15px;font-family:Arial;" width="150px">
	<?php echo str_replace("_"," ",$FeatureName[$i]); ?>
	</td>
	
	<td style="font-size:15px;font-family:Arial;" width="150px" align="center">
	<select name="<?php echo "featurePredefined".$FeatureName[$i] ?>" id="<?php echo "featurePredefined".$FeatureName[$i] ?>" style="margin-right:15px;margin-left:-30px;" onChange="" >
	<?php
	for ($j=0; $j < count($FeaturePredefinedId); $j++)
	{
				if ( $j == 0 )	
				echo "<option selected='selected' value='".$FeaturePredefinedId[$j]."'  >".$FeaturePredefinedName[$j]."</option>";
			else
				echo "<option value='".$FeaturePredefinedId[$j]."'    >".$FeaturePredefinedName[$j]."</option>";			
	}
	?>
	</select>
	</td>	
	
	<td style="font-size:15px;font-family:Arial;" width="150px">
	
	<input id="<?php	echo $FeatureName[$i].'TotalValue'; ?>" name="<?php	echo $FeatureName[$i].'TotalValue'; ?>" type="text" size="15" style="margin-right:15px;" />
	</td></tr>
<?php		
}
?>

<tr><td><input type="hidden" id="arrayIdFeatures"  name="arrayIdFeatures" value="
<?php 
for ($i=0;$i< count($FeatureId); $i++)
{
	echo $FeatureId[$i].",";
}
?>"/>
 <input type="hidden" id="arrayFeatures"  name="arrayFeatures" value="
<?php 
for ($i=0;$i< count($FeatureId); $i++)
{
	echo $FeatureName[$i].",";
}
?>"
 />
 
 </td></tr>
</table>

</div>
<input type="hidden" id="stateProduct" name="stateProduct" value="
<?php
echo $stateProduct;
?>
"  />
<input type="hidden" id="idProducto" name="idProducto" value="
<?php
echo $Id_product;
?>
"  />


<input type="hidden" id="resultNameCustomValues" name="resultNameCustomValues" value="
<?php
for ($i=0; $i<count($FeatureNameCustomValue); $i++)
{
	echo $FeatureNameCustomValue[$i].",";
}
?>
" />


<input type="hidden" id="resultValueCustomValues" name="resultValueCustomValues" value="
<?php
for ($i=0; $i<count($FeatureCustomValue); $i++)
{
	echo $FeatureCustomValue[$i].",";
}
?>
" />


<input type="hidden" id="resultValuePredefined" name="resultValuePredefined" value="
<?php
for ($i=0; $i<count($FeatureIdPredefinedValue); $i++)
{
	echo $FeatureIdPredefinedValue[$i].",";
}
?>
" />

<input type="hidden" id="resultNameValuePredefined" name="resultNameValuePredefined" value="
<?php
for ($i=0; $i<count($FeatureNamePredefinedValue); $i++)
{
	echo $FeatureNamePredefinedValue[$i].",";
}
?>
" />


<?php
echo "<input type='hidden' id='allFeatures' value='";
for ($i=0; $i<count($featurePredefined); $i++)
{
	$featureS = new structFeature();
	$featureS = $featurePredefined[$i];
	echo $featureS->name.","; 
}
echo "' />";

for ($i=0; $i<count($featurePredefined); $i++)
{
	$featureS = new structFeature();
	$featureS = $featurePredefined[$i];
	
	//Save the values
	echo "<input type='hidden' id='".$featureS->name."' value='";
	for ($j=0; $j<count($featureS->getArray());$j++)
	{
		$featurePredefinedClass = $featureS->getValue($j);
		echo $featurePredefinedClass->getName().",";
	}
	echo "' />";
	
	
	//Save the values selected o no selected
	echo "<input type='hidden' id='selected".$featureS->name."' value='";
	for ($j=0; $j<count($featureS->getArray());$j++)
	{
		$featurePredefinedClass = $featureS->getValue($j);
		echo $featurePredefinedClass->getSelected().",";
	}
	echo "' />";
	
	//Save the ids
	echo "<input type='hidden' id='Id".$featureS->name."' value='";
	for ($j=0; $j<count($featureS->getArray());$j++)
	{
		$featurePredefinedClass = $featureS->getValue($j);
		echo $featurePredefinedClass->getId().",";
	}
	echo "' />";
}
	?>
	
	
	

</div>
<?php 
if ( $priceMenorSIVA != "" )
{
echo '<script type="text/javascript">
calculateFinalPrice(this);
updateARSPer();
</script>';
}
?>
</form>
</body>
</html>	
<script type="text/javascript">

loadCustomValues();
loadPredefinedValues();


function loadCustomValues()
{
	var arrayNames= new Array();
	var arrayValues= new Array();
	var aux="";
	arrayNames = ($('#resultNameCustomValues').val()).split(",");
	arrayValues = ($('#resultValueCustomValues').val()).split(",");
	
	for (var i=0; i< arrayNames.length; i++)
	{		
		aux = arrayNames[i];
		aux = aux.replace(" ","");
		aux = aux.replace("\n","");
		if ( aux!="," && aux!="" )
		$('#'+aux+"TotalValue").val( arrayValues[i] );
	}
}

function loadPredefinedValues()
{	

	var arrayValuePredefined = new Array();
	var arrayIdValuePredefined = new Array();
	var arrayNames = new Array();
	var arrayValuesSelected = new Array();
	var aux="";
	
	arrayNames = ($('#allFeatures').val()).split(",");
	

	for (var i=0; i< arrayNames.length; i++)
	{		
		if ( arrayNames[i]!="," && arrayNames[i]!="" )
		{
		
		auxName = arrayNames[i];
		auxName = auxName.replace(" ","");
		auxName = auxName.replace("\n","");
		
		arrayValuePredefined = ($('#'+auxName).val()).split(",");
		arrayIdValuePredefined =($('#Id'+auxName).val()).split(",");
		arrayValuesSelected = ($('#selected'+auxName).val()).split(",");

		var str = "";
		
		var j=0;		
		
		
		str=str+"<option value='0' >---</option>";
		while ( arrayValuePredefined[j]!="" && arrayValuePredefined[j]!=null )
		{		
			if ( arrayValuesSelected[j]==1 )
				str=str+"<option selected='selected' value='"+arrayIdValuePredefined[j]+"' >"+arrayValuePredefined[j]+"</option>";
			else
			str=str+"<option value='"+arrayIdValuePredefined[j]+"' >"+arrayValuePredefined[j]+"</option>";
			j=j+1;
		}
		
		
		
		$('#featurePredefined'+auxName).html(str);
		if ( $('#stateProduct').val() == 1 )
			$('#featurePredefined'+auxName).val(0);
	   
		}
	
	}
}


var $unique = $('input.unique');
$unique.click(function() {
    $unique.removeAttr('checked');    	   
	$(this).attr('checked', true);		
});





function submitForm()
{
if (validateNewProduct())
	{
		$('#submitButton').click();
	}
}
</script>