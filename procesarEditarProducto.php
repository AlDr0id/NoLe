<?php
session_start();
require_once("include/productoOfreSA.php");
require_once("include/productoOfreTransfer.php");
require_once("include/numismaticaSA.php");
require_once("include/numismaticaTransfer.php");

 		/*Atributos comunes*/
 		$idP = htmlspecialchars(trim(strip_tags($_POST['idP'])));
 		$nomP = htmlspecialchars(trim(strip_tags($_POST['nomP'])));
		$cat = htmlspecialchars(trim(strip_tags($_POST['cateP'])));
		if(isset($_POST['precio'])) $precio = htmlspecialchars(trim(strip_tags($_POST['precio'])));
 		$descP = htmlspecialchars(trim(strip_tags($_POST['descP'])));
 		$productoSA = new productoOfreSA();
 		$producto = $productoSA->getProducto($idP);
 		$producto->setNombre($nomP);
 		$producto->setCategoria($cat);
 		if(isset($_POST['precio'])) $producto->setPrecio($precio);
 		$producto->setDescripcion($descP);
		$id = $productoSA->editProducto($producto);

		/*Atributos propios de la categoría*/
 		switch ($_POST['cateP']) {
 			case '0':
 				/* $id, $pais, $año, $conservacion*/
 				$paisP = htmlspecialchars(trim(strip_tags($_POST['paisP'])));
		 		$anioP = htmlspecialchars(trim(strip_tags($_POST['anioP'])));
		 		$consP = htmlspecialchars(trim(strip_tags($_POST['consP'])));
 				$productoSA = new numismaticaSA();
 				$productoNumi = $productoSA->getProductoNumi($idP);
 				$productoNumi->setPais($paisP);
 				$productoNumi->setAño($anioP);
 				$productoNumi->setConservacion($consP);

 				$id2 = $productoSA->editProductoNumi($productoNumi);
 				break;

 			default:
 				break;
 		}

$id3 = move_uploaded_file($_FILES['fotoProd']['tmp_name'], "img/" . $idP . ".png");

if($id && $id2) {
  if($id3) {
    echo "<script>alert('Producto modificado');</script>";
  }
  else {
    echo "<script>alert('Producto modificado, pero error al modificar la foto del producto');</script>";
  }

}
else {
  echo "<script>alert('Fallo al modificar producto');</script>";
}

 		header("Refresh: 0 ;URL= perfil.php?opt=verProds");

 ?>
