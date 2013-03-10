<?php session_start();

if (!isset($_SESSION['k_username'])) { ?>
<SCRIPT LANGUAGE="javascript">
location.href = "login.php";
</SCRIPT>
<?php
}
include("Classes/Product.php");
include("init/catalogo/loadProductsWithCategories_Catalogo.php");
include("init/catalogo/loadCategories_Catalogo.php");
include("init/catalogo/loadProductsNonCategories_Catalogo.php");
include("Classes/jtree.php");
include("Classes/jnode.php");
include("Classes/JTreeRecursiveIterator.php");
include("Classes/JTreeIterator.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<LINK REL="stylesheet" TYPE="text/css" HREF="styles/styleCatalogo.css">
<LINK REL="stylesheet" TYPE="text/css" HREF="styles/styleSheet.css">	
<script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>		
<script type="text/javascript" src="js/jquery-ui-1.8.18.custom.min.js"></script>
<script type="text/javascript" src="js/catalogoFunctions.js"></script>
<script type="text/javascript" src="js/ajax/ajax_SaveCatalogInformation_Catalog.js"></script>
<script type="text/javascript" src="js/ajax/ajax_deleteProduct.js"></script>
        <script type="text/javascript" src="js/actionCatalog.js"></script>
<script type="text/javascript">

function goToNewProduct()
{
 window.location.href = "NewProduct.php?idProducto=0";	
}
</script>
<title>Catalogo - Supplier DashBoard</title>
</head>
<body id="login">		
<div id="dummy2">
<div id="login-wrapper" class="png_bg">
			<div id="login-top">
				<a href="supplier_InformationV2.php"><img src="img/Supplier-logo.png"  /></a>			
		  </div>			                                        
</div>

<div id="columns" style="margin-top:100px;margin-left:50px;">	
<div id="msjSaveCategory"></div>
<table width="400" border="0" align="left" style="margin-left:220px;">
  <tr>
  <td><p class="tab_tittle">Categorías</p></td>
  </tr>
  <tr><td>
<?php
$jt = new JTree();
foreach($categories as $category) {
    $uid = $jt->createNode($category['weather_condition'],$category['id'],$category['products'],$category['img']);
    $parentId = null;
    if(!empty($category['parent_id'])) {
        $parentId = $category['parent_id'];
    }
    $jt->addChild($parentId, $uid);
}


$it = new JTreeIterator($jt->getTree());

echo createHeaderCategory($it->current()->getValue(),0,$it->current()->getImg());
$products= $it->current()->getProducts();
	for ($j=0; $j<count($products);$j++)
	{	
		echo createProduct($products[$j]->getName(),$products[$j]->getId());
	}
echo createEndHeaderCategory();

$childrens=$it->getChildren();
for ( $i=0; $i<count($childrens); $i++)
{
	//Get id
	$node= $jt->getNode($childrens[$i]);	
	echo createHeaderCategory($node->getValue(),40,$node->getImg());
	$products= $node->getProducts();	
	for ($j=0; $j<count($products);$j++)
	{
		echo createProduct($products[$j]->getName(),$products[$j]->getId());
	}
	echo createEndHeaderCategory();
	
	//Si tiene otra categoria adentro la imprimo
	$subChildren=$node->getChildren();
	for($k=0; $k< count($subChildren); $k++)
	{
		//Get id
		$nodeAux= $jt->getNode($subChildren[$k]);	
		echo createHeaderCategory($nodeAux->getValue(),80,$nodeAux->getImg());
		$products= $nodeAux->getProducts();	
		for ($n=0; $n<count($products);$n++)
		{
			echo createProduct($products[$n]->getName(),$products[$n]->getId());
		}
		echo createEndHeaderCategory();
		
				$subsubChildren=$nodeAux->getChildren();
				for($m=0; $m< count($subsubChildren); $m++)
				{
					//Get id
					$nodeAuxAux= $jt->getNode($subsubChildren[$m]);	
					echo createHeaderCategory($nodeAuxAux->getValue(),120,$nodeAuxAux->getImg());
					$products= $nodeAuxAux->getProducts();	
					for ($l=0; $l<count($products);$l++)
					{
						echo createProduct($products[$l]->getName(),$products[$l]->getId());
					}
					echo createEndHeaderCategory();
				}
		
	}
}




function createHeaderCategory($name,$margin,$img)
{
if ($name!='Home')
	$class="class='column'";
else
	$class="";

$str="";
$str .="<tr><td>";
$str .= "<div id='buttonCategory".str_replace(" ","_",$name)."'    ".$class." style='margin-bottom:20px; height:30px;width:250px;display:inline-table;margin-left:".$margin."px;' id='category' ><img src='".$img."' width='60' height='51' align='left' style='margin-right:60px' />";	  
$str .= "<div id='headerCategory".str_replace(" ","_",$name)."'  class='cat_title' name='".str_replace(" ","_",$name)."' onClick='displayCategoria(this.parentNode);'><header>".$name."</header></div>";
$str .= "<div id='categoryMain".str_replace(" ","_",$name)."' style='display:none;' class='category_prods' >";	

return $str;
}

function createEndHeaderCategory()
{
return "</div></div></td></tr>";	
}

function createProduct($name,$id)
{
$str="";
$str .= "<div id='Category".str_replace(" ","_",$name).$id."' title='".str_replace(" ","_",$name).$id."' style='margin-left:80px;margin-top:10px;margin-right:5px;width:250px;' class='category_product'><b>".$name."</b><img style='margin-left:10px;' src='img/draftIcon.png' width='18' height='23' onClick='removeProductToDraft(this.parentNode);'/></div>";

return $str;
}

?>
  </div>
  </td></tr>
  <tr id="lastRow">


</tr>
  
    
  <tr>
    <td>  
    <div id="panelNewCategory" class="category"  style="margin-bottom:20px; height:30px;width:250px;display:table;" >
    <div id="linkNewCategory" style="display:table;width:250px;height:30px;" onClick="$('#newCategory').css('display','table');$('#labelNewCategory').css('display','none');">
    <p id="labelNewCategory"  style="margin-top:12px; display:table;margin-left:23px; width:250; height:30;" align="center">
    <b><Font color="#376092">Solicitar Nueva Categoría</Font></b></p></div>
    <div id="newCategory" style="display:none">
	<table align="center"><tr><td><p><label>Nombre:</label></td><td><input type="text" value="" id="categoryName" name="categoryName" style="margin-right:10px;" /><div width="50px" id="msgCategoryName"></div></p></td></tr></table>
    <p><label>Costo de Envío:</label>
    <input type="text" value="" id="costoCategoria" name="costoCategoria" size="2" ></p>
    <p><label>Tiempo de Envío:</label>
    <input type="text" value="" id="tiempoCategoria" name="tiempoCategoria" size="2"><input id="medidaTiempo" type="radio" checked="checked" name="medidaTiempo" value="horas" /> Horas <input type="radio" name="medidaTiempo"  id="medidaTiempo" value="dias"/> Días</p>
    <p>
    <label>Categoría Padre:</label>
    <select id="cmbCategory" name="cmbCategory">
    <?php
	echo "<option id='selectedFatherCategoryHome' name='selectedFatherCategoryHome' value='0'>Home</option>";		
	for ($i=0; $i<count($categoriesForComboId); $i++)
	{
	   echo "<option id='selectedFatherCategory".$categoriesForComboName[$i]."' name='selectedFatherCategory".$categoriesForComboName[$i]."' value='".$categoriesForComboId[$i]."'>".$categoriesForComboName[$i]."</option>";		
	}
	?>
    </select>
    </p>
    
    <table>
    <tr>
    <td>
    <input type="button" value="Cancelar" class="btn" style="margin-left:140px;" onClick="$('#newCategory').css('display','none');$('#labelNewCategory').css('display','table');	$('#categoryName').attr('value','');
	$('#costoCategoria').attr('value','');
	$('#tiempoCategoria').attr('value','');"/></td>
    <td><input type="button" value="Aceptar" class="btn"  onClick="validateNewCategory(this);"/></td>
    </tr>
    </table>
        </div>
    </div></td>
  </tr>   
</table>

<table id="published_products" width="200" border="0" align="right" style="margin-right:200px;margin-top:-33px;">
  <tr>
  <td>
    <br /><p class="tab_tittle">Publicados</p></td>
  </tr>
  <tr>
    <td >

    <div id="mainActiveProducts" style="overflow:scroll;height:400px;width:300px;vertical-align:middle;">
   
    <?php
	
	for ($i=0; $i < count($ActiveProducts); $i++)
	{
		$product = $ActiveProducts[$i];
		$idActive = "active".str_replace(" ","_",$product->getName());
		
		$producTouchActive = str_replace(" ","_",$product->getName());
		$producTouchActive = str_replace("/","_",$producTouchActive);
		$producTouchActive = str_replace("-","_",$producTouchActive);
		$producTouchActive = str_replace(")","_",$producTouchActive);
		$producTouchActive = str_replace("(","_",$producTouchActive);
		
		echo "<div id='active".$producTouchActive.$product->getId()."' title='".str_replace(" ","_",$product->getName()).$product->getId()."' class='active_prod'  name='productId".$product->getId()."'>";
		echo "<div class='column' draggable='true' style='margin-bottom:20px;'  id='active'><img src='".$product->getImage()."' width='60' height='50' align='left' />";
		echo "<header class='prod_head'>".$product->getName()."<input id='".str_replace(" ","_",$product->getName()).$product->getId()."' type='hidden' value='categoryMain".str_replace(" ","_",$product->getCategoryName())."' title='".str_replace(" ","_",$product->getCategoryName())."'/></header>";
		echo "<p id='categoryName' style='color:#000;'>".$product->getCategoryName()."</p>";
		echo "<p id='productPrice' style='color:#000;'>$".$product->getPrice()."</p>";
		echo "</div><img src='img/tilde.png' width='22' height='17' onclick='removeToDraftFromActive(this.parentNode);' class='tilde' onmouseover='changeIconTilde();'/><img src='img/editar.png' width='23' height='18' onClick='editar(".$product->getId().")' style='margin-top:15px;' /><img src='img/papeleraReciclaje.gif' width='23' height='22' onClick='getDeleteProduct(".$product->getId().");' style='margin-top:15px;'/></div>";
	}
	?>      
       </div>

    </td>
  </tr>
  <tr>
  <td>
  <br />
  <p class='tab_tittle'>Borrador</p>
  <br />
  <div  style="overflow:scroll;height:450px; width:300px;">
  <table id="contenedorBorrador">
  <?php
  for ($i=0; $i<count($DraftProduct); $i++)
  {
	  $product = $DraftProduct[$i];
	  $producTouchDraft = str_replace(" ","_",$product->getName());
	  $producTouchDraft = str_replace("/","_",$producTouchDraft);
	  $producTouchDraft = str_replace("-","_",$producTouchDraft);
	  $producTouchDraft = str_replace(")","_",$producTouchDraft);
	  $producTouchDraft = str_replace("(","_",$producTouchDraft);
	  
		echo "<tr><td>";  
		echo "<div id='Draft".$producTouchDraft.$product->getId()."' title='".str_replace(" ","_",$producTouchDraft).$product->getId()."' class='active_prod'
		name='productId".$product->getId()."'>";
		echo "<div class='column' draggable='true' style='margin-bottom:20px;' id='active'><img src='".$product->getImage()."' width='60' height='50' align='left' />";
		echo "<header style='background:white;margin-left:-100px;'>".$product->getName()."<input id='".str_replace(" ","_",$product->getName()).$product->getId()."' type='hidden' value='categoryMain".str_replace(" ","_",$product->getCategoryName())."' title='".str_replace(" ","_",$product->getCategoryName())."'></header>";
		if ( $product->getCategoryName() != 'Inicio' && $product->getCategoryName() != 'Home')
			echo "<p id='categoryName' style='color:#000;'>".$product->getCategoryName()."</p>";
		echo "<p id='productPrice' style='color:#000;'>".$product->getPrice()."</p>";
		
		if ( $product->getCategoryName() != 'Inicio' && $product->getCategoryName() != 'Home' )
		
			echo "</div><img src='img/draft.png' width='24' height='23' class='tilde' onmouseover='changeIconTilde();' style='cursor: pointer;' onclick='restoreFromDraftToCategory(this.parentNode);' ><img src='img/editar.png' width='23' height='18' onclick='editar(".$product->getId().")' style='margin-top:15px;'><img src='img/papeleraReciclaje.gif' width='23' height='22' onClick='getDeleteProduct(".$product->getId().");' style='margin-top:15px;'></div></td></tr>";
		
		else
			echo "</div><img src='img/draft.png' width='24' height='23' onclick='' class='tilde' onmouseover='changeIconTilde();' style='cursor: pointer;'><img src='img/editar.png' width='23' height='18' onclick='editar(".$product->getId().")' style='margin-top:15px;'><img src='img/papeleraReciclaje.gif' width='23' height='22' onClick='getDeleteProduct(".$product->getId().");' style='margin-top:15px;'></div></td></tr>";
  }
    
  ?>
   
  </td>
  </tr>
  </table>
  </div>
  <br />
  <tr>
  <td align="center" >
  <div id="panelNewCategory" class="category"  style="margin-bottom:20px; height:30px;width:220px;display:inline-table;margin-left:35px;" align="center" >
  <div id="linkNewCategory" style="display:table;width:220px;height:30px;" onClick="goToNewProduct();" >
   <p id="labelNewCategory" style="margin-top:12px; display:table;margin-left:23px;color:#376092;" align="center"  ><b>Crear Nuevo Producto</b></p></div>
    </div>
  </td>
  </tr>
    <br />
    <tr><td>
    
<div align="right" id="ButtonGroup" style="width:250px;display:table;float:left;margin-left:80px;">

<div style="float:right;" id="buttonCancel" style="display:table;" onclick="javascript:location.reload(true);"><div style="float:left;" id="buttonSave"><div id="panelNewCategory" class="category" style="margin-bottom:20px; height:20px;width:130px;display:inline-table;margin-left:-50px;">
   <p align="center" style="margin-top:12px; display:table;margin-left:27px;color:#000000;vertical-align:middle;" id="labelNewCategory"><b>Cancelar</b></p>
    </div></div></div>

<div style="float:left;" id="buttonSave" style="display:table;" onclick="getSaveCatalogInformation(this);"><div id="panelNewCategory" class="category" style="margin-bottom:20px; height:20px;width:130px;display:inline-table;margin-left:-75px;">
    <p align="center" style="margin-top:12px; display:table;margin-left:27px;color:#000000;vertical-align:middle;" id="labelNewCategory"><b>Guardar</b></p>
    </div></div>
</div>
    </td></tr>
</table>

<input type="hidden" id="actions" name="actions" value=""  />
<input type="hidden" id="actionsIdProduct" name="actionsIdProduct" value=""  />
<input type="hidden" id="actionsCategory" name="actionsCategory" value=""  />


</div>

</div>
<script type="text/javascript" src="js/catalogoDrag&DropFunctions.js"></script>
</body>
</html>

