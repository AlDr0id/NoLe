<?php session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <title>NoLe</title>
  <link rel="stylesheet" type="text/css" href="estilo.css">
  <link rel="stylesheet" type="text/css" href="card.css">
  <link rel="stylesheet" type="text/css" href="menu.css">
  <link rel="stylesheet" type="text/css" href="arrows.css">
  <link rel="stylesheet" type="text/css" href="adv-search.css">
  <link rel="stylesheet" type="text/css" href="prod-styles.css">
  <link rel="stylesheet" type="text/css" href="popup-style.css">
  <link rel="stylesheet" type="text/css" href="perfil-style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300" rel="stylesheet">
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
	require_once("include/UsuarioSA.php");
	$nickname = $_GET["nickname"];
	$sa = new UsuarioSA();
  	$user = new usuarioTransfer($nickname,"","","","",0,0,"");
	$us = $sa->mostrarUsuario($user);
	echo '<h1>Perfil de: '. $us->getNickname() . '</h1>';
?>	
		<div class="visitante">
		  	<div class="imagen">
		  		<?php if ($us->getActivo()== 1)	{ ?>
					<div class="conectado">
						<img src="img/2.png" />
					</div>
				<?php
				}
				else{ ?>
					<div class="desconectado">
						<img src="img/2.png" />
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
			      	<h2>Valoración: *AQUÍ HAY QUE METER LA VALORACIÓN* <?php echo $us->getValoracion() ?></h2>
			      	<h4> <?php echo $us->getNumValoraciones() ?> valoraciones</h4>
			    </div>
			    <div class="separator"></div>
		  </div>
		</div> 
	</div>
	<div class="footer">
	    <p>Javier Picatoste - Rodrigo - Álvaro - Manu - Alex - Marcos - Dani - Alberto</p>
	</div>
</body>
</html>
		