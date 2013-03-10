<?php 
require_once("commons/functions.php");

$con=conectar();


$categoriesForComboId = array();
$categoriesForComboName = array();

function getImageForCategory($idCategory)
{

	  $urlCategory=$idCategory."-large.jpg";
      if (file_exists ("/home/jalfaro/domains/sindominio.com/public_html/PrestaShopProject/img/c/".$urlCategory) )
		  return "http://190.105.235.50/~jalfaro/PrestaShopProject/img/c/".$urlCategory;
	  else
		  return "http://190.105.235.50/~jalfaro/PrestaShopProject/img/c/thumb.png";

return "http://190.105.235.50/~jalfaro/PrestaShopProject/img/c/thumb.png";
}


function getProductsOfCategory($idCategory)
{
$con=conectar();

$listProducts = array();

$q="SELECT p.id_product, l.name, p.id_category_default, p.price
FROM ps_product p, ps_product_lang l, ps_category_product cl
WHERE p.id_product = l.id_product
AND cl.id_product = p.id_product
AND l.id_lang =3
AND p.active=1
AND cl.id_category=".$idCategory."
AND p.id_supplier=".$_SESSION["k_idUser"];

$result = mysql_query($q);
$i = 0;
while ($rowEmp1 = mysql_fetch_assoc($result)) 
{
	$product= new Product();
	$product->createProduct( $rowEmp1['id_product'],$rowEmp1['name']  );
	$listProducts[$i] = $product;
	$i=$i+1;
}
return $listProducts;
}

$categories = array();

//Gets the categories information
$q="SELECT c.id_category,l.name,c.id_parent
FROM ps_category c, ps_category_lang l
WHERE c.id_category = l.id_category
AND l.id_lang =3 AND c.active =1";

$result = mysql_query($q);
$i = 0;
while ($rowEmp1 = mysql_fetch_assoc($result)) 
  {
	$productos = getProductsOfCategory($rowEmp1['id_category']);
	$categories[] = array('id' => $rowEmp1['id_category'], 'weather_condition' => $rowEmp1['name'], 'parent_id' => $rowEmp1['id_parent'],'products' => $productos,'img' => getImageForCategory($rowEmp1['id_category']));
	
	//Charge the array for the categories select when you create a new category
	$categoriesForComboId[$i] = $rowEmp1['id_category'];
	$categoriesForComboName[$i] = $rowEmp1['name'];
	$i = $i+1;
  }

 ?>