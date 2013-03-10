<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />		
		<title>Supplier Dashboard</title>
		<LINK REL="stylesheet" TYPE="text/css" HREF="styles/styleSheetForgotPass.css">
        <script language="JavaScript" type="text/javascript" src="js/ajax_captcha_ForgotPassw.js"></script>	
		<script type="text/javascript" src="js/jquery-1.2.6.js"></script>	
        <script type="text/javascript" src="js/validation.js"></script>    
	</head>
  
	<body id="login">
		
		<div id="login-wrapper" class="png_bg">
			<div id="login-top">
				<img src="img/Supplier-logo.png"  />			
		  </div>
          <div id="textLogin">
			            <p style="padding-top:1px; padding-bottom:10px;">Please write your email for reset your password:</p></div>
                         <div id="msg"></div>
			<div id="login-content">                     
								<form method="post"  name="F" id="F">					
					<p>                    
						<label>Email</label>
						<input name="email" class="text-input" type="text" id="email" required autofocus />
					</p>                  					
					<br style="clear: both;" />
                       <img src="captcha/captcha.php" width="100" height="30" vspace="3" id="imgCaptcha"><br>
		  <input style="margin-left:60px;" id="tmptxt" name="tmptxt" type="text" size="30" required><br>		  
		  <input name="action" type="hidden" value="checkdata">
                <br />
					<p>
						<input class="button" type="button" value="Send" name="submitButton" onclick="getParam(this)" />
					</p>					
				</form>
                 <div style="height:50px; margin-top:20px;">
                 <a href="index.php" style="font-style:normal; color:#FFF; font-size:13px; margin-top:-20px; height:50px; margin-left:55px;" ><b>Back</b></a>
                 </div>
			</div>                                           
		</div>

		<div id="dummy"></div>
		<div id="dummy2"></div>
  </body>
</html>
