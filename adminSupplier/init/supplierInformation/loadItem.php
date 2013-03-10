<?php
require_once("commons/functions.php");
$con=conectar();

$ItemId = array();
$ItemName = array();
$result = mysql_query('SELECT id_item,name FROM ps_item');
$i=0;
while ($rowEmp1 = mysql_fetch_assoc($result)) 
  {
  	$ItemId[$i]=$rowEmp1['id_item'];
  	$ItemName[$i]=$rowEmp1['name'];
	$i=$i+1;
  }
?>