<?php
function addFeatures($idProducto,$action,$con)
{

//Insert the features
$variable = "";
$featuresIdList = array();
$featuresIdList=explode(",",$_POST['arrayIdFeatures']);

	//Elimino los custom del producto 
	$querySelect="SELECT id_feature_value FROM ps_feature_product WHERE id_product=".$idProducto;
		$result = mysql_query($querySelect);
		while ($rowEmp1 = mysql_fetch_assoc($result)) 
		  {  
			$idFeatureValue= $rowEmp1['id_feature_value'];
			
			$qDate="SELECT id_feature_value
				FROM  ps_feature_value
				WHERE custom=1 AND id_feature_value=".$idFeatureValue;
		
			$auxVar="";
			$result = mysql_query($qDate);
			while ($rowEmp1 = mysql_fetch_assoc($result)) 
			  {  
				$auxVar= $rowEmp1['id_feature_value'];				
			  }		
			
			if ( $auxVar!="")
			{
				$queryDelete = "DELETE FROM ps_feature_value WHERE id_feature_value=".$idFeatureValue." AND custom=1";
				mysql_query($queryDelete,$con) or die ("We have problems to delete the feature in ps_feature_value. Please contact the Administrator.");
				
				$queryDelete = "DELETE FROM ps_feature_value_lang WHERE id_feature_value=".$idFeatureValue;
				mysql_query($queryDelete,$con) or die ("We have problems to delete the feature in ps_feature_value_lang. Please contact the Administrator.");
			}
			
			
		  }
	
	//Elimino los feature que el producto podria tener: predefinidos o custom
	$queryDelete ="DELETE FROM ps_feature_product WHERE id_product=".$idProducto;
	mysql_query($queryDelete,$con) or die ("We have problems to delete the feature in ps_feature_product. Please contact the Administrator.");
	

for ($i=0; $i < count($featuresIdList); $i++)
{			
if ( $featuresIdList[$i] != " " && $featuresIdList[$i] != "")
{
			$qDate="SELECT name,id_feature
				FROM  ps_feature_lang
				WHERE id_lang=3 AND id_feature=".$featuresIdList[$i];
		
		$result = mysql_query($qDate);
		while ($rowEmp1 = mysql_fetch_assoc($result)) 
		  {  
			$nameFeature= $rowEmp1['name'];
			$idFeature= $rowEmp1['id_feature'];
		  }			 	
		 
		 $totalValue= $nameFeature."TotalValue";
		 $predefinedValue = "featurePredefined".$nameFeature;			
		
		
		//Si tiene un valor quiere decir que cargo un valor predefinido
		
		if ( $_POST[$predefinedValue] != 0 && $_POST[$predefinedValue] !='undefined' && $_POST[$predefinedValue] !='false')
		{				
		if ( $action ==0)  //update
		{
			
		  
			
			$query ="INSERT INTO ps_feature_product(id_feature,id_product,id_feature_value) VALUES(".$idFeature.",".$idProducto.",".$_POST[$predefinedValue].");";		
			
			mysql_query($query,$con) or die ("We have problems to insert the feature in ps_feature_product. Please contact the Administrator.");  
		}
		else  //add
		{
			
			$query ="INSERT INTO ps_feature_product(id_feature,id_product,id_feature_value) VALUES(".$idFeature.",".$idProducto.",".$_POST[$predefinedValue].");";		
				mysql_query($query,$con) or die ("We have problems to insert the feature in ps_feature_product. Please contact the Administrator.");  
		}
				
		}
		


		//Si tiene un valor quiere decir que cargo un valor custom
		if ( $_POST[$totalValue] != "" && $_POST[$totalValue] !='undefined' )
		{					
				
			//Insert into  the features value lang and associate with product			  
 			$query ="INSERT INTO ps_feature_value(id_feature,custom) VALUES(".$idFeature.",1);";		
			mysql_query($query,$con) or die ("We have problems to insert the feature in ps_feature_value. Please contact the Administrator.");
					
			//Get last id from ps_feature_value
			$qDate="SELECT MAX(id_feature_value) as 'id_feature_value'
				FROM  ps_feature_value";
			$result = mysql_query($qDate);
			while ($rowEmp1 = mysql_fetch_assoc($result)) 
			  {  
				$idFeatureValue= $rowEmp1['id_feature_value'];
			  }
			  
			  $query ="INSERT INTO ps_feature_value_lang(id_feature_value,id_lang,value) VALUES(".$idFeatureValue.",3,'".$_POST[$totalValue]."');";				
			mysql_query($query,$con) or die ("We have problems to insert the feature in ps_feature_value_lang. Please contact the Administrator.");
			
			$query ="INSERT INTO ps_feature_value_lang(id_feature_value,id_lang,value) VALUES(".$idFeatureValue.",1,'".$_POST[$totalValue]."');";				
			mysql_query($query,$con) or die ("We have problems to insert the feature in ps_feature_value_lang. Please contact the Administrator.");
			
			$query ="INSERT INTO ps_feature_value_lang(id_feature_value,id_lang,value) VALUES(".$idFeatureValue.",2,'".$_POST[$totalValue]."');";				
			mysql_query($query,$con) or die ("We have problems to insert the feature in ps_feature_value_lang. Please contact the Administrator.");
			
			$query ="INSERT INTO ps_feature_value_lang(id_feature_value,id_lang,value) VALUES(".$idFeatureValue.",4,'".$_POST[$totalValue]."');";				
			mysql_query($query,$con) or die ("We have problems to insert the feature in ps_feature_value_lang. Please contact the Administrator.");
			
			$query ="INSERT INTO ps_feature_value_lang(id_feature_value,id_lang,value) VALUES(".$idFeatureValue.",5,'".$_POST[$totalValue]."');";				
			mysql_query($query,$con) or die ("We have problems to insert the feature in ps_feature_value_lang. Please contact the Administrator.");
			
			$query ="INSERT INTO ps_feature_value_lang(id_feature_value,id_lang,value) VALUES(".$idFeatureValue.",6,'".$_POST[$totalValue]."');";				
			mysql_query($query,$con) or die ("We have problems to insert the feature in ps_feature_value_lang. Please contact the Administrator.");
			  
			$query ="INSERT INTO ps_feature_product(id_feature,id_product,id_feature_value) VALUES(".$idFeature.",".$idProducto.",".$idFeatureValue.");";		
			mysql_query($query,$con) or die ("We have problems to insert the feature in ps_feature_product. Please contact the Administrator.");  
										
		}
		
		
}		
}

}
?>