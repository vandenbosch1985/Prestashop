/*
	This is the JavaScript file for the How to Create CAPTCHA Protection using PHP and AJAX Tutorial

	You may use this code in your own projects as long as this 
	copyright is left in place.  All code is provided AS-IS.
	This code is distributed in the hope that it will be useful,
 	but WITHOUT ANY WARRANTY; without even the implied warranty of
 	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
	
	For the rest of the code visit http://www.WebCheatSheet.com
	
	Copyright 2006 WebCheatSheet.com	

*/
//Gets the browser specific XmlHttpRequest Object 
function getXmlHttpRequestObject() {
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
var receiveReq = getXmlHttpRequestObject();
var msj= 'We send you an email for reset your password. Any inconvenience please contact the administrator. | <a href="index.php"><font style="color:#0000;">  Back </font></a>';

//Initiate the AJAX request
function makeRequest(url, param) {
//If our readystate is either not started or finished, initiate a new request
 if (receiveReq.readyState == 4 || receiveReq.readyState == 0) {
   //Set up the connection to captcha_test.html. True sets the request to asyncronous(default) 
   receiveReq.open("POST", url, true);
   //Set the function that will be called when the XmlHttpRequest objects state changes
   receiveReq.onreadystatechange = updatePage; 
   receiveReq.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
   //Make the request
   receiveReq.send(param);

 }   
}

//Called every time our XmlHttpRequest objects state changes
function updatePage() {
 //Check if our response is ready
 if (receiveReq.readyState == 4) {
   //Set the content of the DIV element with the response text
   $('#msg').html("<font style='font-style:normal; color:#FF6; font-size:13px; margin-top:-20px; height:50px; margin-left:55px;'>"+receiveReq.responseText+"</font>"); //receiveReq.responseText;   
   if (    receiveReq.responseText.localeCompare(msj)==0)
   		{
			$("#login-content").hide();
			$("#textLogin").hide();
		}
   //Get a reference to CAPTCHA image
   img = $("#imgCaptcha"); 
   //Change the image
   img.src = '/captcha/captcha.php';
 }

 
}

//Called every time when form is perfomed
function getParam(theForm) {
 //Set the URL

 var url = 'action_forgotPassword.php';
 //Set up the parameters of our AJAX call
 var postStr = $("#tmptxt").attr("name") + "=" + encodeURIComponent( $("#tmptxt").val() )+"&"+$("#email").attr("name") + "=" + encodeURIComponent( $("#email").val() );

 //Call the function that initiate the AJAX request
 makeRequest(url, postStr);
}