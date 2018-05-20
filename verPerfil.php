<?php
	if (! isset($_GET['editarperfil'])){
		$editarperfil = false;
	}
	else {
		if ($_GET['editarperfil']==true){
			$editarperfil = true;
		}
		else{
			$editarperfil = false;
		}
	}
	require_once("include/UsuarioSA.php");
	$sa = new UsuarioSA();
  	$user = new usuarioTransfer($_SESSION["nombre"],"","","","",0,0,"");
	$us = $sa->mostrarUsuario($user);

	if (! $editarperfil){
?>

		<h1>Tus datos</h1>

		<div class="usuario">
		  	<div class="imagen">
				<h5>Imagen: </h5>
				<?php
				echo "<img src=\"img/" . $us->getNickname() . ".png\"/>";
			?>

			</div>
		  	<div class="details">
		    <?php
			    echo"<h1>Nickname: ".$us->getNickname()."</h1>";
			?>
			    <div class="author">
			      	<h2>Nombre y apellidos: <?php echo $us->getNombre() . " " . $us->getApellido() ?></h2>
			    </div>
			    <div class="mail">
			      	<h2>Email: <?php echo $us->getCorreo() ?></h2>
			    </div>
			    <div class="separator"></div>
			    <?php
			    	$editarperfil=true;
			    	$path = 'perfil.php?opt=verPerfil&editarperfil='.$editarperfil;
			    	echo '<a class="seemore" href='.$path.'><i class="right"></i><p>Editar mi perfil</p></a>';
			   	?>


		  </div>
		</div>
<?php
	}
	else{
		$editarperfil=false;
?>
		<div class="cambiarDatos">
			<form class="formulario" action="procesarEditarPerfil.php" method="POST" enctype="multipart/form-data">
				<p>Nombre: </p>
				<input type="text" name="nom" value=<?php echo $us->getNombre() ?>>
				<p>Apellidos: </p>
				<input type="text" name="ape" value=<?php echo $us->getApellido() ?>>
				<p>Email: </p>
				<input type="text" name="mail" value=<?php echo $us->getCorreo() ?>>
				<p>Inserta tu contraseña*: </p>
				<input type="password" name="pass" required="true">
				<p>Foto perfil: </p>
				<input type="file" name="fotoPerfil" />
				<button type="submit" class="guardar">Guardar datos</button>
			</form>

		</div>
<?php
	}
?>
