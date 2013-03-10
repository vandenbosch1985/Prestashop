<?php
include("DBparameters.php"); 
function conectar(){
    $con=mysql_connect(getHost(),getUser(),getPass())or die ('Ha fallado la conexión: '.mysql_error());
    mysql_select_db(getBD(),$con)or die ('Error al seleccionar la Base de Datos: '.mysql_error()); 
	mysql_query ("SET NAMES 'utf8'");
	return $con;
}

function decrypt($string, $key) {
   $result = '';
   $string = base64_decode($string);
   for($i=0; $i<strlen($string); $i++) {
      $char = substr($string, $i, 1);
      $keychar = substr($key, ($i % strlen($key))-1, 1);
      $char = chr(ord($char)-ord($keychar));
      $result.=$char;
   }
   return $result;
}

  function encrypt($string, $key) {
   $result = '';
   for($i=0; $i<strlen($string); $i++) {
      $char = substr($string, $i, 1);
      $keychar = substr($key, ($i % strlen($key))-1, 1);
      $char = chr(ord($char)+ord($keychar));
      $result.=$char;
   }
   return base64_encode($result);
}
 
function puede_ver($pagina=''){
    $usuario = strtoupper($_SESSION['k_username']);
    $result = mysql_query('SELECT usuario FROM autorizaciones WHERE pagina=\''.$pagina.'\' ');
    if($row = mysql_fetch_array($result)){
        $usuarios=$row['usuario']; // obtenemos los nombres de los usuarios
        $array_usuarios= array(); // creamos un arrar
        $array_usuarios=explode(',',$usuarios); // y los metemos pos la separación de la coma
        $total=count($array_usuarios); // cuantos tenemos ?
        if (in_array($usuario, $array_usuarios)) { // si encontramos al ganador ok
            return true;
        }else{ // si no pues un false como respuesta
            return false;
        }
    }
}




     
?>