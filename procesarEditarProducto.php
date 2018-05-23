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
		if(isset($_POST['precio'])){$precio = htmlspecialchars(trim(strip_tags($_POST['precio'])));}
 		$descP = htmlspecialchars(trim(strip_tags($_POST['descP'])));

 		$productoSA = new productoOfreSA();
 		$producto = $productoSA->getProducto($idP);
 		$producto->setNombre($nomP);
 		$producto->setCategoria($cat);
 		if(isset($_POST['precio'])) $producto->setPrecio($precio);
 		$producto->setDescripcion($descP);
		$id = $productoSA->editProducto($producto);
    $id3 = move_uploaded_file($_FILES['fotoProd']['tmp_name'], "img/prods/" . $idP . ".png");

		/*Atributos propios de la categoría*/
 		switch ($cat) {
 			case '0':
 				/* $id, $pais, $año, $conservacion*/
        require_once("include/numismaticaSA.php");
        require_once("include/numismaticaTransfer.php");
 				$paisP = htmlspecialchars(trim(strip_tags($_POST['paisP'])));
		 		$anioP = htmlspecialchars(trim(strip_tags($_POST['anioP'])));
		 		$consP = htmlspecialchars(trim(strip_tags($_POST['consP'])));
        $productoNumi = new numismaticaTransfer($id, $paisP, $anioP , $consP);
        $productoSA = new numismaticaSA();

        $productoNumi->setId($idP);
 				$id2 = $productoSA->editProductoNumi($productoNumi);
 				break;
      case '1':
        require_once("include/rinconAbSA.php");
        require_once("include/rinconAbTransfer.php");
        $rclaTipo = htmlspecialchars(trim(strip_tags($_POST['rclaTipo'])));
        $rclaOrigen = htmlspecialchars(trim(strip_tags($_POST['rclaOrigen'])));
        $productoRdla = new rinconAbTransfer($id, $rclaTipo, $rclaOrigen);
        $productoSA = new rinconAbSA();

        $productoRdla->setId($idP);
        $id2 = $productoSA->editProductoRinconAb($productoRdla);

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

        $productofiguras->setId($idP);
        $id2 = $productoSA->editProductoFiguras($productofiguras);

        break;
      case '3':
        require_once("include/filateliaSA.php");
        require_once("include/filateliaTransfer.php");
        $filPais = htmlspecialchars(trim(strip_tags($_POST['filPais'])));
        $filAnyo = htmlspecialchars(trim(strip_tags($_POST['filAnyo'])));
        $productoFil = new filateliaTransfer($id, $filAnyo, $filPais);
        $productoSA = new filateliaSA();

        $productoFil->setId($idP);
        $id2 = $productoSA->editProductoFilatelia($productoFil);

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

        $productoVini->setId($idP);
        $id2 = $productoSA->editProductoVinilosDiscos($productoVini);

        break;
      case '5':
        require_once("include/cromosSA.php");
        require_once("include/cromosTransfer.php");
        $cromosAnyo = htmlspecialchars(trim(strip_tags($_POST['cromosAnyo'])));
        $cromosColec = htmlspecialchars(trim(strip_tags($_POST['cromosColec'])));
        $cromosNum = htmlspecialchars(trim(strip_tags($_POST['cromosNum'])));
        $productoCromos = new cromosTransfer($id, $cromosAnyo, $cromosColec , $cromosNum);
        $productoSA = new cromosSA();

        $productoCromos->setId($idP);
        $id2 = $productoSA->newProductoCromos($productoCromos);

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

        $productoLib->setId($idP);
        $id2 = $productoSA->newProductoLibrosComics($productoLib);

        break;
      case '7':
        require_once("include/trasteroSA.php");
        require_once("include/trasteroTransfer.php");
        $trasteroAnyo = htmlspecialchars(trim(strip_tags($_POST['trasteroAnyo'])));
        $trasteroOrigen = htmlspecialchars(trim(strip_tags($_POST['trasteroOrigen'])));
        $productoTras = new trasteroTransfer($id, $trasteroAnyo, $trasteroOrigen);
        $productoSA = new trasteroSA();

        $productoTras->setId($idP);
        $id2 = $productoSA->newProductoTrastero($productoTras);
        break;

 			default:
 				break;
 		}

if($id && $id2) {
  if($id3==NULL or $id3) {
    header("Refresh: 0 ;URL= product.php?id=".$idP."&okCod=2");
  }
  else {
    header("Refresh: 0 ;URL= product.php?id=".$idP."&errCod=1");
  }

}
else {
  header("Refresh: 0 ;URL= perfil.php?opt=anadProd&id=".$idP."&errCod=2");
}

 		/*header("Refresh: 0 ;URL= perfil.php?opt=verProds");*/

 ?>
