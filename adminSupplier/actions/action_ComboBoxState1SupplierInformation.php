<?php session_start();
require_once("../commons/functions.php");
$con=conectar();
$idState = $_POST['state1'];

$idCounty = array();
$nameCounty = array();
$qCounty="SELECT id_county,name FROM ps_county  WHERE id_state=".$idState;
$result = mysql_query($qCounty);
$i=0;
while ($rowEmp1 = mysql_fetch_assoc($result)) 
  {    
	$idCounty[$i]= $rowEmp1['id_county'];
	$nameCounty[$i]= $rowEmp1['name'];
	$i=$i+1;
  }

  echo "<select name='county1' id='county1' required style='width:155px;' >";   
  echo "<option value='' style='border:none'>  </option>";                      
  for ($i=0; $i<count($idCounty); $i++)
		{							                         													                     
			echo "<option value=".$idCounty[$i]." style='border:none'>".$nameCounty[$i]."</option>";
		}			
   echo "</select>";
    
  
?>