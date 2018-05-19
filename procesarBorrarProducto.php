<?php
	require_once('include/productoOfreSA.php');

	$sa = new productoOfreSA();
	$sa->deleteProducto($_GET['id']);
	header('Location: index.php');
?>