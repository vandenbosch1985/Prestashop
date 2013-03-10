<?php
session_start();
include("commons/functions.php");
conectar();
if( trim($HTTP_POST_VARS["email"]) != "")
{
		if ($_SESSION['tmptxt'] == $_POST['tmptxt']) 
		{
			$usuario = strtolower(htmlentities($HTTP_POST_VARS["usuario"], ENT_QUOTES));   
			$email = $HTTP_POST_VARS["email"];
			 
		 
			$result = mysql_query('SELECT id_supplier,email,secure_key FROM ps_supplier_user WHERE email=\''.$email.'\'');
			if($row = mysql_fetch_array($result)){    	
				if($row["email"] == $email){ 			 
					$text = $row["id_supplier"];			
					$encrypted=encrypt($row['secure_key'],'abcd'); 			 			 			 
					mail($email,'Recover Password - Supplier Dashboard','Please click here to reset your password: http://190.105.235.50/~jalfaro/PrestaShopProject/adminSupplier/resetPassword.php?token='.$encrypted);
					echo 'We send you an email for reset your password. Any inconvenience please contact the administrator. | <a href="index.php"><font style="color:#0000;">  Back </font></a>';
				}else{
					echo 'Email not exist. Please rewrite it.';
				}
			}else{
				echo 'User not exist in the database. Please rewrite it.';
			}
			mysql_free_result($result);			
		}
		else
			echo 'The captcha that you insert is wrong. Please try again. ';
			
}
else
	echo 'You must specify a valid email';

mysql_close();
?>