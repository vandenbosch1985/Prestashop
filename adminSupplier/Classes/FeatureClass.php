<?php

class structFeature { 

var $name; 
var $arrayVP=array();


function addValue($value,$pos)
{	
	$this->arrayVP[$pos]=$value;
}

function getValue($p)
{	
return  $this->arrayVP[$p];	
}

function getArray()
{
	return $this->arrayVP;
	}
	
function imprimir()
{
for ($i=0; $i<count($arrayVP);$i++)
	echo $arrayVP[$i];
}

} 

?>