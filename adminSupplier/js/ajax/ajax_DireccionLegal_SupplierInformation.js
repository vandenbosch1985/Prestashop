
//Gets the browser specific XmlHttpRequest Object 
function getXmlHttpRequestObjectDireccionLegal() {
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
var receiveReqDireccionLegal = getXmlHttpRequestObjectDireccionLegal();
var msjDireccionLegal= 'Your Legal Direction Information has been saved.';

//Initiate the AJAX request
function makeRequestDireccionLegal(url, param) {
//If our readystate is either not started or finished, initiate a new request
 if (receiveReqDireccionLegal.readyState == 4 || receiveReqDireccionLegal.readyState == 0) {
   //Set up the connection to captcha_test.html. True sets the request to asyncronous(default) 
   receiveReqDireccionLegal.open("POST", url, true);
   //Set the function that will be called when the XmlHttpRequest objects state changes
   receiveReqDireccionLegal.onreadystatechange = updatePageDireccionLegal; 
   receiveReqDireccionLegal.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
   //Make the request
   receiveReqDireccionLegal.send(param);

 }   
}

//Called every time our XmlHttpRequest objects state changes
function updatePageDireccionLegal() {
 //Check if our response is ready
 if (receiveReqDireccionLegal.readyState == 4) {
   //Set the content of the DIV element with the response text
   $('#msgDireccion1').html("<font style='font-style:normal; color:#FF6; font-size:13px; margin-top:-20px; height:50px; margin-left:55px;'>"+receiveReqDireccionLegal.responseText+"</font>"); //receiveReq.responseText;   
   $('#divUpdateDate').html((hoy.getYear()+1900)+"-"+zeromonth+(hoy.getMonth()+1)+"-"+zeroday+String(hoy.getDate())+" "+zerohour+hoy.getHours()+":"+zerominute+hoy.getMinutes()+":"+zerosecond+hoy.getSeconds());      
 }

 
}

//Called every time when form is perfomed
function getDireccionLegal(theForm) {
 if (validateFormDireccionLegal())
 {
 //Set the URL
 var url = 'actions/action_DireccionLegal_supplierInformation.php';
 //Set up the parameters of our AJAX call
 var postStr = 
 $("#idAddress1").attr("name") + "=" + encodeURIComponent( $("#idAddress1").val() ) +"&"+
 $("#country1").attr("name") + "=" + encodeURIComponent( $("#country1").val() ) +"&"+
 $("#state1").attr("name") + "=" + encodeURIComponent( $("#state1").val() ) +"&"+
 $("#county1").attr("name") + "=" + encodeURIComponent( $("#county1").val() ) +"&"+
 $("#town1").attr("name") + "=" + encodeURIComponent( $("#town1").val() ) +"&"+
 $("#postcode1").attr("name") + "=" + encodeURIComponent( $("#postcode1").val() ) +"&"+
 $("#street1").attr("name") + "=" + encodeURIComponent( $("#street1").val() ) +"&"+
 $("#number1").attr("name") + "=" + encodeURIComponent( $("#number1").val() ) +"&"+
 $("#floor1").attr("name") + "=" + encodeURIComponent( $("#floor1").val() ) +"&"+
 $("#dept1").attr("name") + "=" + encodeURIComponent( $("#dept1").val() ) +"&"+
  $("#idSupplierDireccion1").attr("name") + "=" + encodeURIComponent( $("#idSupplierDireccion1").val() ) +"&"+
 $("#alias1").attr("name") + "=" + encodeURIComponent( $("#alias1").val() );

 //Call the function that initiate the AJAX request
 makeRequestDireccionLegal(url, postStr);
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


function validateFormDireccionLegal(){
	
	if ( vacio ( $('#country1').val() ) == false )
	{
		$('#msgCountry1').html("<font style='font-style:normal; color:#FF6; font-size:13px; margin-top:-20px; height:50px; margin-left:5px;'>The Country is a required field.</font>");
		$('#country1').focus();
		return false;		
		}	
	else
		$('#msgCountry1').html("");
		
		
		if ( vacio ( $('#state1').val() ) == false )
	{
		$('#msgState1').html("<font style='font-style:normal; color:#FF6; font-size:13px; margin-top:-20px; height:50px; margin-left:5px;'>The State is a required field.</font>");
		$('#state1').focus();
		return false;		
		}	
	else
		$('#msgState1').html("");
		
		
			if ( vacio ( $('#county1').val() ) == false )
	{
		$('#msgCounty1').html("<font style='font-style:normal; color:#FF6; font-size:13px; margin-top:-20px; height:50px; margin-left:5px;'>The County is a required field.</font>");
		$('#county1').focus();
		return false;		
		}	
	else
		$('#msgCounty1').html("");
		
		
			if ( vacio ( $('#town1').val() ) == false )
	{
		$('#msgTown1').html("<font style='font-style:normal; color:#FF6; font-size:13px; margin-top:-20px; height:50px; margin-left:5px;'>The Town is a required field.</font>");
		$('#town1').focus();
		return false;		
		}	
	else
		$('#msgTown1').html("");
		
		
		
		if ( vacio ( $('#postcode1').val() ) == false )
	{
		$('#msgPostCode1').html("<font style='font-style:normal; color:#FF6; font-size:13px; margin-top:-20px; height:50px; margin-left:5px;'>The Post Code is a required field.</font>");
		$('#postcode1').focus();
		return false;		
		}	
	else
		$('#msgPostCode1').html("");
		
		
		
		if (!IsNumeric($('#postcode1').val(),12))
	{
		$('#msgPostCode1').html("<font style='font-style:normal; color:#FF6; font-size:13px; margin-top:-20px; height:50px; margin-left:5px;'>The PostCode allows only numbers.</font>");
		$('#postcode1').focus();
		return false;
	}
	else
		$('#msgPostCode1').html("");
		
		
		if ( vacio( $('#street1').val() ) == false )
		{
			$('#msgStreet1').html("<font style='font-style:normal; color:#FF6; font-size:13px; margin-top:-20px; height:50px; margin-left:5px;'>The Street is a required field. </font>");
			$('#street1').focus();
			return false;
			}
			else
			$('#msgStreet1').html("");
			
			
			
			if ( vacio( $('#number1').val() ) == false )
		{
			$('#msgNumber1').html("<font style='font-style:normal; color:#FF6; font-size:13px; margin-top:-20px; height:50px; margin-left:5px;'>The Number is a required field. </font>");
			$('#number1').focus();
			return false;
			}
			else
			$('#msgNumber1').html("");
			
					
	if (!IsNumeric($('#number1').val(),5))
	{
		$('#msgNumber1').html("<font style='font-style:normal; color:#FF6; font-size:13px; margin-top:-20px; height:50px; margin-left:5px;'>The Number field allows only numbers.</font>");
		$('#number1').focus();
		return false;
	}
	else
		$('#msgNumber1').html("");	
		
		
		if (!IsNumeric($('#floor1').val(),5))
	{
		$('#msgFloor1').html("<font style='font-style:normal; color:#FF6; font-size:13px; margin-top:-20px; height:50px; margin-left:5px;'>The floor allows only numbers.</font>");
		$('#floor1').focus();
		return false;
	}
	else
		$('#msgFloor1').html("");
		
		
		if ( $('#dept1').val().length > 1)
	{
		$('#msgDept1').html("<font style='font-style:normal; color:#FF6; font-size:13px; margin-top:-20px; height:50px; margin-left:5px;'>The Dept must be one character.</font>");
		$('#dept1').focus();
		return false;
	}
	else
		$('#msgDept1').html("");
	
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