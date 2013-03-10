<?php
require_once("commons/functions.php");
$con=conectar();

$result = mysql_query("SELECT puser.id_supplier,puser.email,puser.first_name,puser.last_name,puser.dni,puser.mobile_phone,puser.birthday,puser.id_gender,puser.charge,
ps2.name,ps2.legal_name,ps2.item,ps2.description,ps2.short_description,ps2.meta_title,ps2.meta_keywords,ps2.meta_description,ps2.date_add,
ps2.date_upd
FROM ps_supplier_user puser LEFT JOIN  ps_supplier2 ps2 ON ps2.id_supplier=puser.id_supplier WHERE puser.email='".$_SESSION['k_email']."'"); 

$i=0;
while ($rowEmp1 = mysql_fetch_assoc($result)) 
  {
	$user_upd=$rowEmp1['date_upd'];
    $user_add=$rowEmp1['date_add'];
	$idSupplier=$rowEmp1['id_supplier'];
	$emailSupplier=$rowEmp1['email'];
	$firsNameSupplier = $rowEmp1['first_name'];
	$lastNameSupplier = $rowEmp1['last_name'];
	$dniSupplier = $rowEmp1['dni'];
	$mobilePhoneSupplier =$rowEmp1['mobile_phone'];
	if ($rowEmp1['birthday'] != "")
		$birthdaySupplier= $rowEmp1['birthday'];
	else
		$birthdaySupplier="";
	$genderSupplier = $rowEmp1['id_gender'];
	$chargeSupplier = $rowEmp1['charge'];
	$nameSupplier = $rowEmp1['name'];
	$legaNameSupplier = $rowEmp1['legal_name'];
	$itemSupplier =$rowEmp1['item'];
	$descriptionSupplier =$rowEmp1['description'];
	$shortDescriptionSupplier =$rowEmp1['short_description'];
	$metaTitleSupplier = $rowEmp1['meta_title'];
	$metaKeywordsSupplier =$rowEmp1['meta_keywords'];
	$metaDescriptionSupplier= $rowEmp1['meta_description'];
  }
  

?>