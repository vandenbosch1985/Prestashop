<?php session_start();
require_once("../commons/functions.php");
$con=conectar();
$idSupplier = $_POST['idSupplierInformacionTienda'];
//*************************************************************************************************************************************//
//Check the required and date values
if ( $_POST['fantasyName']=="")
	die("The name is a required field");

if ( $_POST['legalName'] =="" )
	die("The Legal Name is a required field");
	
if ( $_POST['item'] == "" )
	die("The Item is a required field");
	
//*************************************************************************************************************************************//


//Get Actual Time
$qDate="SELECT now() 
FROM  ps_supplier_user";
$result = mysql_query($qDate);
while ($rowEmp1 = mysql_fetch_assoc($result)) 
  {  
	$fecha= $rowEmp1['now()'];
  }
  
// update date update supplier2 
$query="update ps_supplier2 set date_upd='".$fecha."'
where id_supplier=".$idSupplier; 
mysql_query($query,$con) or die ("We have problems to update your account. Please contact the Administrator.1");

//Update ps_supplier2
$q="SELECT count(*) FROM ps_supplier2 WHERE id_supplier=".$idSupplier;
$result = mysql_query($q);
$i=0;
while ($rowEmp1 = mysql_fetch_assoc($result)) 
  {  
	$i= $rowEmp1['count(*)'];
  }
if (  $i>0 )
{
$query="update ps_supplier2 set name='".$_POST['fantasyName']."',legal_name='".$_POST['legalName']."', item='".$_POST['item']."',
description='".$_POST['description']."',short_description='".$_POST['shortDescription']."', meta_title='".$_POST['metaTitle']."',
meta_keywords='".$_POST['metaKeywords']."',meta_description='".$_POST['metaDescription']."'
where id_supplier=".$idSupplier;  
mysql_query($query,$con) or die ("We have problems to update your account. Please contact the Administrator.2");
}
else
{
$query ="insert into ps_supplier2(name,legal_name,item,description,short_description,meta_title,meta_keywords,meta_description,id_supplier) VALUES('".$_POST['fantasyName']."','".$_POST['legalName']."','".$_POST['item']."','".$_POST['description']."','".$_POST['shortDescription']."', '".$_POST['metaTitle']."','".$_POST['metaKeywords']."','".$_POST['metaDescription']."',".$idSupplier.")";
mysql_query($query,$con) or die ("We have problems to update your account. Please contact the Administrator.3");
}

echo 'Your information has been saved.';
?>