<?php
require_once("../commons/functions.php");
include("../Classes/resize-class.php");


function uploadPhoto($idProducto,$fileToUpload,$position,$cover){


$filename = basename($_FILES[$fileToUpload]['name']);
$con=conectar();

if ($filename != "")
{


$urlImg= "/home/jalfaro/domains/sindominio.com/public_html/PrestaShopProject/img/p";

$query = "INSERT INTO ps_image(id_product,position,cover) VALUES(".$idProducto.",".$position.",".$cover.")";

mysql_query($query,$con) or die ("We have problems to insert the product in ps_image. Please contact the Administrator.");

//Get the last id from product
$qDate="SELECT MAX( id_image )  as 'id_image'
FROM  ps_image";
$result = mysql_query($qDate);
while ($rowEmp1 = mysql_fetch_assoc($result)) 
  {  
	$idImage= $rowEmp1['id_image'];
  }

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

//Upload the file with normal size, like the user upload
if (copy($_FILES[$fileToUpload]['tmp_name'], $urlImg."/".$idImage.".jpg")) 
{
	echo "Upload Sucess";
}
else
{
		echo "Upload Fail";
}


$resizeObj = new resize($urlImg."/".$idImage.".jpg");
			
			$resizeObj -> resizeImage(129, 129, 'crop');
			$resizeObj -> saveImage($urlImg."/".$idImage."-home.jpg", 100);
			
			$resizeObj -> resizeImage(300, 300, 'crop');
			$resizeObj -> saveImage($urlImg."/".$idImage."-large.jpg", 100);
			
			$resizeObj -> resizeImage(80, 80, 'crop');
			$resizeObj -> saveImage($urlImg."/".$idImage."-medium.jpg", 100);
			
			$resizeObj -> resizeImage(45, 45, 'crop');
			$resizeObj -> saveImage($urlImg."/".$idImage."-small.jpg", 100);
			
			$resizeObj -> resizeImage(600, 600, 'crop');
			$resizeObj -> saveImage($urlImg."/".$idImage."-thickbox.jpg", 100);
		
			unset($resizeObj);
			}
}



function deletePhotosOfProduct($idProducto)
{
$urlImg= "/home/jalfaro/domains/sindominio.com/public_html/PrestaShopProject/img/p";
$con=conectar();
$query = "SELECT id_image FROM ps_image WHERE id_product=".$idProducto;
$result = mysql_query($query);
while ($rowEmp1 = mysql_fetch_assoc($result)) 
  {
  $urlImg= "/home/jalfaro/domains/sindominio.com/public_html/PrestaShopProject/img/p/paux";
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
	
	if ( file_exists($urlImg."/".$idImage.".jpg") )
		unlink($urlImg."/".$idImage.".jpg");
	
	if ( file_exists($urlImg."/".$idImage."-home.jpg") )
		unlink($urlImg."/".$idImage."-home.jpg");
	
	if ( file_exists($urlImg."/".$idImage."-large.jpg") )
		unlink($urlImg."/".$idImage."-large.jpg");
		
	if ( file_exists($urlImg."/".$idImage."-large.jpg") )
		unlink($urlImg."/".$idImage."-large.jpg");
	
	if ( file_exists($urlImg."/".$idImage."-small.jpg") )
		unlink($urlImg."/".$idImage."-small.jpg");
	
	if ( file_exists($urlImg."/".$idImage."-thickbox.jpg") )
		unlink($urlImg."/".$idImage."-thickbox.jpg");

	
	//Delete from database the image
	$queryDelete="DELETE FROM ps_image WHERE id_image=".$idImage;
	mysql_query($queryDelete,$con) or die ("We have problems to delete the image from ps_image. Please contact the Administrator.");
  }
}
?>