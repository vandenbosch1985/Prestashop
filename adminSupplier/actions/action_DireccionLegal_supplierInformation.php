<?php session_start();
require_once("../commons/functions.php");
$con=conectar();
$idSupplier = $_POST['idSupplierDireccion1'];
//*************************************************************************************************************************************//
//Check the required and date values
if ( $_POST['country1'] == "")
	die("The Country is a required field");
	
if ( $_POST['state1'] == "")
	die("The State is a required field");

if ( $_POST['county1'] == "")
	die("The County is a required field");

if ( $_POST['postcode1']=="")
	die("The PostCode is a required field");	
	
if ( $_POST['street1'] == "")
	die("The Street is a required field");	
	
if ( $_POST['number1'] == "")
	die("The number is a required field");
	
	
//*************************************************************************************************************************************//


if ($_POST['idAddress1']== "")
{
	$query="INSERT INTO ps_address2 (alias,id_country,id_state,id_county,postcode,street,number,floor,dept,type,town,id_supplier) VALUES(
	'".$_POST['alias1']."',
	'".$_POST['country1']."',
	'".$_POST['state1']."',
	'".$_POST['county1']."',
	'".$_POST['postcode1']."',
	'".$_POST['street1']."',
	'".$_POST['number1']."',
	'".$_POST['floor1']."',
	'".$_POST['dept1']."',
	'1',
	'".$_POST['town1']."',
	".$idSupplier.")";

mysql_query($query,$con) or die ("We have problems to update your account. Please contact the Administrator.4");
}
else
{
//Update ps_address2
$query="update ps_address2 set alias='".$_POST['alias1']."',id_country='".$_POST['country1']."',id_state='".$_POST['state1']."',
id_county='".$_POST['county1']."',town='".$_POST['town1']."', postcode='".$_POST['postcode1']."',street='".$_POST['street1']."',number='".$_POST['number1']."',
floor='".$_POST['floor1']."',dept='".$_POST['dept1']."', type='1' where id_address=".$_POST['idAddress1'];
mysql_query($query,$con) or die ("We have problems to update your account. Please contact the Administrator.5");
}

echo 'Your legal direction information has been saved.';
?>