
//Gets the browser specific XmlHttpRequest Object 
function getXmlHttpRequestObjectSaveCatalogInformation() {
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
var receiveReqSaveCatalogInformation = getXmlHttpRequestObjectSaveCatalogInformation();
var msjSaveCatalogInformation= 'Your information has been saved.';

//Initiate the AJAX request
function makeRequestSaveCatalogInformation(url, param) {
//If our readystate is either not started or finished, initiate a new request
 if (receiveReqSaveCatalogInformation.readyState == 4 || receiveReqSaveCatalogInformation.readyState == 0) {
   //Set up the connection to captcha_test.html. True sets the request to asyncronous(default) 
   receiveReqSaveCatalogInformation.open("POST", url, true);
   //Set the function that will be called when the XmlHttpRequest objects state changes
   receiveReqSaveCatalogInformation.onreadystatechange = updatePageSaveCatalogInformation; 
   receiveReqSaveCatalogInformation.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
   //Make the request
   receiveReqSaveCatalogInformation.send(param);

 }   
}

//Called every time our XmlHttpRequest objects state changes
function updatePageSaveCatalogInformation() {
 //Check if our response is ready
 if (receiveReqSaveCatalogInformation.readyState == 4) {
   //Set the content of the DIV element with the response text      
   $('#msjSaveCategory').html("<font style='font-style:normal; color:#376092; font-size:13px; margin-top:-20px; height:50px; margin-left:55px;'>"+receiveReqSaveCatalogInformation.responseText+"</font>");
   
    
 }

 
}

//Called every time when form is perfomed
function getSaveCatalogInformation(theForm) {


var i=0;
var srtCategoryArray= new Array();
var srtCategoryCostoEnvioArray= new Array();
var srtCategoryTiempoEnvioArray= new Array();
var srtCategoryMedidaTiempoArray= new Array();
var srtCategoryFatherArray= new Array();

var pos=0;
while ( $( $('#lastRow div header')[i] ).html() != null)
{
	pos = ( $( $('#lastRow div header')[i] ).html() ).indexOf('<img');
	srtCategoryArray[i] = ( $( $('#lastRow div header')[i] ).html() ).substring(0,pos);
	srtCategoryArray[i]=srtCategoryArray[i].replace(" ","_").replace(" ","_").replace(" ","_").replace(" ","_").replace(" ","_").replace(" ","_");
	srtCategoryCostoEnvioArray[i] = $( $('#lastRow div')[i]).find("#costo"+srtCategoryArray[i]).val();
	srtCategoryTiempoEnvioArray[i] = $( $('#lastRow div')[i]).find("#tiempo"+srtCategoryArray[i]).val();
	srtCategoryMedidaTiempoArray[i] = $( $('#lastRow div')[0]).find('input[id=medidaTiempo'+srtCategoryArray[i]+']:checked').val();
	
	srtCategoryFatherArray[i] = $( $('#lastRow div')[0]).find('select[id=cmbCategory'+srtCategoryArray[i]+']').val();
	
	i = i+1;
}
	
  //Set the URL
 var url = 'actions/action_SaveCatalogInformation.php';
 

var  postStr = "";
var j=0;
for (j=0; j < i; j++)
{
	postStr = postStr + "nameCategory"+j + "=" + encodeURIComponent( srtCategoryArray[j] ) +" & ";
	
	postStr = postStr + "costoCategory"+j + "=" + encodeURIComponent( srtCategoryCostoEnvioArray[j] ) +" & ";
	postStr = postStr + "tiempoCategory"+j + "=" + encodeURIComponent( srtCategoryTiempoEnvioArray[j] ) +" & ";
	postStr = postStr + "medidaTiempoCategory"+j + "=" + encodeURIComponent( srtCategoryMedidaTiempoArray[j] ) +" & ";
	
	postStr = postStr + "fatherCategory"+j + "=" + encodeURIComponent( srtCategoryFatherArray[j] ) +" & ";
}

postStr = postStr + "categoriesCount" + "=" + i ;



//Save the actions on the catalog
if ( $('#actions').val() !="" )
{
	postStr = postStr +" & ";
	postStr = postStr + "actions=" + encodeURIComponent(  $('#actions').val() ) +" & ";
	postStr = postStr + "actionsIdProduct=" + encodeURIComponent(  $('#actionsIdProduct').val() ) +" & ";
	postStr = postStr + "actionsCategory=" + encodeURIComponent(  $('#actionsCategory').val() );
}


 //Call the function that initiate the AJAX request
 makeRequestSaveCatalogInformation(url, postStr);


}
