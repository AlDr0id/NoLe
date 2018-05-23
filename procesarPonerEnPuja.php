<?php 
	require_once('include/productoOfreSA.php');
	require_once('include/productoSolicitadoSA.php');

	$sa = new productoOfreSA();

	$idProducto = $_GET['idProducto'];
	
	$producto = $sa->getProducto($idProducto);
	
	$producto->setEnPuja(1);

    $sa->editProducto($producto);
    $productoSolSA = new productoSolicitadoSA();
	$productoSolSA->comprobarProducto($producto);

	header("Location: perfil.php?opt=verProdPuja");
?>