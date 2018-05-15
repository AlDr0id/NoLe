<?php
session_start();
require_once("include/productoOfreSA.php");
require_once("include/productoOfreTransfer.php");
require_once("include/numismaticaSA.php");
require_once("include/numismaticaTransfer.php");

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
        echo $_FILES['fotoProd']['tmp_name'];
        echo "img/" . $id . ".png";
        if(move_uploaded_file($_FILES['fotoProd']['tmp_name'], "img/" . $id . ".png")) {
          $id3 = True;
          $id2 = $productoSA->newProductoNumi($productoNumi);
        }
        else {
          $id3 = False;
          $id2 = False;
        }

 				break;

 			default:
 				break;
 		}

		if($id && $id2 && $id3) {
			echo "<script>alert('Producto añadido');</script>";
		}
		else {
			echo "<script>alert('Fallo al añadir producto');</script>";
		}

 		header("Refresh: 0 ;URL= index.php");

 ?>
