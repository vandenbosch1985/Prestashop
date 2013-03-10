<?php session_start();

require_once("../actions/action_addProduct.php");
require_once("../actions/action_updateProduct.php");


//Save a new Product
$auxState = $_POST['stateProduct'];
$auxState = str_replace(" ","",$auxState);


if ( $auxState=="1" )
{
	addProduct();
}
else 
{	
	updateProduct();
}

?>