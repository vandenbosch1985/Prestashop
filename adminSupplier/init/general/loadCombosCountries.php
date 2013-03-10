<?php
require_once("commons/functions.php");
$con=conectar();
$CountryId = array();
$CountryName = array();
$result = mysql_query('SELECT cl.name,cl.id_country FROM ps_country c,ps_country_lang cl WHERE c.id_country=cl.id_country AND cl.id_lang=1 ORDER BY cl.name ');
$i=0;
while ($rowEmp1 = mysql_fetch_assoc($result)) 
  {
  	$CountryId[$i]=$rowEmp1['id_country'];
  	$CountryName[$i]=$rowEmp1['name'];
	$i=$i+1;
  }
  
  
$StateId = array();
$StateName = array();
$result = mysql_query('SELECT name,id_state FROM ps_state ORDER BY name');
$i=0;
while ($rowEmp1 = mysql_fetch_assoc($result)) 
  {
  	$StateId[$i]=$rowEmp1['id_state'];
  	$StateName[$i]=$rowEmp1['name'];
	$i=$i+1;
  }
  
$CountyId = array();
$CountyName = array();
$result = mysql_query('SELECT name,id_county FROM ps_county ORDER BY name');
$i=0;
while ($rowEmp1 = mysql_fetch_assoc($result)) 
  {
  	$CountyId[$i]=$rowEmp1['id_county'];
  	$CountyName[$i]=$rowEmp1['name'];
	$i=$i+1;
  }


?>