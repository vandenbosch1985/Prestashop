<?php
require_once("../commons/functions.php");
function addProduct()
{
$con=conectar();	
if ( $_POST['taxRules']=='No Tax')
	$taxRules=1;
else
	$taxRules=2;


	
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
1,
0,
'".$taxRules."',
1,
0,
0,
0,
0,
'".$_POST['UPC']."',
0,
'".$_POST['initialStock']."',
'".$_POST['miniumQuantity']."',
'".$_POST['priceMenorSIVA']."',
'".$_POST['priceMayoristaSIVA']."',
'".$_POST['unitPriceWithoutTax']."',
'".$_POST['unitPriceWithoutTaxARG']."',
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
1,
1,
1,
1,
0,
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
'Disponible',
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
'Disponible',
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
'Disponible',
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
'Disponible',
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
'Disponible',
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
'Disponible',
''
);";


mysql_query($query,$con) or die ("We have problems to insert the product in ps_product_lang. Please contact the Administrator.");

//Insert the tags in ps_tag and ps_product_tag
$etiquetas = array();
if ( $_POST['etiquetas']!="")
{	


$etiquetas=split(",",$_POST['etiquetas']);

for ($i=0; $i < count($etiquetas); $i++)
{
	if ( $etiquetas != "")	
	{
		//Insert in tag table
		$query ="INSERT INTO ps_tag(id_lang,name) VALUES(3,'".$etiquetas[$i]."');";		
		mysql_query($query,$con) or die ("We have problems to insert the tag in ps_tag. Please contact the Administrator.");
			
		//Get the last id tag	
		$qDate="SELECT MAX( id_tag )  as 'id_tag'
				FROM  ps_tag";
		$result = mysql_query($qDate);
		while ($rowEmp1 = mysql_fetch_assoc($result)) 
		  {  
			$idTag= $rowEmp1['id_tag'];
		  }
		
		//Insert in product_tag table
		$query ="INSERT INTO  ps_product_tag(id_product,id_tag) VALUES('".$idProducto."','".$idTag."');";		
		mysql_query($query,$con) or die ("We have problems to insert the tag in  ps_product_tag. Please contact the Administrator.");
	}
}
}

//Relation between product and category
$query ="INSERT INTO  ps_category_product(id_product,id_category,position) VALUES('".$idProducto."','1','0');";		
mysql_query($query,$con) or die ("We have problems to insert the product and category in  ps_category_product. Please contact the Administrator.");



//Insert the image of the product in the table


//Insert the features
$variable = "";
$featuresIdList = array();
$featuresIdList=split(",",$_POST['arrayIdFeatures']);


for ($i=0; $i < count($featuresIdList); $i++)
{
	if ( $featuresIdList[$i] != '')
	{
		//Get the name of the features
		$qDate="SELECT name
				FROM  ps_feature_lang
				WHERE id_lang=3 AND id_feature=".$featuresIdList[$i];
		
		$result = mysql_query($qDate);
		while ($rowEmp1 = mysql_fetch_assoc($result)) 
		  {  
			$nameFeature= $rowEmp1['name'];
		  }
		
			
		 $value= $nameFeature."Value";
		 $totalValue= $nameFeature."TotalValue";
		
		$valor = str_replace(" ","",$_POST[$value]);
		$valor = str_replace(" ","",$valor);
		$valor = str_replace(" ","",$valor);
		$valor = str_replace(" ","",$valor);
		  if ( $valor != "" )
		  {
			  //Insert into  the features value and associate with product			  
 			$query ="INSERT INTO ps_feature_value(id_feature,custom) VALUES(".$featuresIdList[$i].",0);";		
			mysql_query($query,$con) or die ("We have problems to insert the feature in ps_feature_value. Please contact the Administrator.");
			
			//Get last id from ps_feature_value
			$qDate="SELECT MAX(id_feature_value) as 'id_feature_value'
				FROM  ps_feature_value";
			$result = mysql_query($qDate);
			while ($rowEmp1 = mysql_fetch_assoc($result)) 
			  {  
				$idFeatureValue= $rowEmp1['id_feature_value'];
			  }
			  
						  
			$query ="INSERT INTO ps_feature_value_lang(id_feature_value,id_lang,value) VALUES(".$idFeatureValue.",3,'".$valor."');";	
			
			mysql_query($query,$con) or die ("We have problems to insert the feature in ps_feature_value_lang. Please contact the Administrator.");
			  
			$query ="INSERT INTO ps_feature_product(id_feature,id_product,id_feature_value) VALUES(".$featuresIdList[$i].",".$idProducto.",".$idFeatureValue.");";		
			mysql_query($query,$con) or die ("We have problems to insert the feature in ps_feature_product. Please contact the Administrator.");  
		  }
	}
}
?>
<script type="text/javascript">
$('#form').each (function(){ this.reset();});		
</script>
<?php

echo "Your information has been saved. <a href='catalogo.php' ><b>| <font color='#009933'> Back to the Catalog</font></b></a>";	
}

?>