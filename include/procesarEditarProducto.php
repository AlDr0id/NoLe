<?php
session_start();
require_once("productoOfreSA.php");
require_once("productoOfreTransfer.php");
require_once("numismaticaSA.php");
require_once("numismaticaTransfer.php");

 		/*Atributos comunes*/
 		$idP = htmlspecialchars(trim(strip_tags($_POST['idP'])));
 		$nomP = htmlspecialchars(trim(strip_tags($_POST['nomP'])));
 		$cat = htmlspecialchars(trim(strip_tags($_POST['cateP'])));
 		$precio = htmlspecialchars(trim(strip_tags($_POST['precio'])));
 		$descP = htmlspecialchars(trim(strip_tags($_POST['descP'])));
 		$productoSA = new productoOfreSA();
 		$producto = $productoSA->getProducto($idP);
 		$producto->setNombre($nomP);
 		$producto->setCategoria($cat);
 		$producto->setPrecio($precio);
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

		if($id && $id2) {
			echo "<script>alert('Producto modificado');</script>";
		}
		else {
			echo "<script>alert('Fallo al modificar producto');</script>";
		}
 		header("Refresh: 0 ;URL= ../index.php");

 ?>