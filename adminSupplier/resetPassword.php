<?php session_start();
include("commons/functions.php");
conectar();
//Check if the id exist in the database
$message='';
$decrypted=decrypt($HTTP_GET_VARS["token"], 'abcd');
$result = mysql_query("SELECT * FROM ps_supplier_user WHERE secure_key='".$decrypted."'");


if ( (mysql_num_rows ( $result )== 0) || ($HTTP_GET_VARS["token"]=='') )
	{$message='<br />The user account not exist. Please contact the administrator. <a href="index.php" ><font style="font-style:normal; color:#FFF; font-size:13px; margin-top:-20px; height:50px; margin-left:15px;" >Back</font></a>';}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />		
		<title>Supplier Dashboard</title>
		<LINK REL="stylesheet" TYPE="text/css" HREF="styles/styleSheetForgotPass.css">	
        		<LINK REL="stylesheet" TYPE="text/css" HREF="styles/styleStrengthPassword.css">	
                <script type="text/javascript" src="js/validation.js"></script>
                                <script type="text/javascript" src="js/ajax_captcha_ResetPassw.js"></script>
                                <script type="text/javascript" src="js/StrengthPasswordFunction.js"></script>
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3/jquery.js"></script>
		
		
</head>
  
	<body id="login">
		
		<div id="login-wrapper" class="png_bg">
			<div id="login-top">
				<img src="img/Supplier-logo.png"  />			
		  </div>
			<?php
			if ($message=='')
			{
			?>			
            <div id="textLogin">
            <p style="padding-top:1px; padding-bottom:10px;">
            Write your new password twice for change your acces to your account please:</p></div>
            <div id="msg" style="width:400px;"></div>
			<div id="login-content">

								<form name="F" method="post" style="width:350px;" onclick="return checkPassword(this);" id="F">
									<input type="hidden" name="token" value="<?php echo $decrypted; ?>" id="token"  />				
					<p>
						<label>New Password</label>
						<input id="newPassword" name="newPassword" class="text-input" type="password" onkeyup="passwordStrength(this.value)" required autofocus/>
					</p>
					<br style="clear: both;" />	
                    <p>
						<label>Retype New Password</label>
						<input id="newPassword2"  name="newPassword2" class="text-input" type="password"  required/>
					</p>					
					<br style="clear: both;" />
					<p>
                    
                    <p>

                        <label  for="passwordStrength">Password strength</label>

                        <div id="passwordDescription">Password not entered</div>

                        <div style="margin-left:12px;"  id="passwordStrength" class="strength0"></div>

                </p>
                
                <p>
                 <img src="captcha/captcha.php" width="100" height="30" vspace="3" id="imgCaptcha" name="imgCaptcha"><br>
		  <input style="margin-left:60px;" name="tmptxt" type="text" size="30" id="tmptxt"><br>		  
		  <input name="action" type="hidden" value="checkdata">
                <br />
                    
						<input class="button" type="button" value="Submit" name="submitButton" onclick="getParam(this)"/>
					</p>					
				</form>                 
			</div>                                           
			<?php
			}
			else
			{
			echo $message;
			}
			?>
		</div>

		<div id="dummy"></div>
		<div id="dummy2"></div>
  </body>
</html>