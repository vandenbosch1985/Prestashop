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
include('../actions/uploadPhotoFunction.php');

function addProduct()
{	
$con=conectar();
if ( $_POST['taxRules']==0)
	$taxRules=0;
else
	$taxRules=1;
	

$calculateValue="0";
if ( $_POST['unitPriceWithoutTax'] !="")
	$calculateValue= $_POST['priceMenorSIVA'] / $_POST['unitPriceWithoutTax']  ;
		
//Insert in to the ps_product
$query ="INSERT INTO ps_product(id_supplier,id_manufacturer,id_tax_rules_group,id_category_default,id_color_default,on_sale,online_only,ean13,upc,
ecotax,quantity,minimal_quantity,
price,
wholesale_price,
unity,
unit_price_ratio,
additional_shipping_cost,
reference,
supplier_reference,
location,
width,height,depth,weight,
out_of_stock,quantity_discount,customizable,uploadable_files,text_fields,active, available_for_order,show_price,indexed,
cache_is_pack, cache_has_attachments, cache_default_attribute,date_add,date_upd) 
VALUES
(
'".$_SESSION["k_idUser"]."',
0,
'".$taxRules."',
1,
0,
'".$_POST['iconRebajas']."',
0,
0,
'".$_POST['UPC']."',
0,
'".$_POST['initialStock']."',
'".$_POST['miniumQuantity']."',
'".$_POST['priceMenorSIVA']."',
'".$_POST['priceMayoristaSIVA']."',
'".$_POST['unitPriceWithoutTaxARG']."',
'".$calculateValue."',
'".$_POST['additionalShippingCost']."',
'".$_POST['referenceProduct']."',
'".$_POST['supplierReference']."',
'".$_POST['locationWarehouse']."',
'".$_POST['width']."',
'".$_POST['height']."',
'".$_POST['deep']."',
'".$_POST['weight']."',
0,
0,
0,
0,
0,
0,
1,
1,
1,
'".$_POST['pack']."',
0,
'',
NOW(),
NOW()
);";


mysql_query($query,$con) or die ("We have problems to insert the product in ps_product. Please contact the Administrator.");


//Get the last id from product
$qDate="SELECT MAX( id_product )  as 'id_product'
FROM  ps_product";
$result = mysql_query($qDate);
while ($rowEmp1 = mysql_fetch_assoc($result)) 
  {  
	$idProducto= $rowEmp1['id_product'];
  }
  

//Insert into ps_product_lang
$query ="INSERT INTO ps_product_lang(
id_product,
id_lang,
description,
description_short,
link_rewrite,
meta_description,
meta_keywords,
meta_title,
name,
available_now,
available_later
) 
VALUES
(
'".$idProducto."',
3,
'".$_POST['descripcion']."',
'".$_POST['descripcionCorta']."',
'".str_replace(" ","-",$_POST['nameProduct'])."',
'',
'',
'',
'".$_POST['nameProduct']."',
'".$_POST['disponibilidad']."',
''
);";


mysql_query($query,$con) or die ("We have problems to insert the product in ps_product_lang. Please contact the Administrator.");

//Insert into ps_product_lang
$query ="INSERT INTO ps_product_lang(
id_product,
id_lang,
description,
description_short,
link_rewrite,
meta_description,
meta_keywords,
meta_title,
name,
available_now,
available_later
) 
VALUES
(
'".$idProducto."',
2,
'".$_POST['descripcion']."',
'".$_POST['descripcionCorta']."',
'".str_replace(" ","-",$_POST['nameProduct'])."',
'',
'',
'',
'".$_POST['nameProduct']."',
'".$_POST['disponibilidad']."',
''
);";


mysql_query($query,$con) or die ("We have problems to insert the product in ps_product_lang. Please contact the Administrator.");

//Insert into ps_product_lang
$query ="INSERT INTO ps_product_lang(
id_product,
id_lang,
description,
description_short,
link_rewrite,
meta_description,
meta_keywords,
meta_title,
name,
available_now,
available_later
) 
VALUES
(
'".$idProducto."',
1,
'".$_POST['descripcion']."',
'".$_POST['descripcionCorta']."',
'".str_replace(" ","-",$_POST['nameProduct'])."',
'',
'',
'',
'".$_POST['nameProduct']."',
'".$_POST['disponibilidad']."',
''
);";




mysql_query($query,$con) or die ("We have problems to insert the product in ps_product_lang. Please contact the Administrator.");


//Insert into ps_product_lang
$query ="INSERT INTO ps_product_lang(
id_product,
id_lang,
description,
description_short,
link_rewrite,
meta_description,
meta_keywords,
meta_title,
name,
available_now,
available_later
) 
VALUES
(
'".$idProducto."',
4,
'".$_POST['descripcion']."',
'".$_POST['descripcionCorta']."',
'".str_replace(" ","-",$_POST['nameProduct'])."',
'',
'',
'',
'".$_POST['nameProduct']."',
'".$_POST['disponibilidad']."',
''
);";


mysql_query($query,$con) or die ("We have problems to insert the product in ps_product_lang. Please contact the Administrator.");

//Insert into ps_product_lang
$query ="INSERT INTO ps_product_lang(
id_product,
id_lang,
description,
description_short,
link_rewrite,
meta_description,
meta_keywords,
meta_title,
name,
available_now,
available_later
) 
VALUES
(
'".$idProducto."',
5,
'".$_POST['descripcion']."',
'".$_POST['descripcionCorta']."',
'".str_replace(" ","-",$_POST['nameProduct'])."',
'',
'',
'',
'".$_POST['nameProduct']."',
'".$_POST['disponibilidad']."',
''
);";


mysql_query($query,$con) or die ("We have problems to insert the product in ps_product_lang. Please contact the Administrator.");


//Insert into ps_product_lang
$query ="INSERT INTO ps_product_lang(
id_product,
id_lang,
description,
description_short,
link_rewrite,
meta_description,
meta_keywords,
meta_title,
name,
available_now,
available_later
) 
VALUES
(
'".$idProducto."',
6,
'".$_POST['descripcion']."',
'".$_POST['descripcionCorta']."',
'".str_replace(" ","-",$_POST['nameProduct'])."',
'',
'',
'',
'".$_POST['nameProduct']."',
'".$_POST['disponibilidad']."',
''
);";


mysql_query($query,$con) or die ("We have problems to insert the product in ps_product_lang. Please contact the Administrator.");

//Insert the tags in ps_tag and ps_product_tag
addTags($idProducto,$_POST['etiquetas'],$con);

//Relation between product and category
$query ="INSERT INTO  ps_category_product(id_product,id_category,position) VALUES('".$idProducto."','1','0');";		
mysql_query($query,$con) or die ("We have problems to insert the product and category in  ps_category_product. Please contact the Administrator.");


//Insert the features
addFeatures($idProducto,1,$con);


//Upload Photos
if ( $_POST['checkfileToUpload1']=="")
	 $check1=0;
else
	$check1=1;
	
uploadPhoto($idProducto,'fileToUpload1',1,$check1,$con,0);

if ( $_POST['checkfileToUpload2']=="")
	 $check2=0;
else
	$check2=1;

uploadPhoto($idProducto,'fileToUpload2',2,$check2,$con,0);

if ( $_POST['checkfileToUpload3']=="")
	 $check3=0;
else
	$check3=1;

uploadPhoto($idProducto,'fileToUpload3',3,$check3,$con,0);

if ( $_POST['checkfileToUpload4']=="")
	 $check4=0;
else
	$check4=1;

uploadPhoto($idProducto,'fileToUpload4',4,$check4,$con,0);

if ( $_POST['checkfileToUpload5']=="")
	 $check5=0;
else
	$check5=1;

uploadPhoto($idProducto,'fileToUpload5',5,$check5,$con,0);

?>
<script type="text/javascript">
$('#form').each (function(){ this.reset();});
window.location.href=  "../catalogo.php";		
</script>
<?php


}

?>