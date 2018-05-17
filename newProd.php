<?php

require_once('include/productoOfreSA.php');
require_once('include/numismaticaSA.php');
if (! isset($_GET['id']) ) {
?>
<h2>Nuevo producto</h2>
<form action= "procesarNuevoProducto.php" method = "POST" enctype="multipart/form-data">
	<div class="newProd">


		<div class="info">
			<div class="imagen">
				<h5>Imagen: </h5>
				<input type="file" name="fotoProd" required/>
				<br />
				<output id="list"></output>
			</div>
			<h5>Nombre del producto:</h5>
			<input type="text" name="nomP" placeholder="Nombre del producto" required>
			<h5>Descripción del producto:</h5>
			<textarea name="descP" placeholder="Descripción del producto"></textarea>
			<h5>Precio:</h5>
			<input type="number" name="precio" placeholder="Precio del producto" min=0 required>
			<h5>Categoria:</h5>
			<select class="cateP" name ="cateP" required>
				<option value="-1">---</option>
				<option value="0">Numismática</option>
				<option value="1">El Rincón de la Abuela</option>
				<option value="2">Figuras</option>
				<option value="3">Filatelia</option>
				<option value="4">Vinilos/Discos</option>
				<option value="5">Cromos</option>
				<option value="6">Libros/Comics</option>
				<option value="7">Trastero</option>
			</select>
			<div class="numis" hidden>
				<h5>Pais:</h5>
				<input type="text" name="paisP" placeholder="Pais de origen" required>
				<h5>Conservación: </h5>
				<input type="text" name="consP" placeholder="Estado de conservación" required>
				<h5>Año:</h5>
				<input type="number" name="anioP" placeholder="Año" min=0 max=2018 required>
			</div>
			<div class="rdla" hidden>
				<h5>Tipo:</h5>
				<select name="rclaTipo">
					<option value="0">Dedal</option>
					<option value="1">Vajilla</option>
					<option value="2">Imán</option>
					<option value="3">Otro</option>
				</select>
				<h5>Origen:</h5>
				<input type="text" name="rclaOrigen" placeholder="Origen del producto" required>
			</div>
			<div class="fig" hidden>
				<h5>Alto</h5>
				<input type="number" name="figAlto" min="0" required="">
				<h5>Ancho</h5>
				<input type="number" name="figAncho" min="0" required="">
				<h5>Largo</h5>
				<input type="number" name="figLargo" min="0" required="">
				<h5>Tema:</h5>
				<input type="text" name="figTema" placeholder="Tema del producto" required>
				<h5>Material:</h5>
				<input type="text" name="figMaterial" placeholder="Material del que está hecho el producto" required>
				<h5>Fabricante:</h5>
				<input type="text" name="figFabricante" placeholder="Fabricante del producto" required>
			</div>
			<div class="fil" hidden>
				<h5>Pais:</h5>
				<input type="text" name="filPais" placeholder="Pais de origen" required>
				<h5>Año:</h5>
				<input type="number" name="filAnyo" placeholder="Año" min=0 max=2018 required>
			</div>
			<div class="vini" hidden>
				<h5>Año:</h5>
				<input type="number" name="viniAnyo" placeholder="Año" min=0 max=2018 required>
				<h5>Compositor:</h5>
				<input type="text" name="viniComp" placeholder="Autor/Compositor del producto" required>
				<h5>Grupo o Cantante:</h5>
				<input type="text" name="viniGrupo" placeholder="Grupo/Cantante del producto" required>
				<h5>Género:</h5>
				<input type="text" name="viniGenero" placeholder="Género musical del producto" required>
			</div>
			<div class="cromos" hidden>
				<h5>Año:</h5>
				<input type="number" name="cromosAnyo" placeholder="Año" min=0 max=2018 required>
				<h5>Colección:</h5>
				<input type="text" name="cromosColec" placeholder="Colección a la que pertenece el producto" required>
				<h5>Número o identificador:</h5>
				<input type="text" name="cromosNum" placeholder="Número o identificador del producto" required>
			</div>
			<div class="libros" hidden>
				<h5>Año:</h5>
				<input type="number" name="librosAnyo" placeholder="Año" min=0 max=2018 required>
				<h5>Autor:</h5>
				<input type="text" name="librosAutor" placeholder="Autor del producto" required>
				<h5>Editorial:</h5>
				<input type="text" name="librosEditorial" placeholder="Editorial del producto" required>
				<h5>Género:</h5>
				<input type="text" name="librosGenero" placeholder="Género literario del producto" required>
				<h5>Idioma:</h5>
				<input type="text" name="librosIdioma" placeholder="Idioma del producto" required>
				<h5>Formato:</h5>
				<input type="text" name="librosFormato" placeholder="Formato del producto" required>
			</div>
			<div class="trastero" hidden>
				<h5>Año:</h5>
				<input type="number" name="trasteroAnyo" placeholder="Año" min=0 max=2018 required>
				<h5>Origen:</h5>
				<input type="text" name="trasteroOrigen" placeholder="Origen del producto" required>
			</div>
			<button class="crear">Crear Producto</button>
		</div>

	</div>
</form>
<?php
}
else{
	$id = $_GET['id'];
	$sa = new productoOfreSA();
	$producto = $sa->getProducto($id);
	$nomP = $producto->getNombre();
	$descP = $producto->getDescripcion();
	$precio = $producto->getPrecio();
	$cateP = $producto->getCategoria();
	if ($cateP == 0){
		$saNumi = new numismaticaSA();
		$numis = $saNumi->getProductoNumi($id);
		$paisP = $numis->getPais();
		$consP = $numis->getConservacion();
		$anioP = $numis->getAño();
	}
	else if ($cateP == 1){
		$saRincon = new rinconAbSA();
		$rincon = $saRincon->getProductoRinconAb($id);
		$tipoP = $rincon->getTipo();
		$origP = $rincon->getOrigen();
	}
	else if ($cateP == 2){
		$saFiguras = new figurasSA();
		$figuras = $saFiguras->getProductoFiguras($id);
		$altoP = $figuras->getAlto();
		$anchoP = $figuras->getAncho();
		$largoP = $figuras->getLargo();
		$temaP = $figuras->getTema();
		$matP = $figuras->getMaterial();
		$fabrP = $figuras->getFabricante();
	}
	else if ($cateP == 3){
		$saFila = new filateliaSA();
		$fila = $saFila->getProductoFilatelia($id);
		$paisP = $fila->getPais();
		$anioP = $fila->getAnyo();
	}
	else if ($cateP == 4){
		$saVinDisc = new vinilosDiscosSA();
		$vinDisc = $saVinDisc->getProductoVinilosDiscos($id);
		$autCompP = $vinDisc->getAutorCompositor();
		$grupCantP = $vinDisc->getGrupoCantante();
		$anioP = $vinDisc->getAnyo();
		$genP = $vinDisc->getGenero();
	}
	else if ($cateP == 5){
		$saCromos = new cromosSA();
		$cromos = $saCromos->getProductoCromos($id);
		$coleccP = $cromos->getColeccion();
		$cromoP = $cromos->getNCromo();
		$anioP = $cromos->getAnyo();
	}
	else if ($cateP == 6){
		$saLibroComic = new librosComicsSA();
		$libroComic = $saLibroComic->getProductoLibrosComics($id);
		$autorP = $libroComic->getAutor();
		$editP = $libroComic->getEditorial();
		$anioP = $libroComic->getAnyo();
		$genP = $libroComic->getGenero();
		$idiomaP = $libroComic->getIdioma();
		$formP = $libroComic->getFormato();
	}
	else if ($cateP == 7){
		$saTrast = new trasteroSA();
		$trast = $saTrast->getProductoTrastero($id);
		$origP = $trast->getOrigen();
		$anioP = $trast->getAnyo();
	}
?>
<h2>Editar producto</h2>
<form action= "procesarEditarProducto.php" method = "POST">
	<div class="newProd">
		<div class="imagen">
			<input type="file" name="fotoProd" />
			<br />
			<output id="list"></output>
		</div>

		<div class="info">
			<input type="hidden"  name="idP" value="<?=$id ?>">
			<h5>Nombre del producto:</h5>
			<input type="text" name="nomP" placeholder="Nombre del producto" value="<?=$nomP ?>" required>
			<h5>Descripción del producto:</h5>
			<textarea name="descP" placeholder="Descripción del producto" required><?=$descP ?></textarea>
			<h5>Precio:</h5>
			<input type="number" name="precio" placeholder="Precio del producto" min=0 value="<?=$precio ?>" required>
			<h5>Categoria:</h5>
			<select class="cateP" name ="cateP" value="Elige Categoria">
				<option value="-1">---</option>
				<option value="0">Numismática</option>
				<option value="1">El Rincón de la Abuela</option>
				<option value="2">Figuras</option>
				<option value="3">Filatelia</option>
				<option value="4">Vinilos/Discos</option>
				<option value="5">Cromos</option>
				<option value="6">Libros/Comics</option>
				<option value="7">Trastero</option>
			</select>
			<div class="numis" hidden>
				<h5>Pais:</h5>
				<input type="text" name="paisP" placeholder="Pais de origen" value="<?=$paisP ?>" required>
				<h5>Conservación: </h5>
				<input type="text" name="consP" placeholder="Estado de conservación" value="<?=$consP ?>" required>
				<h5>Año:</h5>
				<input type="number" name="anioP" placeholder="Año" min=0 max=2018 value="<?=$anioP ?>" required>
			</div>
			<div class="rdla" hidden>
				<h5>Tipo:</h5>
				<select name="rclaTipo">
					<option value="0">Dedal</option>
					<option value="1">Vajilla</option>
					<option value="2">Imán</option>
					<option value="3">Otro</option>
				</select>
				<h5>Origen:</h5>
				<input type="text" name="rclaOrigen" placeholder="Origen del producto" value="<?=$origP ?>" required>
			</div>
			<div class="fig" hidden>
				<h5>Alto</h5>
				<input type="number" name="figAlto" min="0" value="<?=$altoP ?>" required="">
				<h5>Ancho</h5>
				<input type="number" name="figAncho" min="0" value="<?=$anchoP ?>" required="">
				<h5>Largo</h5>
				<input type="number" name="figLargo" min="0" value="<?=$largoP ?>" required="">
				<h5>Tema:</h5>
				<input type="text" name="figTema" placeholder="Tema del producto" value="<?=$temaP ?>" required>
				<h5>Material:</h5>
				<input type="text" name="figMaterial" placeholder="Material del que está hecho el producto" value="<?=$matP ?>" required>
				<h5>Fabricante:</h5>
				<input type="text" name="figFabricante" placeholder="Fabricante del producto" value="<?=$fabrP ?>" required>
			</div>
			<div class="fil" hidden>
				<h5>Pais:</h5>
				<input type="text" name="filPais" placeholder="Pais de origen" value="<?=$paisP ?>" required>
				<h5>Año:</h5>
				<input type="number" name="filAnyo" placeholder="Año" min=0 max=2018 value="<?=$anioP ?>" required>
			</div>
			<div class="vini" hidden>
				<h5>Año:</h5>
				<input type="number" name="viniAnyo" placeholder="Año" min=0 max=2018 value="<?=$anioP ?>" required>
				<h5>Compositor:</h5>
				<input type="text" name="viniComp" placeholder="Autor/Compositor del producto" value="<?=$autCompP ?>" required>
				<h5>Grupo o Cantante:</h5>
				<input type="text" name="viniGrupo" placeholder="Grupo/Cantante del producto" value="<?=$grupCantP ?>" required>
				<h5>Género:</h5>
				<input type="text" name="viniGenero" placeholder="Género musical del producto" value="<?=$genP ?>" required>
			</div>
			<div class="cromos" hidden>
				<h5>Año:</h5>
				<input type="number" name="cromosAnyo" placeholder="Año" min=0 max=2018 value="<?=$anioP ?>" required>
				<h5>Colección:</h5>
				<input type="text" name="cromosColec" placeholder="Colección a la que pertenece el producto" value="<?=$coleccP ?>" required>
				<h5>Número o identificador:</h5>
				<input type="text" name="cromosNum" placeholder="Número o identificador del producto" value="<?=$cromoP ?>" required>
			</div>
			<div class="libros" hidden>
				<h5>Año:</h5>
				<input type="number" name="librosAnyo" placeholder="Año" min=0 max=2018 value="<?=$anioP ?>" required>
				<h5>Autor:</h5>
				<input type="text" name="librosAutor" placeholder="Autor del producto" value="<?=$autorP ?>" required>
				<h5>Editorial:</h5>
				<input type="text" name="librosEditorial" placeholder="Editorial del producto" value="<?=$editP ?>" required>
				<h5>Género:</h5>
				<input type="text" name="librosGenero" placeholder="Género literario del producto" value="<?=$genP ?>" required>
				<h5>Idioma:</h5>
				<input type="text" name="librosIdioma" placeholder="Idioma del producto" value="<?=$idiomaP ?>" required>
				<h5>Formato:</h5>
				<input type="text" name="librosFormato" placeholder="Formato del producto" value="<?=$formP ?>" required>
			</div>
			<div class="trastero" hidden>
				<h5>Año:</h5>
				<input type="number" name="trasteroAnyo" placeholder="Año" min=0 max=2018 value="<?=$anioP ?>" required>
				<h5>Origen:</h5>
				<input type="text" name="trasteroOrigen" placeholder="Origen del producto" value="<?=$origP ?>" required>
			</div>
			<button class="crear">Guardar cambios</button>
		</div>

	</div>
</form>
<?php
}
?>
