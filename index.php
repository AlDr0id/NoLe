<?php session_start(); ?>
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
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300" rel="stylesheet">
	<script type="text/javascript" src="javascript.js"></script>
</head>
<body>

	<?php require_once("include/comun/cabecera.php"); ?>

	<div class="hero-banner">
		<img src="hero/colec3.jpeg">
		<form action="procesarBusqueda.php" class="formulario buscNombre" method="POST">
			<h1>¿Quieres completar tu colección?</h1>
			<p>Encuentra tu producto con nosotros</p>
			<!--<input name="buscNom" type="text" placeholder="Búscalo aquí">
			<button type="submit">Buscar</button>-->
		</form>
	</div>
	<?php

	require_once("include/comun/menu.php");

	if(isset($_GET['okCod'])){
		if ($_GET['okCod'] == 1) {?>
			<div class="alert success">
			  <p><strong>Correcto!</strong> El producto ha sido borrado correctamente</p>
			</div>
		<?php
		}
		if ($_GET['okCod'] == 2) {?>
			<div class="alert success">
			  <p><strong>Correcto!</strong> La cuenta ha sido borrada correctamente</p>
			</div>
		<?php
		}
	}
	?>

	<div class="container">
		<?php
		/*AQUÍ VA EL SA DE ULTIMOS PRODUCTOS*/
			// require_once("include/BusquedaSA.php");
			// $sa = new BusquedaSA();
			// $prod = $sa->getProducto("");
			require_once("include/productoOfreSA.php");
			$tmp = new productoOfreSA();
			$ultimosProds = $tmp->getLastProducts(12);
		?>
			<h1>Últimos productos</h1>
			<div class="productosCuadricula">
			<?php

		    for ($i=0; $i < sizeof($ultimosProds); $i++) {
		    ?>
			  <div class="card cuadricula">
			  <?php echo '<div class="thumbnail"><img class="leftImg" src="img/prods/'.$ultimosProds[$i]->getId().'.png"/></div>'; ?>
			  <div class="details">
			    <?php
				    $path = 'product.php?id='.$ultimosProds[$i]->getId().'';
				    $perfil = 'perfilVisitante.php?nickname='.$ultimosProds[$i]->getOwner().'';
				    echo"<h1>".$ultimosProds[$i]->getNombre()."</h1>"; ?>
				    <div class="author">
				    	<?php echo '<a class ="seemore" href='. $perfil . '></i><img src="img/'.$ultimosProds[$i]->getOwner().'.png"/>
				    	<h2>'. $ultimosProds[$i]->getOwner() .'</h2></a>' ?>
				    </div>
				    <div class="category">
				      	<?php
				      		switch ($ultimosProds[$i]->getCategoria()) {
				      		 	case '0':
			                      echo "<a class='catLink' href='numismatica.php'> Numismática</a>";
			                      break;
			                    case '1':
			                      echo "<a class='catLink' href='rinconAbuela.php'>Rincón de la Abuela</a>";
			                      break;
			                    case '2':
			                      echo "<a class='catLink' href='figuras.php'>Figuras</a>";
			                      break;
			                    case '3':
			                      echo "<a class='catLink' href='filatelia.php'>Filatelia</a>";
			                      break;
			                    case '4':
			                      echo "<a class='catLink' href='vinilosDiscos.php'>Vinilos/Discos</a>";
			                      break;
			                    case '5':
			                      echo "<a class='catLink' href='cromos.php'>Cromos</a>";
			                      break;
			                    case '6':
			                      echo "<a class='catLink' href='librosComics.php'>Libros/Comics</a>";
			                      break;
			                    case '7':
			                      echo "<a class='catLink' href='trastero.php'>Trastero</a>";
			                      break;
				      		 }?>

				    </div>
				    <div class="precio">
				      	<h2><?php echo $ultimosProds[$i]->getPrecio() ?>$</h2>
				    </div>

				    <div class="separator"></div>
				    <p><?php echo $ultimosProds[$i]->getDescripcionCorta() ?></p>
				    <?php echo '<a class="seemore" href='.$path.'><p>Ir al producto</p></a>'?>

			  </div>
			</div>
			<?php }
			    ?>
			</div>
	</div>
	<?php require_once("include/comun/footer.php"); ?>
</body>
</html>
