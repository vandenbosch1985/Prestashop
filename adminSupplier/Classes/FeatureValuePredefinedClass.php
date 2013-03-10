<?php

class structFeatureValuePredefined { 

var $idFeature;
var $name; 
var $selected=0;
var $customValue="";

function setValues($id,$name)
{	
	$this->idFeature=$id;
	$this->name=$name;
}

function getId()
{	
print  $this->idFeature;	
}

function getName()
{
print  $this->name;	
}

function getSelected()
{
print  $this->selected;	
}

function getCustomValue()
{
print  $this->customValue;	
}

function setSelected($value)
{
$this->selected=$value;	
}

function setCustomValue($value)
{
$this->customValue = $value;	
}
	
} 

?>