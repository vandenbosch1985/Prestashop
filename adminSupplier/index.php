<?php session_start();
if (!isset($_SESSION['k_username'])) { ?>
<SCRIPT LANGUAGE="javascript">
location.href = "login.php";
</SCRIPT>
<?php
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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
  <div id="panelControl"  style="padding-top:150px; padding-left:-90px;float:left; width:600px;" >
        <?php
		  echo "<b><strong><font color='#339933' face='Arial'>Welcome: </font></strong></b><font color='#333333' face='Arial'  style='font-style:normal'>".$_SESSION['k_email']."</font><font style='color:#333333;'>   |   </font>"; 
		echo "<a style='color:#009900;' href='supplier_InformationV2.php'>Personal Information</a><font style='color:#333333;'>   |   </font> "; 
		echo '<a href="logout.php" style="color:#009900;">Logout</a>';
		?>
        </div>
        
</div>
<div id="dummy2">
</div>
</body>
</html>

