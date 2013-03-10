<?php
class Product {

private $_id;

private $_name;

private $_categoryName;

private $_idCategoryName;

private $_price;

private $_imgThumb;
 
public function __construct() {
        $this->_id=0;
        $this->_name="";
		$this->_categoryName="";
		$this->_price=0;
}

public function createProduct($id, $name)
{
	$this->_id = $id;
	$this->_name = $name;
}

public function createProductWithImg($id, $name,$img,$price,$categoryName,$idCategoryName)
{
	$this->_id = $id;
	$this->_name = $name;
	$this->_imgThumb = $img;
	$this->_price = $price;
	$this->_categoryName=$categoryName;
	$this->_idCategoryName = $idCategoryName;
}


public function getId()
{
	return $this->_id;
}

public function getName()
{
	return $this->_name;	
}

public function setImage($img)
{
	$this->_imgThumb = $img;
}

public function getImage()
{
	return $this->_imgThumb;
}

public function getCategoryName()
{
	return $this->_categoryName;
}

public function getPrice()
{
	return $this->_price;
}
	
}

?>