<?php 
	require_once('include/UsuarioSA.php');

	$sa = new UsuarioSA();

	$sa->valorarUsuario($_GET['nickname'],$_POST['estrellas']);

	header("Location: perfil.php?opt=actividadReciente");
?>