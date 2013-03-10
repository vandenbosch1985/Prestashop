<?php session_start();
include("commons/functions.php");
$con=conectar();

function containsString($str, $content, $ignorecase=true){
if ($ignorecase){
$str = strtolower($str);
$content = strtolower($content);
} 
return (strpos($content,$str)!==false) ? true : false;
}


//Ask if the passwords inputs are different from null
if(trim($HTTP_POST_VARS["newPassword"]) != "" && trim($HTTP_POST_VARS["newPassword2"]) != "")
{
	if ($_SESSION['tmptxt'] == $_POST['tmptxt'])
	{
		//Ask if the passwords inputs are equals    
		$newPassword = htmlentities($HTTP_POST_VARS["newPassword"], ENT_QUOTES);   
		$newPassword2 = htmlentities($HTTP_POST_VARS["newPassword2"], ENT_QUOTES);
		

		$result = mysql_query("SELECT email,id_supplier FROM ps_supplier_user WHERE secure_key='".$HTTP_POST_VARS["token"]."'");		
		$row = mysql_fetch_array($result);
		$email = $row['email'];	
		$idSupplier = $row['id_supplier'];	
		if(  true ===  containsString($newPassword,$email,true) ) 
		{
 			echo 'The password can not contain your email / username. Please try again.';
		}
		else		
		{
			if ( $newPassword == $newPassword2 ) 
			{ 	
			$query = "UPDATE ps_supplier_user set passwd=MD5('".$newPassword."') where id_supplier=".$idSupplier;				
			mysql_query($query,$con) or die ("We have problems to update your account. Please contact the Administrator.");
			echo 'Your password is reset correctly. Please login to your account with your new password. Thank you very much. | <a href="index.php"><font style="color:#0000;">  Back </font></a>';	
			}
			else
				echo 'The password must be equals. For security you have to repeat all the process. ';
			}
	}
	else	
		echo 'The captcha that you insert is wrong. Please try again. ';		
}
	else
		echo 'You must put a password for reset your access account. For security you have to repeat all the process. ';

mysql_close();
?>