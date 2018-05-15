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
		<h1>Búsqueda avanzada</h1>
		<div class="busc">
			<div class="adv-search-div">
				<form class="formulario adv-search" action="procesarBusquedaAvanzada.php" method="POST">
					<div class="opciones">
						<span>
						<p>Categoría: </p>
							<select name="cateP" id="categorias">
								<option value="-1" selected>Todas las categorías</option>
								<option value="0">Numismática</option>
								<option value="1">El Rincón de la Abuela</option>
								<option value="2">Figuras</option>
								<option value="3">Filatelia</option>
								<option value="4">Vinilos/Discos</option>
								<option value="5">Cromos</option>
								<option value="6">Libros/Comics</option>
								<option value="7">Trastero</option>
							</select>
						</span>
						<span>
							<p>Nombre: </p>
							<input type="text" name="nomProd" class="campo">
						</span>
						<span>
							<p>Precio: </p>
							<select name="minPre" class="ran campo">
								<option value="-1" selected>Min</option>
								<?php
									for ($i=0; $i <=200 ; $i=$i+10) {
										echo '<option value="'.$i.'">'.$i.'</option>';
									}
								?>
							</select>
							<select name="maxPre" class="ran campo" >
								<option value="-1" selected>Max</option>
								<?php
									for ($i=0; $i <=200 ; $i=$i+10) {
										echo '<option value="'.$i.'">'.$i.'</option>';
									}
								?>
								<option value="-1">Más todavía</option>
							</select>
						<span>
					</div>
					<div class="numiBuscar">
						<span>
							<p>Año: </p>
							<input class="campo" type="number" name="anio" min="-1" max="2018">
						</span>
						<span>
							<p>País: </p>
							<input class="campo" type="text" name="pais">
						</span>
						<span>
							<p>Conservacion: </p>
							<input class="campo" type="text" name="cons">
						</span>
					</div>
					<button type="submit">Buscar</button>
				</form>
			</div>
			<div class="productos">

			</div>
		</div>
	</div>
	<div class="footer">
		<p>Javier Picatoste - Rodrigo - Álvaro - Manu - Alex - Marcos - Dani - Alberto</p>
	</div>
</body>
<script type="text/javascript" src="javascript.js"></script>
<script type="text/javascript" src="buscScript.js"></script>
</html>
