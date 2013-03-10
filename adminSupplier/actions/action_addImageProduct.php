<?php
require_once("../commons/functions.php");
include("../Classes/resize-class.php");
function addImages($idProducto)
{
$filename = basename($_FILES['fileToUpload']['name']);
$con=conectar();

$valueImage=$_POST['hasImage'];
$idProducto=trim($idProducto);


if  ( $valueImage=='false' && $filename=="")
{
deleteImages($idProducto);
}

if  ( $valueImage=='true' && $filename!="")
{
deleteImages($idProducto);
}



if ($filename != "")
{
$query = "INSERT INTO ps_image(id_product,position,cover) VALUES(".$idProducto.",1,1)";
mysql_query($query,$con) or die ("We have problems to insert the product in ps_image. Please contact the Administrator.");

//Get the last id from product
$qDate="SELECT MAX( id_image )  as 'id_image'
FROM  ps_image";
$result = mysql_query($qDate);
while ($rowEmp1 = mysql_fetch_assoc($result)) 
  {  
	$idImageNormal= $rowEmp1['id_image'];
  }
  
insertIntoPs_lang($idImageNormal);


$filename = basename($_FILES['fileToUpload']['name']);


if (copy($_FILES['fileToUpload']['tmp_name'], "/home/jalfaro/domains/sindominio.com/public_html/PrestaShopProject/img/p/".$idProducto."-".$idImageNormal.".jpg")) {
    $data = array('filename' => $filename);
} else {
    $data = array('error' => 'Failed to save');
}


			$resizeObj = new resize("/home/jalfaro/domains/sindominio.com/public_html/PrestaShopProject/img/p/".$idProducto."-".$idImageNormal.".jpg");
			
			$resizeObj -> resizeImage(129, 129, 'crop');
			$resizeObj -> saveImage("/home/jalfaro/domains/sindominio.com/public_html/PrestaShopProject/img/p/".$idProducto."-".$idImageNormal."-home.jpg", 100);
			
			$resizeObj -> resizeImage(300, 300, 'crop');
			$resizeObj -> saveImage("/home/jalfaro/domains/sindominio.com/public_html/PrestaShopProject/img/p/".$idProducto."-".$idImageNormal."-large.jpg", 100);
			
			$resizeObj -> resizeImage(80, 80, 'crop');
			$resizeObj -> saveImage("/home/jalfaro/domains/sindominio.com/public_html/PrestaShopProject/img/p/".$idProducto."-".$idImageNormal."-medium.jpg", 100);
			
			$resizeObj -> resizeImage(45, 45, 'crop');
			$resizeObj -> saveImage("/home/jalfaro/domains/sindominio.com/public_html/PrestaShopProject/img/p/".$idProducto."-".$idImageNormal."-small.jpg", 100);
			
			$resizeObj -> resizeImage(600, 600, 'crop');
			$resizeObj -> saveImage("/home/jalfaro/domains/sindominio.com/public_html/PrestaShopProject/img/p/".$idProducto."-".$idImageNormal."-thickbox.jpg", 100);
			
			$resizeObj -> resizeImage(60,45, 'crop');
			$resizeObj -> saveImage("/home/jalfaro/domains/sindominio.com/public_html/PrestaShopProject/img/tmp/product_mini_".$idProducto.".jpg", 100);
		
			unset($resizeObj);
}
}


function deleteImages($idProducto)
{
$con=conectar();
$query = "SELECT id_image
FROM  ps_image
WHERE id_product=".$idProducto;
$result = mysql_query($query);
$idImage="";
while ($rowEmp1 = mysql_fetch_assoc($result)) 
  {  
	$idImage= $rowEmp1['id_image'];
  }
if ( $idImage != "" )
{
	$query = "DELETE FROM ps_image WHERE id_product=".$idProducto;
	mysql_query($query,$con) or die ("We have problems to delete the product in ps_image. Please contact the Administrator.");
		
}
}


function insertIntoPs_lang($idImage)
{
$con=conectar();
$query = "INSERT INTO ps_image_lang(id_image,id_lang,legend) VALUES(".$idImage.",1,'')";
mysql_query($query,$con) or die ("We have problems to insert the product in ps_image. Please contact the Administrator.");

$query = "INSERT INTO ps_image_lang(id_image,id_lang,legend) VALUES(".$idImage.",2,'')";
mysql_query($query,$con) or die ("We have problems to insert the product in ps_image. Please contact the Administrator.");

$query = "INSERT INTO ps_image_lang(id_image,id_lang,legend) VALUES(".$idImage.",3,'')";
mysql_query($query,$con) or die ("We have problems to insert the product in ps_image. Please contact the Administrator.");

$query = "INSERT INTO ps_image_lang(id_image,id_lang,legend) VALUES(".$idImage.",4,'')";
mysql_query($query,$con) or die ("We have problems to insert the product in ps_image. Please contact the Administrator.");

$query = "INSERT INTO ps_image_lang(id_image,id_lang,legend) VALUES(".$idImage.",5,'')";
mysql_query($query,$con) or die ("We have problems to insert the product in ps_image. Please contact the Administrator.");

$query = "INSERT INTO ps_image_lang(id_image,id_lang,legend) VALUES(".$idImage.",6,'')";
mysql_query($query,$con) or die ("We have problems to insert the product in ps_image. Please contact the Administrator.");
}
?>