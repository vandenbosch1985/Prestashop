<?php


function addTags($idProducto,$etiquetasPost,$con)
{


//Insert the tags in ps_tag and ps_product_tag
$etiquetas = array();
if ( $etiquetasPost!="")
{	


$etiquetas=explode(",",$etiquetasPost);

for ($i=0; $i < count($etiquetas); $i++)
{
	
	if ( $etiquetas != "")	
	{
		
		//Insert in tag table
		$query ="INSERT INTO ps_tag(id_lang,name) VALUES(3,'".$etiquetas[$i]."');";		
		mysql_query($query,$con) or die ("We have problems to insert the tag in ps_tag. Please contact the Administrator.");
		
		//Get the last id tag	
		$qDate="SELECT MAX( id_tag )  as 'id_tag'
				FROM  ps_tag";
		$result = mysql_query($qDate);
		while ($rowEmp1 = mysql_fetch_assoc($result)) 
		  {  
			$idTag= $rowEmp1['id_tag'];
		  }
		
		
		
		//Insert in product_tag table
		
		$query ="INSERT INTO  ps_product_tag(id_product,id_tag) VALUES('".trim($idProducto)."','".$idTag."');";				
		
		mysql_query($query,$con) or die ("We have problems to insert the tag in  ps_product_tag. Please contact the Administrator.");
		
		$query ="INSERT INTO ps_tag(id_lang,name) VALUES(1,'".$etiquetas[$i]."');";		
		mysql_query($query,$con) or die ("We have problems to insert the tag in ps_tag. Please contact the Administrator.");
		
		//Get the last id tag	
		$qDate="SELECT MAX( id_tag )  as 'id_tag'
				FROM  ps_tag";
		$result = mysql_query($qDate);
		while ($rowEmp1 = mysql_fetch_assoc($result)) 
		  {  
			$idTag= $rowEmp1['id_tag'];
		  }
		
		
		
		//Insert in product_tag table
		
		$query ="INSERT INTO  ps_product_tag(id_product,id_tag) VALUES('".trim($idProducto)."','".$idTag."');";				
		
		mysql_query($query,$con) or die ("We have problems to insert the tag in  ps_product_tag. Please contact the Administrator.");
		
		
		$query ="INSERT INTO ps_tag(id_lang,name) VALUES(2,'".$etiquetas[$i]."');";		
		mysql_query($query,$con) or die ("We have problems to insert the tag in ps_tag. Please contact the Administrator.");
		
		//Get the last id tag	
		$qDate="SELECT MAX( id_tag )  as 'id_tag'
				FROM  ps_tag";
		$result = mysql_query($qDate);
		while ($rowEmp1 = mysql_fetch_assoc($result)) 
		  {  
			$idTag= $rowEmp1['id_tag'];
		  }
		
		
		
		//Insert in product_tag table
		
		$query ="INSERT INTO  ps_product_tag(id_product,id_tag) VALUES('".trim($idProducto)."','".$idTag."');";				
		
		mysql_query($query,$con) or die ("We have problems to insert the tag in  ps_product_tag. Please contact the Administrator.");
		
		$query ="INSERT INTO ps_tag(id_lang,name) VALUES(4,'".$etiquetas[$i]."');";		
		mysql_query($query,$con) or die ("We have problems to insert the tag in ps_tag. Please contact the Administrator.");
		
		//Get the last id tag	
		$qDate="SELECT MAX( id_tag )  as 'id_tag'
				FROM  ps_tag";
		$result = mysql_query($qDate);
		while ($rowEmp1 = mysql_fetch_assoc($result)) 
		  {  
			$idTag= $rowEmp1['id_tag'];
		  }
		
		
		
		//Insert in product_tag table
		
		$query ="INSERT INTO  ps_product_tag(id_product,id_tag) VALUES('".trim($idProducto)."','".$idTag."');";				
		
		mysql_query($query,$con) or die ("We have problems to insert the tag in  ps_product_tag. Please contact the Administrator.");
		
		$query ="INSERT INTO ps_tag(id_lang,name) VALUES(5,'".$etiquetas[$i]."');";		
		mysql_query($query,$con) or die ("We have problems to insert the tag in ps_tag. Please contact the Administrator.");
		
		
		//Get the last id tag	
		$qDate="SELECT MAX( id_tag )  as 'id_tag'
				FROM  ps_tag";
		$result = mysql_query($qDate);
		while ($rowEmp1 = mysql_fetch_assoc($result)) 
		  {  
			$idTag= $rowEmp1['id_tag'];
		  }
		
		
		
		//Insert in product_tag table
		
		$query ="INSERT INTO  ps_product_tag(id_product,id_tag) VALUES('".trim($idProducto)."','".$idTag."');";				
		
		mysql_query($query,$con) or die ("We have problems to insert the tag in  ps_product_tag. Please contact the Administrator.");
		
		$query ="INSERT INTO ps_tag(id_lang,name) VALUES(6,'".$etiquetas[$i]."');";		
		mysql_query($query,$con) or die ("We have problems to insert the tag in ps_tag. Please contact the Administrator.");
			
		//Get the last id tag	
		$qDate="SELECT MAX( id_tag )  as 'id_tag'
				FROM  ps_tag";
		$result = mysql_query($qDate);
		while ($rowEmp1 = mysql_fetch_assoc($result)) 
		  {  
			$idTag= $rowEmp1['id_tag'];
		  }
		
		
		
		//Insert in product_tag table
		
		$query ="INSERT INTO  ps_product_tag(id_product,id_tag) VALUES('".trim($idProducto)."','".$idTag."');";				
		
		mysql_query($query,$con) or die ("We have problems to insert the tag in  ps_product_tag. Please contact the Administrator.");
	}
}
}
}


function quitar_espacios($cadena,$tipo){ 
     if($tipo == " "){ 
        $resultado = str_replace(" ","",$cadena); 
     } 
     else{ 
        $resultado = str_replace(" ","_",$cadena); 
     } 
     return $resultado; 
}  
?>