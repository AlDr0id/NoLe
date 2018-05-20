<?php 
	require_once('include/productoOfreSA.php');

	$sa = new productoOfreSA();

	$idProducto = $_GET['idProducto'];
	
	$producto = $sa->getProducto($idProducto);
	
	$producto->setEnPuja(1);

    $sa->editProducto($producto);

	header("Location: perfil.php?opt=verProdPuja");
?>