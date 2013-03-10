<?php session_start();
require_once("../commons/functions.php");
$con=conectar();

$idProducto = $_POST['idProduct'];

$query ="DELETE FROM ps_product WHERE id_product =".$idProducto;
mysql_query($query,$con) or die ("We have problems to delete the product from ps_product. Please contact the Administrator.");

$query ="DELETE FROM ps_product_lang WHERE id_product =".$idProducto;
mysql_query($query,$con) or die ("We have problems to delete the product from ps_product_lang. Please contact the Administrator.");

$query ="DELETE FROM ps_category_product WHERE id_product =".$idProducto;
mysql_query($query,$con) or die ("We have problems to delete the product from ps_category_product. Please contact the Administrator.");

$query ="DELETE FROM ps_product_tag WHERE id_product =".$idProducto;
mysql_query($query,$con) or die ("We have problems to delete the product from ps_product_tag. Please contact the Administrator.");
//Missing delete the relation ps_tag

$query ="DELETE FROM ps_feature_product WHERE id_product =".$idProducto;
mysql_query($query,$con) or die ("We have problems to delete the product from ps_feature_product. Please contact the Administrator.");
//Missing delete the relation ps_feature_value , ps_feature_value_lang


?>			