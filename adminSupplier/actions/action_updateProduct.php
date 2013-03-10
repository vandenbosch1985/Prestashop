<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script language="javascript" src="../js/jquery-1.3.1.min.js"></script>
</head>
</html>
<?php
require_once("../commons/functions.php");

require_once("../actions/action_addTags.php");
require_once("../actions/action_addFeatures.php");
require_once("../actions/action_addImageProduct.php");
function updateProduct()
{
$con=conectar();
//Get the id of the product to update
$idProducto = $_POST['idProducto'];
//update in to the ps_product

if ( $_POST['taxRules']==0)
	$taxRules=0;
else
	$taxRules=1;
	
$calculateValue="0";
if ( $_POST['unitPriceWithoutTax'] !="" && $_POST['unitPriceWithoutTax'] !=0  && $_POST['unitPriceWithoutTax'] !=0.000000)
	$calculateValue= $_POST['priceMenorSIVA'] / $_POST['unitPriceWithoutTax']  ;	

$query ="UPDATE ps_product
SET
id_supplier=".$_SESSION["k_idUser"].",id_manufacturer=0,id_tax_rules_group='".$taxRules."',id_color_default=0,
on_sale='".$_POST['iconRebajas']."',
online_only=0,ean13=0,upc='".$_POST['UPC']."',
ecotax=0,quantity='".$_POST['initialStock']."',minimal_quantity='".$_POST['miniumQuantity']."',
price='".$_POST['priceMenorSIVA']."',wholesale_price='".$_POST['priceMayoristaSIVA']."',
unity='".$_POST['unitPriceWithoutTaxARG']."',
unit_price_ratio='".$calculateValue."',
additional_shipping_cost='".$_POST['additionalShippingCost']."',
reference='".$_POST['referenceProduct']."',
supplier_reference='".$_POST['supplierReference']."',
location='".$_POST['locationWarehouse']."',
width='".$_POST['width']."',
height='".$_POST['height']."',
depth='".$_POST['deep']."',
weight='".$_POST['weight']."',
out_of_stock=0,
quantity_discount=0,
customizable=0,
uploadable_files=0,
text_fields=0,
available_for_order=1,
show_price=1,indexed=1,cache_is_pack='".$_POST['pack']."', cache_has_attachments=0, cache_default_attribute='',date_upd=NOW() WHERE id_product=".$idProducto;

mysql_query($query,$con) or die ("We have problems to update the product in ps_product. Please contact the Administrator.");


//Update into ps_product_lang
$query ="UPDATE ps_product_lang SET
description='".$_POST['descripcion']."',
description_short='".$_POST['descripcionCorta']."',
link_rewrite='".str_replace(" ","-",$_POST['nameProduct'])."',
meta_description='',
meta_keywords='',
meta_title='',
name='".$_POST['nameProduct']."',
available_now='".$_POST['disponibilidad']."',
available_later='' WHERE id_lang=3 AND id_product=".$idProducto;
mysql_query($query,$con) or die ("We have problems to update the product in ps_product_lang. Please contact the Administrator.");

$query ="UPDATE ps_product_lang SET
description='".$_POST['descripcion']."',
description_short='".$_POST['descripcionCorta']."',
link_rewrite='".str_replace(" ","-",$_POST['nameProduct'])."',
meta_description='',
meta_keywords='',
meta_title='',
name='".$_POST['nameProduct']."',
available_now='".$_POST['disponibilidad']."',
available_later='' WHERE id_lang=1 AND id_product=".$idProducto;
mysql_query($query,$con) or die ("We have problems to update the product in ps_product_lang. Please contact the Administrator.");

$query ="UPDATE ps_product_lang SET
description='".$_POST['descripcion']."',
description_short='".$_POST['descripcionCorta']."',
link_rewrite='".str_replace(" ","-",$_POST['nameProduct'])."',
meta_description='',
meta_keywords='',
meta_title='',
name='".$_POST['nameProduct']."',
available_now='".$_POST['disponibilidad']."',
available_later='' WHERE id_lang=2 AND id_product=".$idProducto;
mysql_query($query,$con) or die ("We have problems to update the product in ps_product_lang. Please contact the Administrator.");

$query ="UPDATE ps_product_lang SET
description='".$_POST['descripcion']."',
description_short='".$_POST['descripcionCorta']."',
link_rewrite='".str_replace(" ","-",$_POST['nameProduct'])."',
meta_description='',
meta_keywords='',
meta_title='',
name='".$_POST['nameProduct']."',
available_now='".$_POST['disponibilidad']."',
available_later='' WHERE id_lang=4 AND id_product=".$idProducto;
mysql_query($query,$con) or die ("We have problems to update the product in ps_product_lang. Please contact the Administrator.");

$query ="UPDATE ps_product_lang SET
description='".$_POST['descripcion']."',
description_short='".$_POST['descripcionCorta']."',
link_rewrite='".str_replace(" ","-",$_POST['nameProduct'])."',
meta_description='',
meta_keywords='',
meta_title='',
name='".$_POST['nameProduct']."',
available_now='".$_POST['disponibilidad']."',
available_later='' WHERE id_lang=5 AND id_product=".$idProducto;
mysql_query($query,$con) or die ("We have problems to update the product in ps_product_lang. Please contact the Administrator.");

$query ="UPDATE ps_product_lang SET
description='".$_POST['descripcion']."',
description_short='".$_POST['descripcionCorta']."',
link_rewrite='".str_replace(" ","-",$_POST['nameProduct'])."',
meta_description='',
meta_keywords='',
meta_title='',
name='".$_POST['nameProduct']."',
available_now='".$_POST['disponibilidad']."',
available_later='' WHERE id_lang=6 AND id_product=".$idProducto;
mysql_query($query,$con) or die ("We have problems to update the product in ps_product_lang. Please contact the Administrator.");


//Update the tags in ps_tag and ps_product_tag

$query="SELECT * 
FROM  ps_product_tag
WHERE id_product =".$idProducto;

$result = mysql_query($query);
while ($rowEmp1 = mysql_fetch_assoc($result)) 
{  
	$id_tag = $rowEmp1['id_tag'];
	$queryDelete = "DELETE FROM ps_tag WHERE id_tag=".$id_tag;
	mysql_query($queryDelete,$con) or die ("We have problems to delete the product from ps_tag. Please contact the Administrator.");	
}

	
$query= "DELETE FROM ps_product_tag WHERE id_product=".$idProducto;
mysql_query($query,$con) or die ("We have problems to delete the tag from ps_product_tag. Please contact the Administrator.");

addTags($idProducto,$_POST['etiquetas'],$con);


//Update the Features from the product
addFeatures($idProducto,0,$con);

//Add the images and insert the row in the tables
deletePhotosOfProduct($idProducto,$_POST['hasImage1'],$_POST['hasImage2'],$_POST['hasImage3'],$_POST['hasImage4'],$_POST['hasImage5'],$con);
uploadPhoto($idProducto,'fileToUpload1',1,1,$con,1);
uploadPhoto($idProducto,'fileToUpload2',2,0,$con,1);
uploadPhoto($idProducto,'fileToUpload3',3,0,$con,1);
uploadPhoto($idProducto,'fileToUpload4',4,0,$con,1);
uploadPhoto($idProducto,'fileToUpload5',5,0,$con,1);

?>
<script type="text/javascript">
$('#form').each (function(){ this.reset();});	
window.location.href=  "../catalogo.php";	
</script>
<?php

//echo "Your information has been saved. <a href='catalogo.php' ><b>| <font color='#009933'> Back to the Catalog</font></b></a>";

	
}

?>