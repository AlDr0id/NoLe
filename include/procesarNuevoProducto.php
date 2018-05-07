<?php
session_start();
require_once("productoOfreSA.php");
require_once("productoOfreTransfer.php");
require_once("numismaticaSA.php");
require_once("numismaticaTransfer.php");

function newProductControlador(productoOfreTransfer $producto){
 		$productoSA = new productoOfreSA();
 		$correcto=$productoSA->newProducto($producto);
 		return $correcto;
 }

 		/*Atributos comunes*/
 		$nomP = htmlspecialchars(trim(strip_tags($_POST['nomP'])));
 		$cat = htmlspecialchars(trim(strip_tags($_POST['cateP'])));
 		$precio = htmlspecialchars(trim(strip_tags($_POST['precio'])));
 		$descP = htmlspecialchars(trim(strip_tags($_POST['descP'])));
 		$producto = new productoOfreTransfer('',$_SESSION['nombre'],$nomP ,$cat,date('Y-m-d'),'1',$precio ,$descP,'0');
		$id = newProductControlador($producto);

		/*Atributos propios de la categoría*/
 		switch ($_POST['cateP']) {
 			case '0':
 				/* $id, $pais, $año, $conservacion*/
 				$paisP = htmlspecialchars(trim(strip_tags($_POST['paisP'])));
		 		$anioP = htmlspecialchars(trim(strip_tags($_POST['anioP'])));
		 		$consP = htmlspecialchars(trim(strip_tags($_POST['consP'])));
 				$productoNumi = new numismaticaTransfer($id, $paisP, $anioP , $consP);
 				$productoSA = new numismaticaSA();
 				$id2 = $productoSA->newProductoNumi($productoNumi);
 				break;

 			default:
 				break;
 		}

		if($id && $id2) {
			echo "<script>alert('Producto añadido');</script>";
		}
		else {
			echo "<script>alert('Fallo al añadir producto');</script>";
		}

 		header("Refresh: 0 ;URL= ../index.php");

 ?>
