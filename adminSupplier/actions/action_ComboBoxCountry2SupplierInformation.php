<?php session_start();
require_once("../commons/functions.php");
$con=conectar();
$idCountry = $_POST['country2'];

$idState = array();
$nameState = array();
$qState="SELECT id_state,name FROM ps_state  WHERE id_country=".$idCountry;
$result = mysql_query($qState);
$i=0;
while ($rowEmp1 = mysql_fetch_assoc($result)) 
  {    
	$idState[$i]= $rowEmp1['id_state'];
	$nameState[$i]= $rowEmp1['name'];
	$i=$i+1;
  }

  
  
  
  echo "<select name='state2' id='state2' required style='width:155px;' onchange='return getParamComboBoxState2(this);'>";     
  echo "<option value='' style='border:none'>  </option>";    
  for ($i=0; $i<count($idState); $i++)
		{							                         													                     
			echo "<option value=".$idState[$i]." style='border:none'>".$nameState[$i]."</option>";
		}			
   echo "</select>";
    
  
?>