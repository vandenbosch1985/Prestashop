<?php
class JNode {

    private $_value;

    private $_parent;

    private $_children = array();

    private $_uid;
	
	private $_products = array();
	
	private $_img;

	
	public function __construct($value = null,$uid = null,$products=null,$image) {
        if(!isset($value)) {
            throw new Exception('A value is required to create a node');
        }
        $this->setValue($value);
        $this->setUid($uid);		
		$this->setProducts($products);
		$this->setImg($image);
    }
	
	public function setProducts($products)
	{
		$this->_products = $products;	
	}

	
	public function setUid($uid = null) {
        //if uid not supplied...generate
        if(empty($uid)) {
            $this->_uid = uniqid();
        } else {
            $this->_uid = $uid;
        }
    }

	public function getUid() {
        return $this->_uid;
    }

    public function setValue($value) {
        $this->_value = $value;
    }

    public function getValue() {
        return $this->_value;
    }
	
	public function getProducts() {
        return $this->_products;
    }
	
	public function setImg($image)
	{
		$this->_img= $image;
	}
	
	public function getImg()
	{
		return $this->_img;
	}

    public function getParent() {
        return $this->_parent;
    }

    public function setParent($parent) {
        $this->_parent = $parent;
    }

    public function getChildren() {
        return $this->_children;
    }

    public function setChild($child) {
        if(!empty($child)) {
            $this->_children[] = $child;
        }
    }

    public function anyChildren() {
        $ret = false;
        if(count($this->_children) > 0) {
            $ret = true;
        }
        return $ret;
    }

    public function childrenCount() {
      $ret = false;
     if(is_array($this->_children)){
      $ret = count($this->_children);
     }
     return $ret;
    }
}

?>