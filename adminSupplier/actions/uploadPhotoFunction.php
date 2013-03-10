<?php

function uploadPhoto($idProducto,$fileToUpload,$position,$cover,$con,$update){


$filename = basename($_FILES[$fileToUpload]['name']);

if ($filename != "")
{

if ( $update == 1)
{
	$position = getPositionFree($idProducto,$con);
	$cover = tieneImgCover($idProducto,$con);
}

$urlImg= "/home/jalfaro/domains/sindominio.com/public_html/PrestaShopProject/img/p";

$query = "INSERT INTO ps_image(id_product,position,cover) VALUES(".$idProducto.",".$position.",".$cover.")";
echo $query;
mysql_query($query,$con) or die ("We have problems to insert the product in ps_image. Please contact the Administrator.");

//Get the last id from product
$qDate="SELECT MAX( id_image )  as 'id_image'
FROM  ps_image";
$result = mysql_query($qDate);
while ($rowEmp1 = mysql_fetch_assoc($result)) 
  {  
	$idImage= $rowEmp1['id_image'];
  }

  //Save the thumb for the catalogo's page
  if ( $cover==1 )
  {	
	copy($_FILES[$fileToUpload]['tmp_name'], $urlImg."/".$idProducto."-".$idImage."-small.jpg");
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


function deletePhotosOfProduct($idProducto,$except1,$except2,$except3,$except4,$except5,$con)
{
$urlImg= "/home/jalfaro/domains/sindominio.com/public_html/PrestaShopProject/img/p";
$query = "SELECT id_image FROM ps_image WHERE id_product=".$idProducto;
$result = mysql_query($query);
while ($rowEmp1 = mysql_fetch_assoc($result)) 
  {
  $urlImg= "/home/jalfaro/domains/sindominio.com/public_html/PrestaShopProject/img/p";
	$idImage= $rowEmp1['id_image'];
	
	if ( $idImage!= $except1 && $idImage!= $except2 && $idImage!= $except3 && $idImage!= $except4 && $idImage!= $except5 )
	{
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
	mysql_query($queryDelete,$con) or die ("We have problems to delete the image from ps_image1. Please contact the Administrator.");
	
	}
  }
}


function getPositionFree($idProducto,$con)
{
$positions = array();
$query = "SELECT id_image,position FROM ps_image WHERE id_product=".$idProducto;
$result = mysql_query($query);
$i=0;
while ($rowEmp1 = mysql_fetch_assoc($result)) 
  {
	$positions[$i]=$rowEmp1['position'];
	$i=$i+1;
  }
  
if ( !existeElemento($positions, 1) )
	return 1;

if ( !existeElemento($positions, 2) )
	return 2;

if ( !existeElemento($positions, 3) )
	return 3;

if ( !existeElemento($positions, 4) )
	return 4;
	
if ( !existeElemento($positions, 5) )
	return 5;
 }
 
 function existeElemento($array, $elemento)
 {
	for ($i=0; $i<count($array); $i++)
	{
		if ( $array[$i] == $elemento )
			return true;
	}
	return false;
 }

 
 function tieneImgCover($idProducto,$con)
 {
 $query = "SELECT id_image,position,cover FROM ps_image WHERE id_product=".$idProducto;
$result = mysql_query($query);
while ($rowEmp1 = mysql_fetch_assoc($result)) 
  {
	if ( $rowEmp1['cover'] == 1 )
		return 0;	
  }
 return 1;
 }

?>