<?php 
	require_once('include/UsuarioSA.php');
	require_once('include/pujaSA.php');

	$sap = new pujaSA();
	$sau = new UsuarioSA();

	$idpuja = $_GET['idpuja'];
	$puja = $sap->getPuja($idpuja);
	
	$vendedor = $puja->getIdVendedor();
	
	$sau->valorarUsuario($vendedor, $_POST['estrellas']);

	$puja->setValorada(1);
	$sap->editPuja($puja);

	header("Location: perfil.php?opt=actividadReciente");
?>