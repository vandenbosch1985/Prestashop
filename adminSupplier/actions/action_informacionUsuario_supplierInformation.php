<?php session_start();
require_once("../commons/functions.php");
$con=conectar();
$idSupplier = $_POST['idSupplierUsuarioInformacion'];
//*************************************************************************************************************************************//
//Check the required and date values
if ( $_POST['firstName'] == "")
	die("The First Name is a required field");

if ( $_POST['lastName'] == "")
	die("The Last Name is a required field");
	
if ( $_POST['socialNumber']== "" )
	die("The Social Number is a required field");

if ( $_POST['mobilTelephone'] == "")
	die("The Mobil Telephone is a required field");
	
if ($_POST['birthday']!='')
{
$queryCheckBirthday = "SELECT DATEDIFF( NOW(),'".$_POST['birthday']."') as 'dif' FROM ps_supplier_user";
$result = mysql_query($queryCheckBirthday);
while ($rowEmp1 = mysql_fetch_assoc($result)) 
  {  
	$anios= $rowEmp1['dif'];
  }
  if ($anios < 18 )
  	die($anios."The age must be over 18 years old");
}
	
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

//Update ps_supplier_user
$query="update ps_supplier_user set first_name='".$_POST['firstName']."',last_name='".$_POST['lastName']."',dni='".$_POST['socialNumber']."',
mobile_phone='".$_POST['mobilTelephone']."',birthday='".$_POST['birthday']."',id_gender='".$_POST['gender']."',charge='".$_POST['charge']."'
where id_supplier=".$idSupplier; 
mysql_query($query,$con) or die ("We have problems to update your account. Please contact the Administrator.1");

echo 'Your information has been saved.';
?>