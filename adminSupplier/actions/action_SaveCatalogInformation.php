<?php 
session_start();
require_once("../commons/functions.php");
$con=conectar();
	


//Get the number of new Categories
$contCategories = $_POST['categoriesCount'];


for ($i=0; $i < $contCategories; $i++)
{
	//Get the name Category
	$str = "nameCategory".$i;
	$nameCategory = $_POST[$str];
	$costCategory = $_POST['costoCategory'.$i];
	$timeCategory = $_POST['tiempoCategory'.$i];
	$measureTimeCategory = $_POST['medidaTiempoCategory'.$i];
	$fatherCategory = $_POST['fatherCategory'.$i];

	
	$nameCategory = str_replace("_"," ",$nameCategory);
	$nameCategory = str_replace("_"," ",$nameCategory);
	$nameCategory = str_replace("_"," ",$nameCategory);
	$nameCategory = str_replace("_"," ",$nameCategory);
	
	if ( strcmp(str_replace(" ","",$measureTimeCategory),"horas") == 0 )
		 $measureTimeCategory = 1;
	else
		$measureTimeCategory = 2;
	
	
	//Insert the category in the table
	$query ="INSERT INTO ps_category(id_parent,level_depth,nleft,nright,active,date_add,date_upd,position,shipping_costs,delivery_time,time_measurement) VALUES
	(".$fatherCategory.",1,2,3,0,NOW(),NOW(),0,".$costCategory.",".$timeCategory.",".$measureTimeCategory.")";
	
	mysql_query($query,$con) or die ("We have problems to insert the category in ps_category. Please contact the Administrator.");
	
	//Get the Last id if the category
	$qDate="SELECT MAX( id_category )  as 'id_category'
				FROM  ps_category";
		$result = mysql_query($qDate);
		while ($rowEmp1 = mysql_fetch_assoc($result)) 
		  {  
			$idCategory= $rowEmp1['id_category'];
		  }
	
	//Insert in Category Group
	$query ="INSERT INTO ps_category_group(id_category,id_group) VALUES
	(".$idCategory.",1)";
	mysql_query($query,$con) or die ("We have problems to insert the category in ps_category_group. Please contact the Administrator.");
	
	//Insert in Category Lang
	$query ="INSERT INTO ps_category_lang(id_category,id_lang,name,description,link_rewrite,meta_title,meta_keywords,meta_description) VALUES
	(".$idCategory.",1,'".$nameCategory."','','".str_replace(' ','-',$nameCategory)."',null,null,null)";
	mysql_query($query,$con) or die ("We have problems to insert the category in ps_category_lang. Please contact the Administrator.");
	
	$query ="INSERT INTO ps_category_lang(id_category,id_lang,name,description,link_rewrite,meta_title,meta_keywords,meta_description) VALUES
	(".$idCategory.",2,'".$nameCategory."','','".str_replace(' ','-',$nameCategory)."',null,null,null)";
	mysql_query($query,$con) or die ("We have problems to insert the category in ps_category_lang. Please contact the Administrator.");
	
	$query ="INSERT INTO ps_category_lang(id_category,id_lang,name,description,link_rewrite,meta_title,meta_keywords,meta_description) VALUES
	(".$idCategory.",3,'".$nameCategory."','','".str_replace(' ','-',$nameCategory)."',null,null,null)";
	mysql_query($query,$con) or die ("We have problems to insert the category in ps_category_lang. Please contact the Administrator.");
	
	$query ="INSERT INTO ps_category_lang(id_category,id_lang,name,description,link_rewrite,meta_title,meta_keywords,meta_description) VALUES
	(".$idCategory.",4,'".$nameCategory."','','".str_replace(' ','-',$nameCategory)."',null,null,null)";
	mysql_query($query,$con) or die ("We have problems to insert the category in ps_category_lang. Please contact the Administrator.");
	
	$query ="INSERT INTO ps_category_lang(id_category,id_lang,name,description,link_rewrite,meta_title,meta_keywords,meta_description) VALUES
	(".$idCategory.",5,'".$nameCategory."','','".str_replace(' ','-',$nameCategory)."',null,null,null)";
	mysql_query($query,$con) or die ("We have problems to insert the category in ps_category_lang. Please contact the Administrator.");
	
	$query ="INSERT INTO ps_category_lang(id_category,id_lang,name,description,link_rewrite,meta_title,meta_keywords,meta_description) VALUES
	(".$idCategory.",6,'".$nameCategory."','','".str_replace(' ','-',$nameCategory)."',null,null,null)";
	mysql_query($query,$con) or die ("We have problems to insert the category in ps_category_lang. Please contact the Administrator.");
	
}




//Save the actions of the catalog

//echo "actions:".$_POST['actions'];
//echo "actionsIdProduct:".$_POST['actionsIdProduct'];
//echo "actionsCategory:".$_POST['actionsCategory'];
if (  isset ($_POST['actions'])) //Si hay algun accion
{

$actionsResult = array();
$actionsIdProductResult = array();
$actionsCategory = array();

$actionsResult = explode(",",$_POST['actions']);
$actionsIdProductResult =explode(",",$_POST['actionsIdProduct']);
$actionsCategory = explode(",",$_POST['actionsCategory']);

for ($i=0; $i< count($actionsResult); $i++)
{
	
	
	
	if ( $actionsResult[$i]=='FromCategoryToDraft' )
	{
		$query ="UPDATE ps_product SET id_category_default=1 ,active=0 WHERE id_product=".$actionsIdProductResult[$i];		
		mysql_query($query,$con) or die ("We have problems to update the product in ps_product. Please contact the Administrator.");
		
		$query="DELETE FROM ps_category_product WHERE id_product=".$actionsIdProductResult[$i];
		mysql_query($query,$con) or die ("We have problems to delete the product in ps_category_product. Please contact the Administrator.");
		
		$query ="INSERT INTO ps_category_product(id_category,id_product,position) VALUES(1,".$actionsIdProductResult[$i].",0)";		
		mysql_query($query,$con) or die ("We have problems to update the product in ps_category_product. Please contact the Administrator.");
		

	}
	
	if ( $actionsResult[$i] == 'FromActiveToDraft' )
	{
		$query ="UPDATE ps_product SET active=0 WHERE id_product=".$actionsIdProductResult[$i];		
		
		mysql_query($query,$con) or die ("We have problems to update the product in ps_product. Please contact the Administrator.");
		

				
	}
	
	if ( $actionsResult[$i] == 'RestoreProductFromDraft' )
	{
		$query ="UPDATE ps_product SET active=1 WHERE id_product=".$actionsIdProductResult[$i];		
		mysql_query($query,$con) or die ("We have problems to update the product in ps_product. Please contact the Administrator.");
		

	}
	
	if ( $actionsResult[$i] == 'MoveCategory' )
	{
		
		
		//Get the id of the new product that the product move
		$nameCategory=$actionsCategory[$i];
		$nameCategory = str_replace("_"," ",$nameCategory);
		
		
		//Pregunto si es una subcategoría

		
		
		$qDate="SELECT pc.id_category
FROM ps_category pc, ps_category_lang pcl
WHERE pcl.name ='".$nameCategory."'  
AND pcl.id_category = pc.id_category
AND pcl.id_lang =3";

		
		
		$idCategory="";
		$result = mysql_query($qDate);
		while ($rowEmp1 = mysql_fetch_assoc($result)) 
		  {  
			$idCategory= $rowEmp1['id_category'];
		  }
		
		if ($idCategory != "")
		{
			$query ="UPDATE ps_product SET active=1, id_category_default=".$idCategory." WHERE id_product=".$actionsIdProductResult[$i];		
		mysql_query($query,$con) or die ("We have problems to update the product in ps_product. Please contact the Administrator.");
		
		$query="DELETE FROM ps_category_product WHERE id_product=".$actionsIdProductResult[$i];
		mysql_query($query,$con) or die ("We have problems to delete the product in ps_category_product. Please contact the Administrator.");
			
		
		$query ="INSERT INTO ps_category_product(id_category,id_product,position) VALUES(".$idCategory.",".$actionsIdProductResult[$i].",0);";
		mysql_query($query,$con) or die ("We have problems to update the product in ps_category_product. Please contact the Administrator.");
		

		
		}
		else
			echo "Error moving a producto from a category to another. Log: ".$actionsIdProductResult[$i];
			
	}

}

}


echo "Your changes has been saved.";

?>