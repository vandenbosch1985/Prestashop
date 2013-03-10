
//Gets the browser specific XmlHttpRequest Object 
function getXmlHttpRequestObjectDeleteProduct() {
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
var receiveReqDeleteProduct = getXmlHttpRequestObjectDeleteProduct();
var msjDeleteProduct= 'Your information has been saved.';

//Initiate the AJAX request
function makeRequestDeleteProduct(url, param) {
//If our readystate is either not started or finished, initiate a new request
 if (receiveReqDeleteProduct.readyState == 4 || receiveReqDeleteProduct.readyState == 0) {
   //Set up the connection to captcha_test.html. True sets the request to asyncronous(default) 
   receiveReqDeleteProduct.open("POST", url, true);
   //Set the function that will be called when the XmlHttpRequest objects state changes
   receiveReqDeleteProduct.onreadystatechange = updatePageDeleteProduct; 
   receiveReqDeleteProduct.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
   //Make the request
   receiveReqDeleteProduct.send(param);

 }   
}

//Called every time our XmlHttpRequest objects state changes
function updatePageDeleteProduct() {
 //Check if our response is ready
 if (receiveReqDeleteProduct.readyState == 4) {
   //Set the content of the DIV element with the response text
   //$('#panelLinks').css("display","none"); //receiveReq.responseText;   
   //$('#infoPanel').css("display","none"); //receiveReq.responseText;   
   //$('#featuresPanel').css("display","none"); //receiveReq.responseText;   
   //$('#resultSaveDeleteProduct').html("<font style='font-style:normal; color:#FF6; font-size:13px; margin-top:-20px; height:50px; margin-left:55px;'>"+receiveReqDeleteProduct.responseText+"</font>");
   
    
 }

 
}

//Called every time when form is perfomed
function getDeleteProduct(idProduct) {


if ( confirm("Do you really want to delete this product?") )
{	
  //Set the URL
 var url = 'actions/action_DeleteProduct.php';

 var postStr = 'idProduct' + "=" + encodeURIComponent( idProduct );

 //Delete the product from the catalog
 jQuery('[name="productId'+idProduct+'"]').remove()
 
 //Call the function that initiate the AJAX request
 makeRequestDeleteProduct(url, postStr);
}
}
