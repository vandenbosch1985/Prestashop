<?php session_start();
include('commons/functions.php');
conectar();
$usuario = $_REQUEST['usuario'];
$password = $_REQUEST['password'];
if( $usuario != "" && $password != "")
{
    $result = mysql_query('SELECT id_supplier,first_name,last_name,email,passwd FROM ps_supplier_user WHERE email=\''.$usuario.'\'');
    if($row = mysql_fetch_array($result)){
        if($row["passwd"] == MD5($password)){
            $_SESSION["k_username"] = $row['last_name']." ".$row['first_name'];
			$_SESSION["k_idUser"] = $row['id_supplier'];
			$_SESSION["k_email"] = $usuario;
			echo "success";                                     
        }
		else
		echo "no sucess";
    mysql_free_result($result);
}
mysql_close();	
}
else
echo "no entry";
?>
