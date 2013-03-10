<?php
require_once("commons/functions.php");
$con=conectar();
$stateProduct = "";

$Id_product= $_GET["idProducto"];
if ( $_GET['idProducto']!=0)
{
$stateProduct="2";
//Get the product general information
$result = mysql_query('SELECT  pl.name, pl.description, pl.description_short, p.upc, p.quantity,
p.minimal_quantity, p.price, p.wholesale_price, p.additional_shipping_cost, p.reference, p.supplier_reference,
p.location, p.width, p.height, p.depth, p.weight, p.id_tax_rules_group,p.cache_is_pack,p.unity, p.unit_price_ratio,pl.available_now,p.on_sale
FROM ps_product p, ps_product_lang pl
WHERE p.id_product ='.$Id_product.' AND pl.id_product=p.id_product AND pl.id_lang=3');
$unitPriceWithoutTax=0;
while ($rowEmp1 = mysql_fetch_assoc($result)) 
  {
    $nameProduct=$rowEmp1['name'];
    $description=$rowEmp1['description'];
    $description_short= $rowEmp1['description_short']; 
    $UPC =  $rowEmp1['upc']; 
    $initialStock =  $rowEmp1['quantity']; 
    $minimal_quantity =  $rowEmp1['minimal_quantity'];
    $price =  $rowEmp1['price'];
    $wholesale_price =  $rowEmp1['wholesale_price'];
    $additional_shipping_cost = $rowEmp1['additional_shipping_cost'];
    $reference = $rowEmp1['reference'];
    $supplier_reference = $rowEmp1['supplier_reference'];
    $location = $rowEmp1['location'];
    $width = $rowEmp1['width'];
    $height = $rowEmp1['height'];
    $depth = $rowEmp1['depth'];
    $weight = $rowEmp1['weight'];
    $id_tax_rules_group = $rowEmp1['id_tax_rules_group'];
    $cache_is_pack = $rowEmp1['cache_is_pack'];
	$priceMayoristaSIVA= $rowEmp1['wholesale_price'];
	$priceMenorSIVA= $rowEmp1['price'];
	 $unitPriceWithoutTaxARG= $rowEmp1['unity'];
	 $unitPriceWithoutTax= $rowEmp1['unit_price_ratio'];
	$additionalShippingCost=$rowEmp1['additional_shipping_cost'];
	$disponibilidad=$rowEmp1['available_now'];
	$iconRebajas=$rowEmp1['on_sale'];
}


//Calculate unit ratio
if ($unitPriceWithoutTax!=0 )
{
$unitPriceWithoutTax= $priceMenorSIVA / $unitPriceWithoutTax;
$unitPriceWithoutTax=redondear_dos_decimal($unitPriceWithoutTax);
}


//Get the tags from the product
$result = mysql_query('
SELECT  t.name
FROM ps_product_tag pt, ps_tag t
WHERE pt.id_product ='.$Id_product.' AND pt.id_tag=t.id_tag and t.id_lang=3');
$tags="";
while ($rowEmp1 = mysql_fetch_assoc($result)) 
  {
	  if ($rowEmp1['name']!="")
		$tags = $tags.$rowEmp1['name'].",";
  }  

//Get the features of the product

$FeatureNameCustomValue = array();
$FeatureCustomValue = array();
$result = mysql_query('
SELECT pfl.name, fvl.value
FROM ps_feature_product fp, ps_feature_value_lang fvl, ps_feature_value pfv, ps_feature_lang pfl
WHERE fp.id_product ='.$Id_product.'
AND fp.id_feature_value = fvl.id_feature_value
AND pfl.id_lang =3
AND pfl.id_feature = fp.id_feature
AND fvl.id_lang =3
AND pfv.id_feature_value = fvl.id_feature_value
AND pfv.custom =1
');


$i=0;
while ($rowEmp1 = mysql_fetch_assoc($result)) 
  {
      $FeatureNameCustomValue[$i] = $rowEmp1['name'];
      $FeatureCustomValue[$i] = $rowEmp1['value'];	  
      $i=$i+1;
  }   
 
 //------------------------------------------------------------------------//
 
 //Select the feature choose
 $query = mysql_query("SELECT pfvl.value, pfv.id_feature_value, pfv.custom
FROM ps_feature_value pfv, ps_feature_value_lang pfvl, ps_feature_product pfp
WHERE pfv.custom =0
AND pfvl.id_feature_value = pfv.id_feature_value
AND pfvl.id_lang =3
AND pfp.id_feature = pfv.id_feature
AND pfp.id_feature_value = pfv.id_feature_value
AND pfp.id_product =".$Id_product);

$arrayResult = array();
$i=0;
while ($rowEmp1 = mysql_fetch_assoc($query)) 
  {
		$arrayResult[$i]=$rowEmp1['id_feature_value'];
		$i=$i+1;
  }   
 
 for ($i=0; $i<count($featurePredefined);$i++)
 {
	$feature = new structFeature();
	$feature = $featurePredefined[$i];
	$array = $feature->getArray();
	for ($j=0; $j<count($array); $j++)
	{
		$var = new structFeatureValuePredefined();
		$var = $array[$j];				
			for ($k=0; $k<count($arrayResult); $k++)
			{
				if ( $var->idFeature == $arrayResult[$k] )
				{
					$var->setSelected(1);
				}

			}
	}
	
	
	 
 }
 
 
 
 

 //Check if the product has image
$imgSRC= array();
$idImages = array();
$hasImage = array(); 

$hasImage[0] = 0;
$hasImage[1] = 0;
$hasImage[2] = 0;
$hasImage[3] = 0;
$hasImage[4] = 0;



$query = "SELECT id_image
FROM  ps_image
WHERE id_product=".$Id_product;
$result = mysql_query($query);
$idImage="";
$cont=0;
while ($rowEmp1 = mysql_fetch_assoc($result)) 
  {  
	$idImage= $rowEmp1['id_image'];
	$urlImg= "http://190.105.235.50/~jalfaro/PrestaShopProject/img/p";
	$flag=true;
	for ($i=0; $i<$idImage.Length && $flag; $i++)
		{
			
			
			if ($idImage[$i]!="")
			{
			$urlImg= $urlImg."/".$idImage[$i];
			if ( !file_exists($urlImg) )
				mkdir($urlImg."/");
			}
			else
			$flag=false;
		}
	$imgSRC[$cont] = $urlImg."/".$idImage."-small.jpg";
	$idImages[$cont] = $idImage;
	$hasImage[$cont] = 1;
	$cont = $cont + 1;
	
  }
 
}
else
{
$stateProduct="1";
$nameProduct="";
$description="";
$description_short= ""; 
$UPC =  ""; 
$initialStock =  ""; 
$minimal_quantity =  "";
$price =  "";
$wholesale_price =  "";
$additional_shipping_cost = "";
$reference = "";
$supplier_reference = "";
$location = "";
$width = "";
$height = "";
$depth = "";
$weight = "";
$id_tax_rules_group = "";
$cache_is_pack = "";
$priceMayoristaSIVA= "";
$priceMenorSIVA= "";
$unitPriceWithoutTax = "";
$unitPriceWithoutTaxARG = "";
$additionalShippingCost="";	
$tags="";
$FeatureIdValue = array();
$FeatureValue = array();
$FeatureNameCustomValue = array();
$FeatureCustomValue = array();
$FeatureIdPredefinedValue = array();
$FeatureNamePredefinedValue = array();
$disponibilidad="";
$iconRebajas="";
$hasImage=false;
$imgSRC= array();
$idImages = array();
$hasImage = array(); 

$hasImage[0] = 0;
$hasImage[1] = 0;
$hasImage[2] = 0;
$hasImage[3] = 0;
$hasImage[4] = 0;
}



function redondear_dos_decimal($valor) { 
   $float_redondeado=round($valor * 100) / 100; 
   return $float_redondeado; 
} 

?>