<?php 
	if (isset($_POST['estrellas'])) {
		echo '<script>console.log("'.$_GET['id'].' valora '.$_POST['estrellas'].'");</script>';
	}
	else{
		echo '<script>console.log("'.$_GET['id'].' valora 0");</script>';
	}
	header("Location: perfil.php?opt=actividadReciente");
?>