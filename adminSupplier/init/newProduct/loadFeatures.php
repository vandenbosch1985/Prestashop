<?php
require_once("commons/functions.php");
include("Classes/FeatureClass.php");
include("Classes/FeatureValuePredefinedClass.php");
$con=conectar();

$FeatureId = array();
$FeatureName = array();
$result = mysql_query('
SELECT f.id_feature, fl.name
FROM ps_feature f, ps_feature_lang fl
WHERE f.id_feature = fl.id_feature
AND fl.id_lang =3');

$i=0;
while ($rowEmp1 = mysql_fetch_assoc($result)) 
  {
  	$FeatureId[$i]=$rowEmp1['id_feature'];
	$auxVar=str_replace(" ","_",$rowEmp1['name']);
	$auxVar=str_replace(" ","_",$auxVar);
	$auxVar=str_replace(" ","_",$auxVar);
	$auxVar=str_replace(" ","_",$auxVar);
	$auxVar=str_replace(" ","_",$auxVar);
	$auxVar=str_replace(" ","_",$auxVar);
  	$FeatureName[$i]=$auxVar;
	$i=$i+1;
  }

//****************************************************************************//
 
 $featurePredefined = array();
 
 

$queryResult =  mysql_query("SELECT id_feature,name 
FROM  ps_feature_lang 
WHERE id_lang=3");
$j=0;
while ($rowEmp1 = mysql_fetch_assoc($queryResult)) 
  {
	$feature = new structFeature();
	$feature-> name = $rowEmp1['name'];	
	$i=0;
	$queryPredefinedResult=mysql_query("SELECT pfvl.value, pfv.id_feature_value
FROM ps_feature_value pfv, ps_feature_value_lang pfvl
WHERE pfv.id_feature =".$rowEmp1['id_feature']."
AND pfv.custom =0
AND pfvl.id_feature_value = pfv.id_feature_value
AND pfvl.id_lang =3");
	while ($rowEmp2 = mysql_fetch_assoc($queryPredefinedResult))
	{		
		$featureClass = new structFeatureValuePredefined();		
		$featureClass->setValues($rowEmp2['id_feature_value'],$rowEmp2['value']);
		$feature->addValue($featureClass,$i);		
		$i=$i+1;
	}
	$featurePredefined[$j]=$feature;
	$j=j+1;
  }

?>