<?php session_start();
if (isset($_SESSION['k_username'])) { ?>
<SCRIPT LANGUAGE="javascript">
location.href = "index.php";
</SCRIPT>
<?php
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />		
		<title>Supplier Dashboard</title>
		<LINK REL="stylesheet" TYPE="text/css" HREF="styles/styleSheetForgotPass.css">	
        <script type="text/javascript" src="js/validation.js"></script>
		<script type="text/javascript" src="js/jquery-1.2.6.js"></script>
        <script type="text/javascript">
$(document).ready(function() {
$("#submitButton").click(function() {
var action = $("#loginForm").attr('action');
var form_data = {
usuario: $("#usuario").val(),
password: $("#password").val(),
is_ajax: 1
};
$.ajax({
type: "POST",
url: action,
data: form_data,
success: function(response)
{
if(response == 'success')
$("#loginForm").slideUp('slow', function() {
$("#msg1").html("<p class='success'>You have logged in successfully!</p>");
location.href = "supplier_InformationV2.php";
});
else
if (response == 'no entry')
{
	$("#msg1").html("<p class='error'>You must enter a username and a password. Please try again.</p>");
}
else
{
$("#msg1").html("<p class='error'>Invalid username and/or password.</p>");
}
}
});
return false;
});
});
</script>			
	</head>
  
	<body id="login">
		
		<div id="login-wrapper" class="png_bg">
			<div id="login-top">
				<img src="img/Supplier-logo.png"  />			
		  </div>
			
			<div id="logindiv">
								<form method="POST" action="doLogin.php" id="loginForm" name="loginForm" >			
									 <div id="promptDiv" class="basePrompt">
                                     <div id="message"></div>
          <span id="msg1"></span>
          <span id="msg2"></span>
        </div>		
					<p>
						<label>Email</label>
						<input id="usuario" value="" name="usuario" class="text-input" type="text"   required autofocus/>
					</p>
					<br style="clear: both;" />
					<p>
						<label>Password</label>
						<input id="password" name="password" class="text-input" type="password" required />
					</p>
					<br style="clear: both;" />
					<p>
						<div id="buttonDiv">
						<input  class="button" type="submit" value="Sign In" id="submitButton" name="submitButton" />
						</div>
					</p>					
				</form>
                 <div style="height:50px; margin-top:20px;">
                 <a href="forgotPassword.php" style="font-style:normal; color:#FFF; font-size:13px; margin-top:-20px; height:50px; margin-left:55px;" ><b>Forgot your password?</b></a>
                 </div>
			</div>                                           
		</div>

		<div id="dummy"></div>
		<div id="dummy2"></div>
  </body>
</html>
