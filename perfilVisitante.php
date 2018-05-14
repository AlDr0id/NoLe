<?php
	require_once("include/UsuarioSA.php");
	$nickname = $_GET["nickname"];
	$sa = new UsuarioSA();
  	$user = new usuarioTransfer($nickname,"","","","",0,0,"");
	$us = $sa->mostrarUsuario($user);
	echo '<h1>Perfil de: '. $us->getNickname() . '</h1>';
?>	

		<div class="usuario">
		  	<div class="imagen">
				<h5>Imagen: </h5>	
				<center><input type="file" id="files" name="files[]" /></center>
				<br />
				<center><output id="list"></output></center>
			</div>
		  	<div class="details">
			    <div class="author">
			      	<h2>Nombre y apellidos: <?php echo $us->getNombre() . " " . $us->getApellido() ?></h2>
			    </div>
			    <div class="mail">
			      	<h2>Email: <?php echo $us->getCorreo() ?></h2>
			    </div>
			    <div class="separator"></div>
		  </div>
		</div> 