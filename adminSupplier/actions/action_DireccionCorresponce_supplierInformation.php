<?php session_start();
require_once("../commons/functions.php");
$con=conectar();
$idSupplier = $_POST['idSupplierDireccion2'];
//*************************************************************************************************************************************//
//Check the required and date values
if ( $_POST['country2'] == "")
	die("The Country is a required field");
	
if ( $_POST['state2'] == "")
	die("The State is a required field");

if ( $_POST['county2'] == "")
	die("The County is a required field");

if ( $_POST['postcode2']=="")
	die("The PostCode is a required field");	
	
if ( $_POST['street2'] == "")
	die("The Street is a required field");	
	
if ( $_POST['number2'] == "")
	die("The number is a required field");
	
	
//*************************************************************************************************************************************//


if ($_POST['idAddress2']== "")
{
	$query="INSERT INTO ps_address2 (alias,id_country,id_state,id_county,postcode,street,number,floor,dept,type,town,id_supplier) VALUES(
	'".$_POST['alias2']."',
	'".$_POST['country2']."',
	'".$_POST['state2']."',
	'".$_POST['county2']."',
	'".$_POST['postcode2']."',
	'".$_POST['street2']."',
	'".$_POST['number2']."',
	'".$_POST['floor2']."',
	'".$_POST['dept2']."',
	'2',
	'".$_POST['town2']."',
	".$idSupplier.")";
mysql_query($query,$con) or die ("We have problems to update your account. Please contact the Administrator.4");
}
else
{
//Update ps_address2
$query="update ps_address2 set alias='".$_POST['alias2']."',id_country='".$_POST['country2']."',id_state='".$_POST['state2']."',
id_county='".$_POST['county2']."',town='".$_POST['town2']."', postcode='".$_POST['postcode2']."',street='".$_POST['street2']."',number='".$_POST['number2']."',
floor='".$_POST['floor2']."',dept='".$_POST['dept2']."', type='2' where id_address=".$_POST['idAddress2'];
mysql_query($query,$con) or die ("We have problems to update your account. Please contact the Administrator.5");
}

echo 'Your corresponce direction information has been saved.';
?>