<?php


class JTreeRecursiveIterator extends RecursiveIteratorIterator {

    private $_jTree;

    private $_str;

    public function __construct(JTree $jt, $iterator, $mode = LEAVES_ONLY, $flags = 0) {

        parent::__construct($iterator, $mode, $flags);

        $this->_jTree = $jt;
        //$this->_str = "<ul>\n";
    }

    public function endChildren() {
        parent::endChildren();
        //$this->_str .= "</ul></li>\n";
    }

    public function callHasChildren() {
        $ret = parent::callHasChildren();
        $value = $this->current()->getValue();
		$products = $this->current()->getProducts();
        if($ret === true) 
		{
			self::printCategory(true);		
        } 
		else 
		{
			self::printCategory(false);
        }
        return $ret;
    }

    public function __destruct() {
        //$this->_str .= "</ul>\n";
                echo $this->_str;
    }
	
	
	
	public function printCategory($parent)
	{

		if ( $this->current()->getUid()==1)
		{
		
				/*
		if ( $parent == true)
			$this->_str .= "<li>";
		else
			$this->_str .= "<li>";
	
		
		
		$attribute="none";
		
		if ( $this->current()->getUid()==1)
			$attribute="table";*/
		$this->_str .="<div id='buttonCategoryHome' class='column' style='margin-bottom:20px; height:30px;width:250px;display:inline-table;'>Leandro</div>";
		 //$this->_str .="<tr><td>";
        //$this->_str .="<div id='buttonCategory".str_replace(" ","_",$this->current()->getValue())."' class='column' style='margin-bottom:20px; height:30px;width:250px;display:inline-table;' ><img src='img/thumb.png' width='60' height='50' align='left' />Leandro</div>";	  
	  //$this->_str .= "<div id='headerCategory".str_replace(" ","_",$this->current()->getValue())."' name='".str_replace(" ","_",$this->current()->getValue())."' onClick='displayCategoria(this.parentNode);'><header style='margin-top:15px;'>".$this->current()->getValue()."</header></div>";
	  //$this->_str .= "<div id='categoryMain".str_replace(" ","_",$this->current()->getValue())."' style='display:table;' >";	  
	  //$products = $this->current()->getProducts();
	  //load the products from this category
	  /*
	  for ($j=0; $j < count($products); $j++)
	  {
		  	  $productTouch = $products[$j]->getName();
			  $productTouch = str_replace(" ","_",$productTouch );
			  $productTouch = str_replace("/","_",$productTouch );
			  $productTouch = str_replace("(","_",$productTouch );
			  $productTouch = str_replace(")","_",$productTouch );
			  $productTouch = str_replace("-","_",$productTouch );
		 // $this->_str .= "<div id='Category".$productTouch."' title='".str_replace(" ","_",$products[$j]->getName())."' style='margin-left:80px;margin-top:10px;margin-right:5px;width:250px;'><b>".$products[$j]->getName()."</b><img style='margin-left:10px;' src='img/draftIcon.png' width='18' height='23' onClick='removeProductToDraft(this.parentNode);'/></div>";
		  

	  }
//$this->_str .="</div></div>";
 //$this->_str .="</td></tr>";
		/*    
	  if ( $parent == true)
			$this->_str .= "<ul>\n";
		else
			$this->_str .= "</li>\n";
	  */
	   
	   
		}
	}
	
}

?>