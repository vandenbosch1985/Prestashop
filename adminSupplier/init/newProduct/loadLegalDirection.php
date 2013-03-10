<?php
require_once("commons/functions.php");
$con=conectar();

$legalDirection ="";
$result = mysql_query('
SELECT street,number,floor,dept
FROM ps_address2
WHERE type=1 and id_supplier ='.$_SESSION["k_idUser"]
);

while ($rowEmp1 = mysql_fetch_assoc($result)) 
  {
    $legalDirection = $rowEmp1['street']." ".$rowEmp1['number']." ".$rowEmp1['floor']." ".$rowEmp1['dept'];
  }
?>