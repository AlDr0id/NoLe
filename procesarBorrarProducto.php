<?php
	ob_start();
	require_once('include/productoOfreSA.php');

	$sa = new productoOfreSA();
	if($sa->deleteProducto($_GET['id'])){
		header('Location: index.php?okCod=1');
	}
	else{
		header('Location: product.php?errCod=2');
	}
	ob_end_flush();
?>