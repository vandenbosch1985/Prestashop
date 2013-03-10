
//Gets the browser specific XmlHttpRequest Object 
function getXmlHttpRequestObjectNewProduct() {
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
var receiveReqNewProduct = getXmlHttpRequestObjectNewProduct();
var msjNewProduct= 'Your information has been saved.';

//Initiate the AJAX request
function makeRequestNewProduct(url, param) {
//If our readystate is either not started or finished, initiate a new request
 if (receiveReqNewProduct.readyState == 4 || receiveReqNewProduct.readyState == 0) {
   //Set up the connection to captcha_test.html. True sets the request to asyncronous(default) 
   receiveReqNewProduct.open("POST", url, true);
   //Set the function that will be called when the XmlHttpRequest objects state changes
   receiveReqNewProduct.onreadystatechange = updatePageNewProduct; 
   receiveReqNewProduct.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
   //Make the request
   receiveReqNewProduct.send(param);

 }   
}

//Called every time our XmlHttpRequest objects state changes
function updatePageNewProduct() {
 //Check if our response is ready
 if (receiveReqNewProduct.readyState == 4) {
   //Set the content of the DIV element with the response text
   $('#panelLinks').css("display","none"); //receiveReq.responseText;   
   $('#infoPanel').css("display","none"); //receiveReq.responseText;   
   $('#featuresPanel').css("display","none"); //receiveReq.responseText;   
   $('#resultSaveNewProduct').html("<font style='font-style:normal; color:#FF6; font-size:13px; margin-top:-20px; height:50px; margin-left:55px;'>"+receiveReqNewProduct.responseText+"</font>");
   
    
 }

 
}

//Called every time when form is perfomed
function getNewProduct(theForm) {

/*
if (validateNewProduct())
{*/
	
  //Set the URL
 var url = 'actions/action_NewProduct.php';
 tinyMCE.activeEditor.getContent({format : 'raw'});
 //Set up the parameters of our AJAX call
 var postStr="";
var strFeatures='';
var arrayFeatures=$('#arrayFeatures').val();
var arrayF = new Array();
arrayF=arrayFeatures.split(',');
for (var i=0; i< arrayF.length; i++ )
{	

/*
	if (  $("#"+arrayF[i].replace("\n","").replace(" ","")+"Value").val() != "" && $("#"+arrayF[i].replace("\n","").replace(" ","")+"Value").val() != undefined  )
	*/	

	strFeatures = strFeatures + $("#"+arrayF[i].replace("\n","").replace(" ","")+"TotalValue").attr("name") + "=" + encodeURIComponent( $("#"+arrayF[i].replace("\n","").replace(" ","")+"TotalValue").val() ) +"&";
	
	strFeatures = strFeatures + $("#featurePredefined"+arrayF[i].replace("\n","").replace(" ","")).attr("name") + "=" + encodeURIComponent( $("#featurePredefined"+arrayF[i].replace("\n","").replace(" ","")+" option:selected").val() ) +"&";
	
 		
}

postStr=strFeatures;

 postStr = postStr+
 $("#nameProduct").attr("name") + "=" + encodeURIComponent( $("#nameProduct").val() ) +"&"+
 $("#referenceProduct").attr("name") + "=" + encodeURIComponent( $("#referenceProduct").val() ) +"&"+
 $("#supplierReference").attr("name") + "=" + encodeURIComponent( $("#supplierReference").val() ) +"&"+
 $("#UPC").attr("name") + "=" + encodeURIComponent( $("#UPC").val() ) +"&"+
 $("#locationWarehouse").attr("name") + "=" + encodeURIComponent( $("#locationWarehouse").val() ) +"&"+
 $("#width").attr("name") + "=" + encodeURIComponent( $("#width").val() ) +"&"+
 $("#height").attr("name") + "=" + encodeURIComponent( $("#height").val() ) +"&"+
 $("#deep").attr("name") + "=" + encodeURIComponent( $("#deep").val() ) +"&"+
 $("#state").attr("name") + "=" + encodeURIComponent( $("#state").val() ) +"&"+
 $("#pack").attr("name") + "=" + encodeURIComponent( $("#pack").val() ) +"&"+
 $("#priceMayoristaSIVA").attr("name") + "=" + encodeURIComponent( $("#priceMayoristaSIVA").val() ) +"&"+
 $("#priceMenorSIVA").attr("name") + "=" + encodeURIComponent( $("#priceMenorSIVA").val() ) +"&"+
 $("#taxRules").attr("name") + "=" + encodeURIComponent( $("#taxRules").val() ) +"&"+
 $("#priceVentaCIVA").attr("name") + "=" + encodeURIComponent( $("#priceVentaCIVA").val() ) +"&"+
 $("#unitPriceWithoutTax").attr("name") + "=" + encodeURIComponent( $("#unitPriceWithoutTax").val() ) +"&"+
 $("#iconRebajas").attr("name") + "=" + encodeURIComponent( $("#iconRebajas").val() ) +"&"+
 $("#initialStock").attr("name") + "=" + encodeURIComponent( $("#initialStock").val() ) +"&"+
 $("#miniumQuantity").attr("name") + "=" + encodeURIComponent( $("#miniumQuantity").val() ) +"&"+
 $("#additionalShippingCost").attr("name") + "=" + encodeURIComponent( $("#additionalShippingCost").val() ) +"&"+
 $("#disponibilidad").attr("name") + "=" + encodeURIComponent( $("#disponibilidad").val() ) +"&"+
 $("#alowwPedidos").attr("name") + "=" + encodeURIComponent( $("#alowwPedidos").val() ) +"&"+
 
  $("#stateProduct").attr("name") + "=" + encodeURIComponent( $("#stateProduct").val() ) +"&"+
    $("#idProducto").attr("name") + "=" + encodeURIComponent( $("#idProducto").val() ) +"&"+
 
 $("#descripcionCorta").attr("name") + "=" + encodeURIComponent( tinyMCE.get('descripcionCorta').getContent() ) +"&"+
 $("#descripcion").attr("name") + "=" + encodeURIComponent( tinyMCE.get('descripcion').getContent() ) +"&"+
 $("#etiquetas").attr("name") + "=" + encodeURIComponent( $("#etiquetas").val() ) +"&"+
 $("#caption").attr("name") + "=" + encodeURIComponent( $("#caption").val() ) +"&"+
 $("#cover").attr("name") + "=" + encodeURIComponent( $("#cover").val() ) +"&"+
  $("#arrayIdFeatures").attr("name") + "=" + encodeURIComponent( $("#arrayIdFeatures").val() ) +"&"+
  $("#unitPriceWithoutTaxARG").attr("name") + "=" + encodeURIComponent( $("#unitPriceWithoutTaxARG").val() ) +"&"+
  
  "fileToUpload=" + encodeURIComponent( $('input[type=file]').val() ) +"&"+

 
 $("#weight").attr("name") + "=" + encodeURIComponent( $("#weight").val() );




 //Call the function that initiate the AJAX request
 makeRequestNewProduct(url, postStr);

/*}*/

}
