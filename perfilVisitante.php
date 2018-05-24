<?php session_start();
	require_once("include/UsuarioSA.php");
	$nickname = $_GET["nickname"];
	$sa = new UsuarioSA();
  	$user = new usuarioTransfer($nickname,"","","","",0,0,"");
	$us = $sa->mostrarUsuario($user);

	$nombre="";
	if (isset($_SESSION['login'])){
		$nombre =$_SESSION ["nombre"];
	}

	if($us->getNickname() == $nombre){
		header("Refresh: 0 ;URL= perfil.php?opt=verPerfil");
	}?>
<!DOCTYPE html>
<html>
<head>
  <title>NoLe</title>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="estilo.css">
  <link rel="stylesheet" type="text/css" href="card.css">
  <link rel="stylesheet" type="text/css" href="menu.css">
  <link rel="stylesheet" type="text/css" href="arrows.css">
  <link rel="stylesheet" type="text/css" href="popup-style.css">
  <link rel="stylesheet" type="text/css" href="cabecera.css">
  <link rel="stylesheet" type="text/css" href="perfil-style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  	<script type="text/javascript" src="javascript.js"></script>

</head>
<body>

  <?php require_once("include/comun/cabecera.php");
  require_once("include/comun/menu.php");

  ?>

  <div class="slider">
    <img src="error/no-image.png">
  </div>
  <div class="container">
<?php

		echo '<h1>Perfil de: '. $us->getNickname() . '</h1>';
?>
		<div class="visitante">
		  	<div class="imagen">
		  		<?php if ($us->getActivo()== 1)	{ ?>
					<div class="conectado">
						<?php echo "<img src=\"img/" . $us->getNickname() . ".png\" />" ?>
					</div>
				<?php
				}
				else{ ?>
					<div class="desconectado">
						<?php echo "<img src=\"img/\"" . $us->getNickname() . "\".png\" />" ?>
					</div>
				<?php
				}
				?>
			</div>
		  	<div class="details">
			    <div class="author">
			      	<h2>Nombre y apellidos: <?php echo $us->getNombre() . " " . $us->getApellido() ?></h2>
			    </div>
			    <div class="mail">
			      	<h2>Email: <?php echo $us->getCorreo() ?></h2>
			    </div>
			    <div class="valoracion">
			      	<h2>Valoración:
			      		<form>
						  <span class="clasificacion">
						   <input id="radio1" type="radio" name="estrellas" value="5" disabled <?php if ($us->getValoracion() > 4 and $us->getValoracion() <= 5) { echo "checked";}?>>
					   		<label for="radio1">★</label><!--
					    --><input id="radio2" type="radio" name="estrellas" value="4" disabled <?php if ($us->getValoracion() > 3 and $us->getValoracion() <= 4) { echo "checked";}?>><!--
					    --><label for="radio2">★</label><!--
					    --><input id="radio3" type="radio" name="estrellas" value="3" disabled <?php if ($us->getValoracion() > 2 and $us->getValoracion() <= 3) { echo "checked";}?>><!--
					    --><label for="radio3">★</label><!--
					    --><input id="radio4" type="radio" name="estrellas" value="2" disabled <?php if ($us->getValoracion() > 1 and $us->getValoracion() <= 2) { echo "checked";}?>><!--
					    --><label for="radio4">★</label><!--
					    --><input id="radio5" type="radio" name="estrellas" value="1" disabled <?php if ($us->getValoracion() > 0 and $us->getValoracion() <= 1) { echo "checked";}?>><!--
					    --><label for="radio5">★</label>
						  </span>
						</form>
						</h2>
			      	<h4> <?php echo $us->getNumValoraciones() ?> valoraciones</h4>
			    </div>
			    <div class="separator"></div>
		  </div>
		</div>
	</div>
	<?php require_once("include/comun/footer.php") ?>
	<?php
		
	?>
</body>

</html>
