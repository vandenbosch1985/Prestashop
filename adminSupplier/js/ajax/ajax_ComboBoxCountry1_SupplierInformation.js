
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

//Initiate the AJAX request
function makeRequestComboBoxCountry1(url, param) {
//If our readystate is either not started or finished, initiate a new request
 if (receiveReq.readyState == 4 || receiveReq.readyState == 0) {
   //Set up the connection to captcha_test.html. True sets the request to asyncronous(default) 
   receiveReq.open("POST", url, true);
   //Set the function that will be called when the XmlHttpRequest objects state changes
   receiveReq.onreadystatechange = updatePageComboBoxCountry1; 
   receiveReq.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
   //Make the request
   receiveReq.send(param);

 }   
}

//Called every time our XmlHttpRequest objects state changes
function updatePageComboBoxCountry1() {
 //Check if our response is ready
 if (receiveReq.readyState == 4) {
   //Set the content of the DIV element with the response text   
   $('#divState1').html(receiveReq.responseText); //receiveReq.responseText; 
   $('#divCounty1').html("<select name='county1' id='county1' required style='width:155px;'></select>");
 }

 
}

//Called every time when form is perfomed
function getParamComboBoxCountry1(theForm) {
 
 //Set the URL
 var url ='actions/action_ComboBoxCountry1SupplierInformation.php';
 //Set up the parameters of our AJAX call
 var postStr = 
 $("#country1").attr("name") + "=" + encodeURIComponent( $("#country1").val() ) +"&"+
 $("#country2").attr("name") + "=" + encodeURIComponent( $("#country2").val() ) +"&"+
 $("#state1").attr("name") + "=" + encodeURIComponent( $("#state1").val() ) +"&"+
 $("#state2").attr("name") + "=" + encodeURIComponent( $("#state2").val() ) +"&"+
 $("#county1").attr("name") + "=" + encodeURIComponent( $("#county1").val() ) +"&"+
 $("#county2").attr("name") + "=" + encodeURIComponent( $("#county2").val() );
 //Call the function that initiate the AJAX request
 makeRequestComboBoxCountry1(url, postStr);
}