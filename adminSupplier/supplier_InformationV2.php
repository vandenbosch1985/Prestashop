<?php session_start();
require_once("commons/functions.php");
include("init/general/loadCombosCountries.php");
include("init/supplierInformation/loadSupplier2.php");
include("init/supplierInformation/loadItem.php");
include("init/supplierInformation/loadAddressSupplier.php");
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
<LINK REL="stylesheet" TYPE="text/css" HREF="css/ui-lightness/jquery-ui-1.8.18.custom.css">	
<script type="text/javascript" src="js/ajax/ajax_InformacionUsuario_SupplierInformation.js" ></script> 
<script type="text/javascript" src="js/ajax/ajax_InformacionTienda_SupplierInformation.js" > </script>
<script type="text/javascript" src="js/ajax/ajax_DireccionLegal_SupplierInformation.js" > </script>
<script type="text/javascript" src="js/ajax/ajax_DireccionCorresponce_SupplierInformation.js" > </script>
<script type="text/javascript" src="js/ajax/ajax_ComboBoxCountry1_SupplierInformation.js" > </script>
<script type="text/javascript" src="js/ajax/ajax_ComboBoxCountry2_SupplierInformation.js" > </script>
<script type="text/javascript" src="js/ajax/ajax_ComboBoxState1_SupplierInformation.js" > </script>
<script type="text/javascript" src="js/ajax/ajax_ComboBoxState2_SupplierInformation.js" > </script>
<script type="text/javascript" src="js/SupplierInformationFunctions.js" > </script>
<script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>		
<script type="text/javascript" src="js/jquery-ui-1.8.18.custom.min.js"></script>
</head>  	
<script type="text/javascript">
$(function() {
		$( "#birthday" ).datepicker({                 
                dateFormat: "yy-mm-dd",
				changeMonth:true,
				changeYear:true                
                });        
});
</script>						
<body id="login">		
<div id="login-wrapper" class="png_bg">
			<div id="login-top">
				<img src="img/Supplier-logo.png"  />			
		  </div>			                                        
</div>
<div id="dummy">
  <div id="panelControl"  style="padding-top:150px; padding-left:-90px;float:left; width:600px;" >
        <?php
		  echo "<b><strong><font color='#339933' face='Arial'>Welcome: </font></strong></b><font color='#333333' face='Arial'  style='font-style:normal'>Jorge Alfaro</font><font style='color:#333333;'>   | </font><a href='logout.php' style='color:#009900;'> Logout</a>"; 		
		?>
        </div>        
</div>
<div id="dummy2" align="center">
<table align="center" style="margin-top:40px;width:550px;" >
<tr>
<td >
<div id="idAdminCatalogo" style="background:#F3F3F3;width:550px;height:40px;display:table;" onMouseOver="changeIconCatalogo();" onclick="goToCatalogo();">
<img src="img/Icon.png"  align="left" style="margin-top:8px;margin-left:8px;"/>
<center>
<div id="txtAdministrarCatalogo" align="center" style="width:200px;height:20px;margin-top:14px;align-text:center;display:table;" ><font style="color:#595959;"><b>Administrar Catalogo</b></font></div>
</center>
</div>
</td>
</tr>
<tr>
<td>
<div id="ContAdminCatalogo" style="display:table">

</div>
</td>
</tr> 
<tr>
<td style="padding-top:15px;">
<div id="idInformacionTienda" style="background:#F3F3F3;width:550px;height:40px;display:table;" onClick="changeStatusInfoTienda();" onMouseOver="changeIconInfoTienda();" >
<img src="img/Icon.png"  align="left" style="margin-top:8px;margin-left:8px;"/>
<center>
<div id="txtInformacionTienda" align="center" style="width:200px;height:20px;margin-top:14px;align-text:center;display:table;" ><font style="color:#595959;"><b>Información de la tienda</b></font></div>
</center>
</div>
</td>
</tr>
<tr>
<td>
<div id="msgInformacionTienda" align="center"></div>
<div id="ContInformacionTienda" style="display:none;" >
<table  border="0" align="center" style="margin-top:10px;">
<form id="formTiendaInfo" action="">
					  <tr>
					    <td width="150px;"><label>Name:</label> </td>
					    <td><input id="fantasyName" maxlength="64" value= <?php
						echo "'".$nameSupplier."'";
						?>  name="fantasyName" class="text-input" type="text"   required autofocus/></td>
                        <td style="width:150px;"><div id="divName" style="width:200px;"></div></td> 
                        <td width="250px"></td>
				      </tr>
                      
                      <tr >
                      <td style="width:150px;"><label>Legal Name:</label></td>
                      <td><input id="legalName" value=<?php
					  echo "'".$legaNameSupplier."'";
					  ?> name="legalName" class="text-input" type="text" maxlength="64"   required /></td>
                      <td style="width:150px;"><div id="divlegalName"></div></td> <td></td>
                      </tr>
               <input type="hidden" value="" id="idSupplier" name="idSupplier"  />       
                      <tr>
                      <td style="width:150px;"><label>Item:</label></td>
                      <td><select name="item" id="item" required style="width:155px;">
						 <?php
					  	if ( $itemSupplier=="") 					  
							echo "<option value='' selected='selected' style='border:none'> </option>";
	
					  	for ($i=0; $i<count($ItemId); $i++)
						{
							if ($ItemId[$i] == $itemSupplier)
                         		echo "<option value=".$ItemId[$i]." selected='selected' style='border:none'>".$ItemName[$i]."</option>";
							else					                       
								echo "<option value=".$ItemId[$i]." style='border:none'>".$ItemName[$i]."</option>";
						}
						?>                                   
                        </select>
                        </td>
                        <td style="width:150px;"><div id="divItem"></div></td> <td></td>
                      </tr>
                      
                      <tr>
                      <td style="width:150px;"><label>Description:</label></td>
                      <td><input id="description" maxlength="200" value=<?php
					  echo "'".$descriptionSupplier."'";
					  ?> name="description" class="text-input" type="text"    /></td>                      
                      <td style="width:150px;"></td> <td></td>
                      </tr>
                      
                      <tr>
                      <td nowrap="nowrap" style="width:150px;"><label>Short description:</label></td>
                      <td><input id="shortDescription" maxlength="100" value=<?php
					  echo "'".$shortDescriptionSupplier."'";
					  ?> name="shortDescription" class="text-input" type="text"   /></td>
                      <td style="width:150px;"></td> <td></td>
                      </tr>
                      
                      <tr>
                      <td style="width:150px;"><label>Meta Title:</label></td>
                      <td><input id="metaTitle" maxlength="128" value=<?php
					  echo "'".$metaTitleSupplier."'";
					  ?> name="metaTitle" class="text-input" type="text"   /></td>
                      <td style="width:150px;"></td> <td></td>
                      </tr>
                      
                      <tr>
                      <td nowrap="nowrap" style="width:150px;"><label>Meta Keywords:</label></td>
                      <td><input id="metaKeywords" maxlength="255" value=<?php
					  echo "'".$metaKeywordsSupplier."'";
					  ?> name="metaKeywords" class="text-input" type="text"   /></td>
                      <td style="width:150px;"></td> <td></td>
                      </tr>
                      
                      <tr>
                      <td nowrap="nowrap" style="width:150px;"><label>Meta Description:</label></td>
                      <td><input id="metaDescription"maxlength="255" value=<?php
					  echo "'".$metaDescriptionSupplier."'";
					  ?> name="metaDescription" class="text-input" type="text"   /></td>
                      <td style="width:150px;"></td> <td></td>
                      </tr>					  										 					 
					    
					  <tr>
                      <td nowrap="nowrap" style="width:150px;"><label>User Add:</label></td>
                      <td height="25px;">17/04/2012 12:28:12</td>
                      <td style="width:150px;"></td> <td></td>
                      </tr>
					  
					   <tr>
                      <td nowrap="nowrap" style="width:150px;"><label>User Update:</label></td>
                      <td height="25px;">17/04/2012 12:28:12</td>
                      <td style="width:150px;"></td> <td></td>
                      </tr>
					  <input type="hidden" value="<?php echo $_SESSION["k_idUser"]; ?>" id="idSupplierInformacionTienda" name="idSupplierInformacionTienda"  />       
					   <tr>
					  <td style="width:150px;"></td>
                      <td height="25px;"></td>
                      <td colspan="2"><input type="button" value="Actualizar" class="btn" style="margin-left:130px;" onClick="getInformacionTienda(this);"/></td> 					  </form>
					  </tr>
					  
					  </table>
</div>
</td>
</tr>

<tr>
<td style="padding-top:15px;">
<div id="idDirecciones" style="background:#F3F3F3;width:550px;height:40px;display:table;" onMouseOver="changeIconDirecciones();" onClick="changeStatusDirecciones();">
<img src="img/Icon.png"  align="left" style="margin-top:8px;margin-left:8px;"/>
<center>
<div id="txtDirecciones" align="center" style="width:200px;height:20px;margin-top:14px;align-text:center;display:table;" ><font style="color:#595959;"><b>Direcciones</b></font></div>
</center>
</div>
</td>
</tr>
<tr>
<td>
<div id="ContDirecciones" style="display:none;">
<table  border="0"  style="margin-top:10px;">
						<div id="msgDireccion1" align="center"></div>
                        <div id="msgDireccion2" align="center">
					  <tr>
                      <form action="" id="formdireccionlegal">
                      <td colspan="3" ><label><font color="#FFFFFF" size="+0.2"><b>Legal</b></font></label></td>
                      <td></td>
                      <td style="width:150px;"></td> 
					  <td></td>
                      </tr>
					 
					  <input type="hidden" value="<?php echo $_SESSION["k_idUser"]; ?>" id="idSupplierDireccion1" name="idSupplierDireccion1"  />       
					  <tr>					 
                      <td nowrap="nowrap" style="width:150px;"><label>Country:</label></td>
                      <td><select name="country1" id="country1" required style="width:155px;" onChange="return getParamComboBoxCountry1(this);">                      		 <?php 		
					  	if ($idCountry1=='')
							echo "<option value='' selected='selected' style='border:none'> </option>";		  
					  	for ($i=0; $i<count($CountryId); $i++)
						{
							if ($idCountry1==$CountryId[$i])
                         		echo "<option value=".$CountryId[$i]." selected='selected' style='border:none'>".$CountryName[$i]."</option>";
							else					                       
								echo "<option value=".$CountryId[$i]." style='border:none'>".$CountryName[$i]."</option>";
						}
						?>   
                        </select>
                        </td>
                        <td><div id="msgCountry1"></div></td>
						</tr>
						
						<tr>
						  <td nowrap="nowrap" style="width:150px;"><label>State:</label></td>
						  <td><div id="divState1">
                          <select name="state1" id="state1" required style="width:155px;" onChange="return getParamComboBoxState1(this);">
                          <?php 
					   if ($idState1=='')
							echo "<option value='' selected='selected' style='border:none'> </option>";		  					  
					  	for ($i=0; $i<count($StateId); $i++)
						{
							if ($idState1==$StateId[$i])
                         		echo "<option value=".$StateId[$i]." selected='selected' style='border:none'>".$StateName[$i]."</option>";
							else
							if ($idState1 =='')
									echo "<option value='' style='border:none'> </option>";
							else					                       
								echo "<option value=".$StateId[$i]." style='border:none'>".$StateName[$i]."</option>";
						}
						?>                          	</select></div>
					</td>
                    <td><div id="msgState1"></div></td>
					</tr>
					
					<tr>
                    <td nowrap="nowrap" style="width:150px;"><label>County:</label></td>
                    <td><div id="divCounty1"><select name="county1" id="county1" required style="width:155px;">                      	 				
                    <?php 		
						if ($idCounty1=='')
							echo "<option value='' selected='selected' style='border:none'> </option>";				  
					  	for ($i=0; $i<count($CountyId); $i++)
						{
							if ($idCounty1==$CountyId[$i])
                         		echo "<option value=".$CountyId[$i]." selected='selected' style='border:none'>".$CountyName[$i]."</option>";
							else					                       
								echo "<option value=".$CountyId[$i]." style='border:none'>".$CountyName[$i]."</option>";
						}
						?>  
                        </select></div>
                    </td>
                    <td><div id="msgCounty1"></div></td>
					</tr>
					
					<tr>
					 <tr>
                    <td><label>Town:</label></td>
					<td><input id="town1"  name="town1" class="text-input" type="text" value= <?php
					echo "'".$town1."'";
					?>		/>
                    </td>
                    <td><div id="msgTown1"></div></td>
					</tr>


					<tr>
                    <td>	<label>PostCode:</label></td>
                    <td>    <input id="postcode1"maxlength="12" value=<?php
					echo "'".$postcode1."'";
					?> name="postcode1" class="text-input" type="text"  required/></td>
                    <td width="200px"><div id="msgPostCode1"></div></td>
					</tr>
										
					<tr>
                    <td>	<label>Street:</label>						</td>
					<td>	<input id="street1"maxlength="50" value=<?php
					echo "'".$street1."'";
					?> name="street1" class="text-input" type="text"  required/></td>
                    <td><div id="msgStreet1"></div></td>
					</tr>
					
					 <tr>
                    <td>	<label>Number:</label>						</td>
					<td>	<input id="number1" maxlength="5"  name="number1" class="text-input" type="text" value=<?php
					echo "'".$number1."'";
					?> required/></td>
                    <td width="200px"><div id="msgNumber1"></div></td>
					</tr>
					
					 <tr>
                    <td><label>Floor:</label>						</td>
					<td>	<input id="floor1"maxlength="3"  name="floor1" class="text-input" type="text" value= <?php
					if ( ( $floor1!='') && ($floor1!=0) )
						echo "'".$floor1."'";
					else
						echo "'".""."'";
					?> /></td>
                    <td width="200px"><div id="msgFloor1"></div></td>
					</tr>
					
					<tr>
                    <td><label>Dept:</label>						</td>
					<td><input id="dept1" maxlength="10"  name="dept1" class="text-input" type="text"  value=<?php
					echo "'".$dept1."'";
					?> /></td>
                    <td width="200px"><div id="msgDept1"></div></td>
					</tr>
					<input type="hidden" value="<?php echo $_SESSION["k_idUser"]; ?>" id="idSupplierDireccion1" name="idSupplierDireccion1"  />       
					<tr>
                      <td style="width:150px;"><label>Alias:</label>	</td>
                      <td><input id="alias1" maxlength="32"  name="alias1" class="text-input" type="text" value=<?php
					  echo "'".$alias1."'";
					  ?>  
                      />
                      </td>
                        <td ></td>
						</tr>
						
						 <tr>
                      <td style="width:150px;"><label>User Add:</label></td>
                      <td height="25px;">17/04/2012 12:28:12</td>
                      <td style="width:150px;"></td>
                      </tr>
					  
					   <tr>
                      <td style="width:150px;"><label>User Update:</label></td>
                      <td height="25px;">17/04/2012 12:28:12</td>
                      <td style="width:150px;"></td> 
                      </tr>
					  
					    <tr>
					  <td style="width:150px;"></td>
                      <td height="25px;"></td>
                      <td colspan="2"><input type="button" value="Actualizar" class="btn" style="margin-left:150px;" onClick="getDireccionLegal(this);" /></td> 					
					  </tr>
					  			</form>		  
					  <tr>
					  <td colspan="3" style="padding-top:20px;"><hr /></td>
					  </tr>
					  
					  

					  <tr><form id="direccioncorresform" action="" >
                      <td colspan="3" ><label><font color="#FFFFFF" size="+0.2"><b>Legal</b></font></label></td>
                      <td></td>
                      <td style="width:150px;">					  </div></td> 
					  <td></td>
                      </tr>
					 
					  
					  <tr>					 
                      <td nowrap="nowrap" style="width:150px;"><label>Country:</label></td>
                      <td><select name="country2" id="country2" required style="width:155px;" onChange="return getParamComboBoxCountry2(this);">
                       <?php
					   if ($idCountry2=='')
							echo "<option value='' selected='selected' style='border:none'> </option>";		   					  
					  	for ($i=0; $i<count($CountryId); $i++)
						{							
							if ($idCountry2==$CountryId[$i])
                         		echo "<option value=".$CountryId[$i]." selected='selected' style='border:none'>".$CountryName[$i]."</option>";
							else					                       
								echo "<option value=".$CountryId[$i]." style='border:none'>".$CountryName[$i]."</option>";
						}
						?>   
                        </select>
                        </td>
                        <td><div id="msgCountry2"></div></td>
						</tr>
						
						<tr>
						  <td nowrap="nowrap" style="width:150px;"><label>State:</label></td>
						  <td><div id="divState2"><select name="state2" id="state2" required style="width:155px;" onChange="return getParamComboBoxState2(this);">
                      <?php 					  
					  if ($idState2=='')
							echo "<option value='' selected='selected' style='border:none'> </option>";	
					  	for ($i=0; $i<count($StateId); $i++)
						{
							if ($idState2==$StateId[$i])
                         		echo "<option value=".$StateId[$i]." selected='selected' style='border:none'>".$StateName[$i]."</option>";
							else					                       
								echo "<option value=".$StateId[$i]." style='border:none'>".$StateName[$i]."</option>";
						}
						?>   				
                        </select></div>
					</td>
                    <td><div id="msgState2"></div></td>
					</tr>
					
					<tr>
                    <td nowrap="nowrap" style="width:150px;"><label>County:</label></td>
                    <td><div id="divCounty2"><select name="county2" id="county2" required style="width:155px;">
                         <?php 	
						 if ($idCounty2=='')
							echo "<option value='' selected='selected' style='border:none'> </option>";				  				  
					  	for ($i=0; $i<count($CountyId); $i++)
						{
							if ($idCounty2==$CountyId[$i])
                         		echo "<option value=".$CountyId[$i]." selected='selected' style='border:none'>".$CountyName[$i]."</option>";
							else					                       
								echo "<option value=".$CountyId[$i]." style='border:none'>".$CountyName[$i]."</option>";
						}
						?>  				
                        </select></div>
                    </td>
                    <td><div id="msgCounty2"></div></td>
					</tr>
					
					<tr>
					 <tr>
                    <td><label>Town:</label></td>
					<td><input id="town2"  name="town2" class="text-input" type="text" value= <?php
					echo "'".$town2."'";
					?>		/>
                    </td>
                    <td><div id="msgTown2"></div></td>
					</tr>


					<tr>
                    <td>	<label>PostCode:</label></td>
                    <td>    <input id="postcode2"maxlength="12" value=<?php
					echo "'".$postcode2."'";
					?> name="postcode2" class="text-input" type="text"  required/></td>
                    <td width="200px"><div id="msgPostCode2"></div></td>
					</tr>
										
					<tr>
                    <td>	<label>Street:</label>						</td>
					<td>	<input id="street2"maxlength="50" value=<?php
					echo "'".$street2."'";
					?> name="street2" class="text-input" type="text"  required/></td>
                    <td><div id="msgStreet2"></div></td>
					</tr>
					
					 <tr>
                    <td>	<label>Number:</label>						</td>
					<td>	<input id="number2" maxlength="5"  name="number2" class="text-input" type="text" value=<?php
					echo "'".$number2."'";
					?> required/></td>
                    <td width="200px"><div id="msgNumber2"></div></td>
					</tr>
					
					 <tr>
                    <td><label>Floor:</label>						</td>
					<td>	<input id="floor2"maxlength="3"  name="floor2" class="text-input" type="text" value=<?php
					if ( ( $floor2!='') && ($floor2!=0) )
						echo "'".$floor2."'";
					else
						echo "'".""."'";
					?> /></td>
                    <td width="200px"><div id="msgFloor2"></div></td>
					</tr>
					
					<tr>
                    <td><label>Dept:</label>						</td>
					<td><input id="dept2" maxlength="10"  name="dept2" class="text-input" type="text"  value=<?php
					echo "'".$dept2."'";
					?> /></td>
                    <td width="200px"><div id="msgDept2"></div></td>
					</tr>
					
					<tr>
                      <td style="width:150px;"><label>Alias:</label>	</td>
                      <td><input id="alias2" maxlength="32"  name="alias2" class="text-input" type="text" value=<?php
					  echo "'".$alias2."'";
					  ?>  
                      />
                      </td>
                        <td ></td>
						</tr>
						
						 <tr>
                      <td style="width:150px;"><label>User Add:</label></td>
                      <td height="25px;">17/04/2012 12:28:12</td>
                      <td style="width:150px;"></td>
                      </tr>
					  
					   <tr>
                      <td style="width:150px;"><label>User Update:</label></td>
                      <td height="25px;">17/04/2012 12:28:12</td>
                      <td style="width:150px;"></td> 
                      </tr>
							<input type="hidden" value="<?php echo $_SESSION["k_idUser"]; ?>" id="idSupplierDireccion2" name="idSupplierDireccion2"  />       
					    <tr>
					  <td style="width:150px;"></td>
                      <td height="25px;"></td>
                      <td colspan="2"><input type="button" value="Actualizar" class="btn" style="margin-left:150px;" onClick="getDireccionCorresponce(this);"/></td> 					  
					  </tr>		</form>			  					 
</table>
</div>
</td>
</tr>


<tr>
<td style="padding-top:15px;">
<div id="idInformacionUsuario" style="background:#F3F3F3;width:550px;height:40px;display:table;" onMouseOver="changeIconInfoUsuario();" onClick="changeStatusInfoUsuario();">
<img src="img/Icon.png"  align="left" style="margin-top:8px;margin-left:8px;"/>
<center>
<div id="txtInformacionUsuario" align="center" style="width:200px;height:20px;margin-top:14px;align-text:center;display:table;" ><font style="color:#595959;"><b>Información de Usuario</b></font></div>
</center>
</div>
</td>
</tr>
<tr>
<td>
<div id="msgInformacionUsuario" align="center"></div>
<div id="ContInformacionUsuario" style="margin-bottom:50px;display:none;">
<table  border="0"  style="margin-top:10px;">
   <tr><form id="formuser" action="">
                      <td style="width:150px;"><label>First Name:</label></td>
                      <td><input id="firstName"maxlength="64" value=<?php 
					  echo "'".$firsNameSupplier."'";
					  ?> name="firstName" class="text-input" type="text"  required /></td>
                      <td style="width:150px;"><div id="divFirstName"></div></td> <td></td>
                      </tr>
                      
                       <tr>
                      <td style="width:150px;"><label>Last Name:</label></td>
                      <td><input id="lastName"maxlength="64" value=<?php
					  echo "'".$lastNameSupplier."'";
					  ?>  name="lastName" class="text-input" type="text"  required /></td>
                      <td style="width:150px;"><div id="divLastName"></div></td> <td></td>
                      </tr>
                      
                      <tr>
                      <td style="width:150px;"><label>Social Number:</label></td>
                      <td><input id="socialNumber"maxlength="64" value=<?php
					  echo "'".$dniSupplier."'";
					  ?> name="socialNumber" class="text-input" type="text"  required /></td>
                       
                      <td style="width:250px;"><div id="msgSocialNumber"></div></td> <td></td>
                      </tr>
                      
                      <tr>
                      <td style="width:150px;"><label>Mobil Telephone:</label></td>
                      <td><input id="mobilTelephone"maxlength="50" value=<?php
					  echo "'".$mobilePhoneSupplier."'";
					  ?> name="mobilTelephone" class="text-input" type="text"  required /></td>					  
                      <td style="width:250px;"><div id="msgMobilTelephone"></div></td>                       
                      </tr>
                      
                      <tr>
                      <td style="width:150px;"><label>Birthday:</label></td>                      
                      <td>
                      	<input  type="text" id="birthday" name="birthday" class="text-input"
						value=<?php
					  if ( $birthdaySupplier!= '0000-00-00')
						  echo "'".$birthdaySupplier."'";
						 else
						 echo "'".""."'";
					  ?>    					  
					   /></td>
                      <td style="width:250px;"><div id="msgBirthday"></div></td> <td></td>
                      </tr>
                      
                      <tr>
                      <td style="width:150px;"><label>Gender:</label></td>
                      <td><select name="gender" id="gender" required style="width:155px;">
                       		<?php
						if ($genderSupplier==1)
						{
                        	echo "<option value='1' selected='selected' style='border:none'>Male</option>";					
                        	echo "<option value='2' style='border:none'>Female</option>";					
						}
						else
						{
							echo "<option value='1'  style='border:none'>Male</option>";					
                        	echo "<option value='2' selected='selected' style='border:none'>Female</option>";
						}
						?>						
                        </select>
                        </td>
                        <td style="width:150px;"></td> <td></td>
                      </tr>
                      
                      <tr>
                      <td style="width:150px;"><label>Charge:</label></td>
                      <td><input id="charge" maxlength="50" value=<?php
					  echo "'".$chargeSupplier."'";
					  ?> name="charge" class="text-input" type="text"  />
                        </td>
                        <td style="width:150px;"></td> <td></td>
                      </tr>
                      <input type="hidden" value="<?php echo $_SESSION["k_idUser"]; ?>" id="idSupplierUsuarioInformacion" name="idSupplierUsuarioInformacion"  />       
						 <tr>
                      <td style="width:150px;"><label>User Add:</label></td>
                      <td height="25px;">17/04/2012 12:28:12</td>
                      <td style="width:150px;"></td>
                      </tr>
					  
					   <tr>
                      <td style="width:150px;"><label>User Update:</label></td>
                      <td height="25px;">17/04/2012 12:28:12</td>
                      <td style="width:150px;"></td> 
                      </tr>
					  
					    <tr>
					  <td style="width:150px;"></td>
                      <td height="25px;"></td>
                      <td colspan="2"><input type="button" value="Actualizar" class="btn" style="margin-left:150px;" onClick="getInformacionUsuario(this);" /></td> 					  </form>
					  </tr>
</table>
</div>
</td>
</tr>

</table>
</div>
</body>
</html>