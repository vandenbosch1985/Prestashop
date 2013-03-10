
//Gets the browser specific XmlHttpRequest Object 
function getXmlHttpRequestObjectInfoTienda() {
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
var receiveReqInfoTienda = getXmlHttpRequestObjectInfoTienda();
var msjInfoTienda= 'Your information has been saved.';

//Initiate the AJAX request
function makeRequestInformacionTienda(url, param) {
//If our readystate is either not started or finished, initiate a new request
 if (receiveReqInfoTienda.readyState == 4 || receiveReqInfoTienda.readyState == 0) {
   //Set up the connection to captcha_test.html. True sets the request to asyncronous(default) 
   receiveReqInfoTienda.open("POST", url, true);
   //Set the function that will be called when the XmlHttpRequest objects state changes
   receiveReqInfoTienda.onreadystatechange = updatePageInformacionTienda; 
   receiveReqInfoTienda.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
   //Make the request
   receiveReqInfoTienda.send(param);

 }   
}

//Called every time our XmlHttpRequest objects state changes
function updatePageInformacionTienda() {
 //Check if our response is ready
 if (receiveReqInfoTienda.readyState == 4) {
   //Set the content of the DIV element with the response text
   $('#msgInformacionTienda').html("<font style='font-style:normal; color:#FF6; font-size:13px; margin-top:-20px; height:50px; margin-left:55px;'>"+receiveReqInfoTienda.responseText+"</font>"); //receiveReq.responseText;   
   $('#divUpdateDate').html((hoy.getYear()+1900)+"-"+zeromonth+(hoy.getMonth()+1)+"-"+zeroday+String(hoy.getDate())+" "+zerohour+hoy.getHours()+":"+zerominute+hoy.getMinutes()+":"+zerosecond+hoy.getSeconds());      
 }

 
}

//Called every time when form is perfomed
function getInformacionTienda(theForm) {

 if (validateFormInformacionTienda())
 {
 //Set the URL
 var url = 'actions/action_informacionTienda_supplierInformation.php';
 //Set up the parameters of our AJAX call
 var postStr = 
 $("#fantasyName").attr("name") + "=" + encodeURIComponent( $("#fantasyName").val() )+"&"+
 $("#legalName").attr("name") + "=" + encodeURIComponent( $("#legalName").val() ) +"&"+
 $("#idSupplier").attr("name") + "=" + encodeURIComponent( $("#idSupplier").val() ) +"&"+
 $("#item").attr("name") + "=" + encodeURIComponent( $("#item").val() ) +"&"+
 $("#description").attr("name") + "=" + encodeURIComponent( $("#description").val() ) +"&"+
 $("#shortDescription").attr("name") + "=" + encodeURIComponent( $("#shortDescription").val() ) +"&"+
 $("#metaTitle").attr("name") + "=" + encodeURIComponent( $("#metaTitle").val() ) +"&"+
 $("#metaKeywords").attr("name") + "=" + encodeURIComponent( $("#metaKeywords").val() ) +"&"+
 $("#metaDescription").attr("name") + "=" + encodeURIComponent( $("#metaDescription").val() ) +"&"+
 $("#idSupplierInformacionTienda").attr("name") + "=" + encodeURIComponent( $("#idSupplierInformacionTienda").val() );

 //Call the function that initiate the AJAX request
 makeRequestInformacionTienda(url, postStr);
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


function validateFormInformacionTienda(){
	
	if ( vacio($('#fantasyName').val())== false )
		{
			$('#divName').html("<font style='font-style:normal; color:#FF6; font-size:13px; margin-top:-20px; height:50px; margin-left:5px;'>The name is a required field.</font>");
			$('#fantasyName').focus();
			return false;
		}
		else
			$('#divName').html("");
				
			if ( vacio($('#legalName').val())== false )
	{
		$('#divlegalName').html("<font style='font-style:normal; color:#FF6; font-size:13px; margin-top:-20px; height:50px; margin-left:5px;'>The legal name is a required field.</font>");
		$('#legalName').focus();
		return false;
	}
	else
		$('#divlegalName').html("");
		
		
		if ( vacio($('#item').val())== false )
		{
		$('#divItem').html("<font style='font-style:normal; color:#FF6; font-size:13px; margin-top:-20px; height:50px; margin-left:5px;'>The Item is a required field.</font>");
		$('#item').focus();
		return false;
	}
	else
		$('#divItem').html("");
	
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