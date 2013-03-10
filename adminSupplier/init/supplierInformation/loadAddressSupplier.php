<?php
require_once("commons/functions.php");
$con=conectar();

//Get the address information from supplier
$q="SELECT count(*) FROM ps_address2 WHERE id_supplier=".$idSupplier;
$result = mysql_query($q);
$p=0;
while ($rowEmp1 = mysql_fetch_assoc($result)) 
  {  
	$p= $rowEmp1['count(*)'];
  }
if (  $p>0 )
{
$result = mysql_query('SELECT id_address,alias,id_country,id_state,id_county,town,postcode,street,number,floor,dept,type FROM ps_address2 WHERE id_supplier='.$idSupplier);
$i=0;
while ($rowEmp1 = mysql_fetch_assoc($result)) 
  {
	if ($i==0)
	{
		$idAddress1 = $rowEmp1['id_address'];
		$alias1 = $rowEmp1['alias'];
		$idCountry1 =$rowEmp1['id_country'];
		$idState1 = $rowEmp1['id_state'];
		$idCounty1 =$rowEmp1['id_county'];
		$town1 = $rowEmp1['town'];
		$postcode1 = $rowEmp1['postcode'];
		$street1 = $rowEmp1['street'];
		$number1 = $rowEmp1['number'];
		$floor1 = $rowEmp1['floor'];
		$dept1 = $rowEmp1['dept']; 
		$type1 = $rowEmp1['type'];		 
	}
	else
	{
		$idAddress2 = $rowEmp1['id_address'];
		$alias2 = $rowEmp1['alias'];
		$idCountry2 =$rowEmp1['id_country'];
		$idState2 = $rowEmp1['id_state'];
		$idCounty2 =$rowEmp1['id_county'];
		$town2 = $rowEmp1['town'];
		$postcode2 = $rowEmp1['postcode'];
		$street2 = $rowEmp1['street'];
		$number2 = $rowEmp1['number'];
		$floor2 = $rowEmp1['floor'];
		$dept2 = $rowEmp1['dept']; 
		$type2 = $rowEmp1['type'];		 
	}
	$i=$i+1;
  }
  }
?>