
//Gets the browser specific XmlHttpRequest Object 
function getXmlHttpRequestObjectInfoUsuario() {
 if (window.XMLHttpRequest) {
    return new XMLHttpRequest(); //Mozilla, Safari ...
 } else if (window.ActiveXObject) {
    return new ActiveXObject("Microsoft.XMLHTTP"); //IE
 } else {
    //Display our error message
    alert("Your browser doesn't support the XmlHttpRequest object.");
 }
}

//Our XmlHttpRequest object
var receiveReqInfoUsuario = getXmlHttpRequestObjectInfoUsuario();
var msjInfoUsuario= 'Your information has been saved.';

//Initiate the AJAX request
function makeRequestInformacionUsuario(url, param) {
//If our readystate is either not started or finished, initiate a new request
 if (receiveReqInfoUsuario.readyState == 4 || receiveReqInfoUsuario.readyState == 0) {
   //Set up the connection to captcha_test.html. True sets the request to asyncronous(default) 
   receiveReqInfoUsuario.open("POST", url, true);
   //Set the function that will be called when the XmlHttpRequest objects state changes
   receiveReqInfoUsuario.onreadystatechange = updatePageInformacionUsuario; 
   receiveReqInfoUsuario.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
   //Make the request
   receiveReqInfoUsuario.send(param);

 }   
}

//Called every time our XmlHttpRequest objects state changes
function updatePageInformacionUsuario() {
 //Check if our response is ready
 if (receiveReqInfoUsuario.readyState == 4) {
   //Set the content of the DIV element with the response text
   $('#msgInformacionUsuario').html("<font style='font-style:normal; color:#FF6; font-size:13px; margin-top:-20px; height:50px; margin-left:55px;'>"+receiveReqInfoUsuario.responseText+"</font>"); //receiveReq.responseText;   
   $('#divUpdateDate').html((hoy.getYear()+1900)+"-"+zeromonth+(hoy.getMonth()+1)+"-"+zeroday+String(hoy.getDate())+" "+zerohour+hoy.getHours()+":"+zerominute+hoy.getMinutes()+":"+zerosecond+hoy.getSeconds());      
 }

 
}

//Called every time when form is perfomed
function getInformacionUsuario(theForm) {

 if (validateFormInfoUsuario())
 {
 //Set the URL
 var url = 'actions/action_informacionUsuario_supplierInformation.php';
 //Set up the parameters of our AJAX call
 var postStr = 
 $("#firstName").attr("name") + "=" + encodeURIComponent( $("#firstName").val() ) +"&"+
 $("#lastName").attr("name") + "=" + encodeURIComponent( $("#lastName").val() ) +"&"+
 $("#socialNumber").attr("name") + "=" + encodeURIComponent( $("#socialNumber").val() ) +"&"+
 $("#mobilTelephone").attr("name") + "=" + encodeURIComponent( $("#mobilTelephone").val() ) +"&"+
 $("#birthday").attr("name") + "=" + encodeURIComponent( $("#birthday").val() ) +"&"+
 $("#gender").attr("name") + "=" + encodeURIComponent( $("#gender").val() ) +"&"+
 $("#charge").attr("name") + "=" + encodeURIComponent( $("#charge").val() ) +"&"+
 $("#charge").attr("name") + "=" + encodeURIComponent( $("#charge").val() ) +"&"+
 $("#idSupplierUsuarioInformacion").attr("name") + "=" + encodeURIComponent( $("#idSupplierUsuarioInformacion").val() );

 //Call the function that initiate the AJAX request
 makeRequestInformacionUsuario(url, postStr);
}
}


function checkAge(Fecha){
	fecha = new Date(Fecha)
	hoy = new Date()
	ed = parseInt((hoy -fecha)/365/24/60/60/1000)
	if (ed < 18) {
		$('#msgBirthday').html("<font style='font-style:normal; color:#FF6; font-size:13px; margin-top:-20px; height:50px; margin-left:5px;'>Your age must be over 18 years.</font>");		
		return false;
	}
	return true;
}


function validateFormInfoUsuario(){

		if ( vacio( $('#firstName').val() ) == false )
		{
			$('#divFirstName').html("<font style='font-style:normal; color:#FF6; font-size:13px; margin-top:-20px; height:50px; margin-left:5px;'>The First Name is a required field.</font>");
			$('#firstName').focus();
		return false;
			}
			else
				$('#divFirstName').html("");
				
		
		if ( vacio( $('#lastName').val() ) == false )
		{
			$('#divLastName').html("<font style='font-style:normal; color:#FF6; font-size:13px; margin-top:-20px; height:50px; margin-left:5px;'>The Last Name is a required field.</font>");
			$('#lastName').focus();
		return false;
			}
			else
				$('#divLastName').html("");
				
				
		if ( vacio( $('#socialNumber').val() ) == false )
		{
			$('#msgSocialNumber').html("<font style='font-style:normal; color:#FF6; font-size:13px; margin-top:-20px; height:50px; margin-left:5px;'>The Social Number is a required field.</font>");
			$('#socialNumber').focus();
		return false;
			}
			else
				$('#msgSocialNumber').html("");
		

	if (!IsNumeric($('#socialNumber').val(),50))
	{
		$('#msgSocialNumber').html("<font style='font-style:normal; color:#FF6; font-size:13px; margin-top:-20px; height:50px; margin-left:5px;'>The Social Number allows only numbers.</font>");
		$('#socialNumber').focus();
		return false;
	}
	else
		$('#msgSocialNumber').html("");
		
	//Check if the social number tiene una longitud de 8 numeros	
	if ( $('#socialNumber').val().length != '8')
	{
		$('#msgSocialNumber').html("<font style='font-style:normal; color:#FF6; font-size:13px; margin-top:-20px; height:50px; margin-left:5px;'>The Social Number must be 8 numbers.</font>");
		$('#socialNumber').focus();
		return false;
	}
	else
		$('#msgSocialNumber').html("");
		
		
		
	if ( vacio($('#mobilTelephone').val())== false )	
	{
		$('#msgMobilTelephone').html("<font style='font-style:normal; color:#FF6; font-size:13px; margin-top:-20px; height:50px; margin-left:5px;'>The Mobil Telephone is a required field.</font>");
		$('#mobilTelephone').focus();
		return false;
		}
		else
		$('#msgMobilTelephone').html("");
		
		
	if (!IsNumeric($('#mobilTelephone').val(),50))
	{
		$('#msgMobilTelephone').html("<font style='font-style:normal; color:#FF6; font-size:13px; margin-top:-20px; height:50px; margin-left:5px;'>The Mobil Telephone allows only numbers.</font>");
		$('#mobilTelephone').focus();
		return false;
	}
	else
		$('#msgMobilTelephone').html("");
	
	//check if the age is > 18
	if ( !checkAge($('#birthday').val()) )
	{		
		$('#birthday').focus();
		return false;
	}
	else
		$('#msgBirthday').html("");			
	
	
	return true;
	
}


function IsNumeric(sText)

{
   var ValidChars = "0123456789.";
   var IsNumber=true;
   var Char;

 
   for (i = 0; i < sText.length && IsNumber == true; i++) 
      { 
      Char = sText.charAt(i); 
      if (ValidChars.indexOf(Char) == -1) 
         {
         IsNumber = false;
         }
      }
   return IsNumber;
   
   }
   
   
   
   function vacio(q) {  
        for ( i = 0; i < q.length; i++ ) {  
                if ( q.charAt(i) != " " ) {  
                        return true  
                }  
        }  
        return false  
}  