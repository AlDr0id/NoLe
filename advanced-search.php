<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title>NoLe</title>
	<meta charset="utf-8">
	<link rel="icon" href="img/logo.png">
	<link rel="stylesheet" type="text/css" href="estilo.css">
	<link rel="stylesheet" type="text/css" href="card.css">
	<link rel="stylesheet" type="text/css" href="menu.css">
	<link rel="stylesheet" type="text/css" href="arrows.css">
	<link rel="stylesheet" type="text/css" href="adv-search.css">
	<link rel="stylesheet" type="text/css" href="popup-style.css">
	<link rel="stylesheet" type="text/css" href="cabecera.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300" rel="stylesheet">
	  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
					<div class="rdlaBuscar" >
						<span>
							<p>Tipo:</p>
							<select class="campo" name="rclaTipo">
								<option value="-1">Todos</option>
								<option value="0">Dedal</option>
								<option value="1">Vajilla</option>
								<option value="2">Imán</option>
								<option value="3">Otro</option>
							</select>
						</span>
						<span>
							<p>Origen:</p>
							<input class="campo" type="text" name="rclaOrigen" placeholder="Origen del producto" >
						</span>
					</div>
					<div class="figBuscar" >
						<span>
							<p>Tema:</p>
							<input class="campo" type="text" name="figTema" placeholder="Tema del producto" >
						</span>
						<span>
							<p>Material:</p>
							<input class="campo" type="text" name="figMaterial" placeholder="Material del que está hecho el producto" >
						</span>
						<span>
							<p>Fabricante:</p>
							<input class="campo" type="text" name="figFabricante" placeholder="Fabricante del producto" >
						</span>
					</div>
					<div class="filBuscar" >
						<span>
							<p>Pais:</p>
							<input class="campo" type="text" name="filPais" placeholder="Pais de origen" >
						</span>
						<span>
							<p>Año:</p>
							<input class="campo" type="number" name="filAnyo" placeholder="Año" min=0 max=2018 >
						</span>
					</div>
					<div class="viniBuscar" >
						<span>
							<p>Año:</p>
							<input class="campo" type="number" name="viniAnyo" placeholder="Año" min=0 max=2018 >
						</span>
						<span>
							<p>Compositor:</p>
							<input class="campo" type="text" name="viniComp" placeholder="Autor/Compositor del producto" >
						</span>
						<span>
							<p>Grupo o Cantante:</p>
							<input class="campo" type="text" name="viniGrupo" placeholder="Grupo/Cantante del producto" >
						</span>
						<span>
							<p>Género:</p>
							<input class="campo" type="text" name="viniGenero" placeholder="Género musical del producto" >
						</span>
					</div>
					<div class="cromosBuscar" >
						<span>
							<p>Año:</p>
							<input class="campo" type="number" name="cromosAnyo" placeholder="Año" min=0 max=2018 >
						</span>
						<span>
							<p>Colección:</p>
							<input class="campo" type="text" name="cromosColec" placeholder="Colección a la que pertenece el producto" >
						</span>
						<span>
							<p>Número o identificador:</p>
							<input class="campo" type="text" name="cromosNum" placeholder="Número o identificador del producto" >
						</span>
					</div>
					<div class="librosBuscar" >
						<span>
							<p>Año:</p>
							<input class="campo" type="number" name="librosAnyo" placeholder="Año" min=0 max=2018 >
						</span>
						<span>
							<p>Autor:</p>
							<input class="campo" type="text" name="librosAutor" placeholder="Autor del producto" >
						</span>
						<span>
							<p>Editorial:</p>
							<input class="campo" type="text" name="librosEditorial" placeholder="Editorial del producto" >
						</span>
						<span>
							<p>Género:</p>
							<input class="campo" type="text" name="librosGenero" placeholder="Género literario del producto" >
						</span>
						<span>
							<p>Idioma:</p>
							<input class="campo" type="text" name="librosIdioma" placeholder="Idioma del producto" >
						</span>
					</div>
					<div class="trasteroBuscar" >
						<span>
							<p>Año:</p>
							<input class="campo" type="number" name="trasteroAnyo" placeholder="Año" min=0 max=2018 >
						</span>
						<span>
							<p>Origen:</p>
							<input class="campo" type="text" name="trasteroOrigen" placeholder="Origen del producto" >
						</span>
					</div>
					<button type="submit">Buscar</button>
				</form>
			</div>
			<div class="productos">

			</div>
		</div>
	</div>
	<?php require_once("include/comun/footer.php") ?>
</body>
<script type="text/javascript" src="javascript.js"></script>
<script type="text/javascript" src="buscScript.js"></script>
</html>
