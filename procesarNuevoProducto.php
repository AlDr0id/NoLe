<?php
session_start();
require_once("include/productoOfreSA.php");
require_once("include/productoOfreTransfer.php");
require_once("include/productoSolicitadoSA.php");

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
 		$producto = new productoOfreTransfer('',$_SESSION['nombre'],$nomP ,$cat,date('Y/m/d h:i:s', time()),'1',$precio ,$descP,'0');
		$id = newProductControlador($producto);
		$producto->setId($id);
		$productoSolSA = new productoSolicitadoSA();
		$productoSolSA->comprobarProducto($producto);


		/*Atributos propios de la categoría*/
 		switch ($_POST['cateP']) {
 			case '0':
 				require_once("include/numismaticaSA.php");
				require_once("include/numismaticaTransfer.php");
 				$paisP = htmlspecialchars(trim(strip_tags($_POST['paisP'])));
		 		$anioP = htmlspecialchars(trim(strip_tags($_POST['anioP'])));
		 		$consP = htmlspecialchars(trim(strip_tags($_POST['consP'])));
 				$productoNumi = new numismaticaTransfer($id, $paisP, $anioP , $consP);
 				$productoSA = new numismaticaSA();

		        if(move_uploaded_file($_FILES['fotoProd']['tmp_name'], "img/" . $id . ".png")) {
		          $id3 = True;
		          $id2 = $productoSA->newProductoNumi($productoNumi);
		        }
		        else {
		          $id3 = False;
		          $id2 = False;
		        }

 				break;
 			case '1':
 				require_once("include/rinconAbSA.php");
				require_once("include/rinconAbTransfer.php");
 				$rclaTipo = htmlspecialchars(trim(strip_tags($_POST['rclaTipo'])));
		 		$rclaOrigen = htmlspecialchars(trim(strip_tags($_POST['rclaOrigen'])));
		 		$productoRdla = new rinconAbTransfer($id, $rclaTipo, $rclaOrigen);
 				$productoSA = new rinconAbSA();

		        if(move_uploaded_file($_FILES['fotoProd']['tmp_name'], "img/" . $id . ".png")) {
		          $id3 = True;
		          $id2 = $productoSA->newProductoRinconAb($productoRdla);
		        }
		        else {
		          $id3 = False;
		          $id2 = False;
		        }

 				break;
 			case '2':
 				require_once("include/figurasSA.php");
				require_once("include/figurasTransfer.php");
 				$figAlto = htmlspecialchars(trim(strip_tags($_POST['figAlto'])));
		 		$figAncho = htmlspecialchars(trim(strip_tags($_POST['figAncho'])));
		 		$figLargo = htmlspecialchars(trim(strip_tags($_POST['figLargo'])));
		 		$figTema = htmlspecialchars(trim(strip_tags($_POST['figTema'])));
		 		$figMaterial = htmlspecialchars(trim(strip_tags($_POST['figMaterial'])));
		 		$figFabricante = htmlspecialchars(trim(strip_tags($_POST['figFabricante'])));
 				$productofiguras = new figurasTransfer($id, $figAlto, $figAncho, $figLargo, $figTema, $figMaterial,$figFabricante);
 				$productoSA = new figurasSA();
		        if(move_uploaded_file($_FILES['fotoProd']['tmp_name'], "img/" . $id . ".png")) {
		          $id3 = True;
		          $id2 = $productoSA->newProductoFiguras($productofiguras);
		        }
		        else {
		          $id3 = False;
		          $id2 = False;
		        }

 				break;
 			case '3':
 				require_once("include/filateliaSA.php");
				require_once("include/filateliaTransfer.php");
 				$filPais = htmlspecialchars(trim(strip_tags($_POST['filPais'])));
		 		$filAnyo = htmlspecialchars(trim(strip_tags($_POST['filAnyo'])));
 				$productoFil = new filateliaTransfer($id, $filAnyo, $filPais);
 				$productoSA = new filateliaSA();

		        if(move_uploaded_file($_FILES['fotoProd']['tmp_name'], "img/" . $id . ".png")) {
		          $id3 = True;
		          $id2 = $productoSA->newProductoFilatelia($productoFil);
		        }
		        else {
		          $id3 = False;
		          $id2 = False;
		        }

 				break;
 			case '4':
 				require_once("include/vinilosDiscosSA.php");
				require_once("include/vinilosDiscosTransfer.php");
 				$viniAnyo = htmlspecialchars(trim(strip_tags($_POST['viniAnyo'])));
		 		$viniComp = htmlspecialchars(trim(strip_tags($_POST['viniComp'])));
		 		$viniGrupo = htmlspecialchars(trim(strip_tags($_POST['viniGrupo'])));
		 		$viniGenero = htmlspecialchars(trim(strip_tags($_POST['viniGenero'])));
 				$productoVini = new vinilosDiscosTransfer($id, $viniAnyo, $viniComp , $viniGrupo, $viniGenero);
 				$productoSA = new vinilosDiscosSA();

		        if(move_uploaded_file($_FILES['fotoProd']['tmp_name'], "img/" . $id . ".png")) {
		          $id3 = True;
		          $id2 = $productoSA->newProductoVinilosDiscos($productoVini);
		        }
		        else {
		          $id3 = False;
		          $id2 = False;
		        }

 				break;
 			case '5':
 				require_once("include/cromosSA.php");
				require_once("include/cromosTransfer.php");
 				$cromosAnyo = htmlspecialchars(trim(strip_tags($_POST['cromosAnyo'])));
		 		$cromosColec = htmlspecialchars(trim(strip_tags($_POST['cromosColec'])));
		 		$cromosNum = htmlspecialchars(trim(strip_tags($_POST['cromosNum'])));
 				$productoCromos = new cromosTransfer($id, $cromosAnyo, $cromosColec , $cromosNum);
 				$productoSA = new cromosSA();

		        if(move_uploaded_file($_FILES['fotoProd']['tmp_name'], "img/" . $id . ".png")) {
		          $id3 = True;
		          $id2 = $productoSA->newProductoCromos($productoCromos);
		         
		        }
		        else {
		          $id3 = False;
		          $id2 = False;
		        }

 				break;
 			case '6':
 				require_once("include/librosComicsSA.php");
				require_once("include/librosComicsTransfer.php");
 				$librosAnyo = htmlspecialchars(trim(strip_tags($_POST['librosAnyo'])));
		 		$librosAutor = htmlspecialchars(trim(strip_tags($_POST['librosAutor'])));
		 		$librosEditorial = htmlspecialchars(trim(strip_tags($_POST['librosEditorial'])));
		 		$librosGenero = htmlspecialchars(trim(strip_tags($_POST['librosGenero'])));
		 		$librosIdioma = htmlspecialchars(trim(strip_tags($_POST['librosIdioma'])));
		 		$librosFormato = htmlspecialchars(trim(strip_tags($_POST['librosFormato'])));
 				$productoLib = new librosComicsTransfer($id, $librosAnyo, $librosAutor , $librosEditorial, $librosGenero, $librosIdioma, $librosFormato);
 				$productoSA = new librosComicsSA();

		        if(move_uploaded_file($_FILES['fotoProd']['tmp_name'], "img/" . $id . ".png")) {
		          $id3 = True;
		          $id2 = $productoSA->newProductoLibrosComics($productoLib);
		        }
		        else {
		          $id3 = False;
		          $id2 = False;
		        }

 				break;
 			case '7':
 				require_once("include/trasteroSA.php");
				require_once("include/trasteroTransfer.php");
 				$trasteroAnyo = htmlspecialchars(trim(strip_tags($_POST['trasteroAnyo'])));
		 		$trasteroOrigen = htmlspecialchars(trim(strip_tags($_POST['trasteroOrigen'])));
 				$productoTras = new trasteroTransfer($id, $trasteroAnyo, $trasteroOrigen);
 				$productoSA = new trasteroSA();
 				$id2 = $productoSA->newProductoTrastero($productoTras);

		        if(move_uploaded_file($_FILES['fotoProd']['tmp_name'], "img/" . $id . ".png")) {
		          $id3 = True;
		         
  				 
		        }
		        
		        else {
		          $id3 = False;
		          $id2 = False;
		        }

 				break;

 			default:
 					header("Refresh: 0 ;URL= perfil.php?opt=anadProd");
 				break;
 		}


/*
		if($id and $id2 and $id3) {
			/*echo "<script>alert('Producto añadido');</script>";
			header("Refresh: 0 ;URL= product.php?id=".$id);
		}
		else {
			echo "<script>alert('Fallo!".$id."+".$id2."+".$id3."');</script>";
		}
*/
 		header("Refresh: 0 ;URL= product.php?id=".$id);

 ?>
