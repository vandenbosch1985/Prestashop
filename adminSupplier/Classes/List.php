<?php
class Vector {

private $_list;

private $_itemCount;

private $_index;
 
public function __construct() {
        $this->_itemCount =0;
		$this->_index=0;
		$this->_list = array();
}

public function addItem($item)
{
	$this->_list[$this->_index] = $item;
	$this->_index = $this->_index + 1;
	$this->_itemCount = $this->_itemCount+1;
}

public function deleteItem($index)
{
	for ($i=count($this->_list)-1; $i>=$index; $i--)
	{
		
	}
		
	$this->_index = $this->_index - 1;
	$this->_itemCount = $this->_itemCount-1;
}

public function getArray()
{
	return $this->_list;
}


}
?>