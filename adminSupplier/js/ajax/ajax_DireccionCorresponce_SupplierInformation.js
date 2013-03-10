
//Gets the browser specific XmlHttpRequest Object 
function getXmlHttpRequestObjectDireccionCorresponce() {
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
var receiveReqDireccionCorresponce = getXmlHttpRequestObjectDireccionCorresponce();
var msjDireccionCorresponce= 'Your Corresponce Direction information has been saved.';

//Initiate the AJAX request
function makeRequestDireccionCorresponce(url, param) {
//If our readystate is either not started or finished, initiate a new request
 if (receiveReqDireccionCorresponce.readyState == 4 || receiveReqDireccionCorresponce.readyState == 0) {
   //Set up the connection to captcha_test.html. True sets the request to asyncronous(default) 
   receiveReqDireccionCorresponce.open("POST", url, true);
   //Set the function that will be called when the XmlHttpRequest objects state changes
   receiveReqDireccionCorresponce.onreadystatechange = updatePageDireccionCorresponce; 
   receiveReqDireccionCorresponce.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
   //Make the request
   receiveReqDireccionCorresponce.send(param);

 }   
}

//Called every time our XmlHttpRequest objects state changes
function updatePageDireccionCorresponce() {
 //Check if our response is ready
 if (receiveReqDireccionCorresponce.readyState == 4) {
   //Set the content of the DIV element with the response text
   $('#msgDireccion2').html("<font style='font-style:normal; color:#FF6; font-size:13px; margin-top:-20px; height:50px; margin-left:55px;'>"+receiveReqDireccionCorresponce.responseText+"</font>"); //receiveReq.responseText;   
   $('#divUpdateDate').html((hoy.getYear()+1900)+"-"+zeromonth+(hoy.getMonth()+1)+"-"+zeroday+String(hoy.getDate())+" "+zerohour+hoy.getHours()+":"+zerominute+hoy.getMinutes()+":"+zerosecond+hoy.getSeconds());      
 }

 
}

//Called every time when form is perfomed
function getDireccionCorresponce(theForm) {
 if (validateFormDireccionCorresponce())
 {
 //Set the URL
 var url = 'actions/action_DireccionCorresponce_supplierInformation.php';
 //Set up the parameters of our AJAX call
 var postStr = 
 $("#idAddress2").attr("name") + "=" + encodeURIComponent( $("#idAddress2").val() ) +"&"+
 $("#country2").attr("name") + "=" + encodeURIComponent( $("#country2").val() ) +"&"+
 $("#state2").attr("name") + "=" + encodeURIComponent( $("#state2").val() ) +"&"+
 $("#county2").attr("name") + "=" + encodeURIComponent( $("#county2").val() ) +"&"+
 $("#town2").attr("name") + "=" + encodeURIComponent( $("#town2").val() ) +"&"+
 $("#postcode2").attr("name") + "=" + encodeURIComponent( $("#postcode2").val() ) +"&"+
 $("#street2").attr("name") + "=" + encodeURIComponent( $("#street2").val() ) +"&"+
 $("#number2").attr("name") + "=" + encodeURIComponent( $("#number2").val() ) +"&"+
 $("#floor2").attr("name") + "=" + encodeURIComponent( $("#floor2").val() ) +"&"+
 $("#dept2").attr("name") + "=" + encodeURIComponent( $("#dept2").val() ) +"&"+
  $("#idSupplierDireccion2").attr("name") + "=" + encodeURIComponent( $("#idSupplierDireccion2").val() ) +"&"+
 $("#alias2").attr("name") + "=" + encodeURIComponent( $("#alias2").val() );

 //Call the function that initiate the AJAX request
 makeRequestDireccionCorresponce(url, postStr);
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


function validateFormDireccionCorresponce(){
	
	if ( vacio ( $('#country2').val() ) == false )
	{
		$('#msgCountry2').html("<font style='font-style:normal; color:#FF6; font-size:13px; margin-top:-20px; height:50px; margin-left:5px;'>The Country is a required field.</font>");
		$('#country2').focus();
		return false;		
		}	
	else
		$('#msgCountry2').html("");
		
		
		if ( vacio ( $('#state2').val() ) == false )
	{
		$('#msgState2').html("<font style='font-style:normal; color:#FF6; font-size:13px; margin-top:-20px; height:50px; margin-left:5px;'>The State is a required field.</font>");
		$('#state2').focus();
		return false;		
		}	
	else
		$('#msgState2').html("");
		
		
			if ( vacio ( $('#county2').val() ) == false )
	{
		$('#msgCounty2').html("<font style='font-style:normal; color:#FF6; font-size:13px; margin-top:-20px; height:50px; margin-left:5px;'>The County is a required field.</font>");
		$('#county2').focus();
		return false;		
		}	
	else
		$('#msgCounty2').html("");
		
		
			if ( vacio ( $('#town2').val() ) == false )
	{
		$('#msgTown2').html("<font style='font-style:normal; color:#FF6; font-size:13px; margin-top:-20px; height:50px; margin-left:5px;'>The Town is a required field.</font>");
		$('#town2').focus();
		return false;		
		}	
	else
		$('#msgTown2').html("");
		
		
		
		if ( vacio ( $('#postcode2').val() ) == false )
	{
		$('#msgPostCode2').html("<font style='font-style:normal; color:#FF6; font-size:13px; margin-top:-20px; height:50px; margin-left:5px;'>The Post Code is a required field.</font>");
		$('#postcode2').focus();
		return false;		
		}	
	else
		$('#msgPostCode2').html("");
		
		
		
		if (!IsNumeric($('#postcode2').val(),12))
	{
		$('#msgPostCode2').html("<font style='font-style:normal; color:#FF6; font-size:13px; margin-top:-20px; height:50px; margin-left:5px;'>The PostCode allows only numbers.</font>");
		$('#postcode2').focus();
		return false;
	}
	else
		$('#msgPostCode2').html("");
		
		
		if ( vacio( $('#street2').val() ) == false )
		{
			$('#msgStreet2').html("<font style='font-style:normal; color:#FF6; font-size:13px; margin-top:-20px; height:50px; margin-left:5px;'>The Street is a required field. </font>");
			$('#street2').focus();
			return false;
			}
			else
			$('#msgStreet2').html("");
			
			
			
			if ( vacio( $('#number2').val() ) == false )
		{
			$('#msgNumber2').html("<font style='font-style:normal; color:#FF6; font-size:13px; margin-top:-20px; height:50px; margin-left:5px;'>The Number is a required field. </font>");
			$('#number2').focus();
			return false;
			}
			else
			$('#msgNumber2').html("");
			
					
	if (!IsNumeric($('#number2').val(),5))
	{
		$('#msgNumber2').html("<font style='font-style:normal; color:#FF6; font-size:13px; margin-top:-20px; height:50px; margin-left:5px;'>The Number field allows only numbers.</font>");
		$('#number2').focus();
		return false;
	}
	else
		$('#msgNumber2').html("");	
		
		
		if (!IsNumeric($('#floor2').val(),5))
	{
		$('#msgFloor2').html("<font style='font-style:normal; color:#FF6; font-size:13px; margin-top:-20px; height:50px; margin-left:5px;'>The floor allows only numbers.</font>");
		$('#floor2').focus();
		return false;
	}
	else
		$('#msgFloor2').html("");
		
		
		if ( $('#dept2').val().length > 1)
	{
		$('#msgDept2').html("<font style='font-style:normal; color:#FF6; font-size:13px; margin-top:-20px; height:50px; margin-left:5px;'>The Dept must be one character.</font>");
		$('#dept2').focus();
		return false;
	}
	else
		$('#msgDept2').html("");
	
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