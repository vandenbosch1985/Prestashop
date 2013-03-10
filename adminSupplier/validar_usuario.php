<?php session_start();
require_once("commons/functions.php");
conectar();
if(trim($HTTP_POST_VARS["usuario"]) != "" && trim($HTTP_POST_VARS["password"]) != "")
{
    $usuario = strtolower(htmlentities($HTTP_POST_VARS["usuario"], ENT_QUOTES));   
    $password = $HTTP_POST_VARS["password"];
     
 
    $result = mysql_query('SELECT nickname,password, email FROM ps_supplier WHERE email=\''.$usuario.'\'');
    if($row = mysql_fetch_array($result)){
        if($row["password"] == MD5($password)){
 			 $_SESSION["k_email"] = $row['email'];
            $_SESSION["k_username"] = $row['nickname'];                                      
           ?>
            <SCRIPT LANGUAGE="javascript">
            location.href = "index.php";
            </SCRIPT>
 <?php
        }else{
            $message= 'Password Incorrect. Please try again.';
        }
    }else{
        $message = 'The user dont exist in the database. Please try again.';
    }
    mysql_free_result($result);
}else{
    $message = 'You must specify valid username and password. Please try again.';
}
mysql_close();	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />		
	<title>Supplier Dashboard</title>
		<LINK REL="stylesheet" TYPE="text/css" HREF="styles/styleSheet.css">	
		<script type="text/javascript" src="js/jquery-1.2.6.js"></script>
		
		
</head>  
<body id="login">		
<div id="login-wrapper" class="png_bg">
			<div id="login-top">
				<img src="img/Supplier-logo.png"  />			
		  </div>			                                        
</div>
<div id="dummy">
  <div id="panelControl"  style="padding-top:150px; padding-left:50px;float:left; width:400px;" >
        <?php
        echo "<font color='#333333' face='Arial'  style='font-style:normal'>".$message."  |  "; 
		echo '<a href="index.php" style="color:#009900;">Back</a>';
		?>
        </div>
        
</div>
<div id="dummy2"></div>
</body>
</html>