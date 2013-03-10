<?php

require_once("commons/functions.php");

$con=conectar();


function getImageForProduct($idProduct)
{
$con=conectar();

$query = "SELECT id_image FROM ps_image WHERE id_product=".$idProduct." AND cover=1";
$result = mysql_query($query);
$i=0;
while ($rowEmp1 = mysql_fetch_assoc($result)) 
  {
	$urlImg= "http://190.105.235.50/~jalfaro/PrestaShopProject/img/p";
	$idImage= $rowEmp1['id_image'];
	
	//Delete the image physically
	$flag=true;
	for ($i=0; $i<$idImage.Length && $flag; $i++)
	{
		if ($idImage[$i]!="")
		{
		$urlImg= $urlImg."/".$idImage[$i];	
		}
		else
		$flag=false;
	}
	return $urlImg."/".$idImage."-small.jpg";
  }

return "http://190.105.235.50/~jalfaro/PrestaShopProject/img/p/thumb.png";

}


//Get the information of the products that have categories
$ActiveProducts = array();

//Get the products and the information for show
$q="SELECT p.id_product, l.name, p.id_category_default, p.price, cl.name AS  'categoryName'
FROM ps_product p, ps_product_lang l, ps_category_lang cl
WHERE p.id_product = l.id_product
AND l.id_lang =3
AND p.active=1
AND p.id_category_default !=1
AND cl.id_category = p.id_category_default
AND cl.id_lang =3 AND p.id_supplier=".$_SESSION["k_idUser"];

$result = mysql_query($q);
$i = 0;
while ($rowEmp1 = mysql_fetch_assoc($result)) 
  {  
	$product= new Product();
	$product->createProductWithImg($rowEmp1['id_product'], $rowEmp1['name'],getImageForProduct($rowEmp1['id_product']),$rowEmp1['price'],$rowEmp1['categoryName'],$rowEmp1['id_category_default']);	
	$ActiveProducts[$i]=$product;
	$i = $i + 1;
  }

?>