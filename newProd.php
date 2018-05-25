<?php

require_once('include/productoOfreSA.php');
require_once('include/cromosSA.php');
require_once('include/filateliaSA.php');
require_once('include/librosComicsSA.php');
require_once('include/trasteroSA.php');
require_once('include/rinconAbSA.php');
require_once('include/vinilosDiscosSA.php');
require_once('include/figurasSA.php');
require_once('include/numismaticaSA.php');

if (! isset($_GET['id']) ) {
?>
<h2>Nuevo producto</h2>
<form action= "procesarNuevoProducto.php" method = "POST" enctype="multipart/form-data">
	<div class="newProd">
		<div class="info">
			<div class="imagen">
				<h5>Imagen: </h5>
				<input type="file" name="fotoProd" required />
				<!-- <br />
				<output id="list"></output> -->
			</div>
			<h5>Nombre del producto:</h5>
			<input type="text" name="nomP" placeholder="Nombre del producto" required >
			<h5>Descripción del producto:</h5>
			<textarea name="descP" placeholder="Descripción del producto"></textarea>
			<h5>Precio:</h5>
			<input type="number" name="precio" placeholder="Precio del producto" min=0 required >
			<h5>Categoria:</h5>
			<select class="cateP" name ="cateP" required >
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
			<div class="numis" >
				<h5>Pais:</h5>
				<input type="text" name="paisP" placeholder="Pais de origen" >
				<h5>Conservación: </h5>
				<input type="text" name="consP" placeholder="Estado de conservación" >
				<h5>Año:</h5>
				<input type="number" name="anioP" placeholder="Año" min=0 max=2018 >
			</div>
			<div class="rdla" >
				<h5>Tipo:</h5>
				<select name="rclaTipo">
					<option value="0">Dedal</option>
					<option value="1">Vajilla</option>
					<option value="2">Imán</option>
				</select>
				<h5>Origen:</h5>
				<input type="text" name="rclaOrigen" placeholder="Origen del producto" >
			</div>
			<div class="fig" >
				<h5>Alto (cm)</h5>
				<input type="number" name="figAlto" min="0" ="">
				<h5>Ancho (cm)</h5>
				<input type="number" name="figAncho" min="0" ="">
				<h5>Largo (cm)</h5>
				<input type="number" name="figLargo" min="0" ="">
				<h5>Tema:</h5>
				<input type="text" name="figTema" placeholder="Tema del producto" >
				<h5>Material:</h5>
				<input type="text" name="figMaterial" placeholder="Material del que está hecho el producto" >
				<h5>Fabricante:</h5>
				<input type="text" name="figFabricante" placeholder="Fabricante del producto" >
			</div>
			<div class="fil" >
				<h5>Pais:</h5>
				<input type="text" name="filPais" placeholder="Pais de origen" >
				<h5>Año:</h5>
				<input type="number" name="filAnyo" placeholder="Año" min=0 max=2018 >
			</div>
			<div class="vini" >
				<h5>Año:</h5>
				<input type="number" name="viniAnyo" placeholder="Año" min=0 max=2018 >
				<h5>Compositor:</h5>
				<input type="text" name="viniComp" placeholder="Autor/Compositor del producto" >
				<h5>Grupo o Cantante:</h5>
				<input type="text" name="viniGrupo" placeholder="Grupo/Cantante del producto" >
				<h5>Género:</h5>
				<input type="text" name="viniGenero" placeholder="Género musical del producto" >
			</div>
			<div class="cromos" >
				<h5>Año:</h5>
				<input type="number" name="cromosAnyo" placeholder="Año" min=0 max=2018 >
				<h5>Colección:</h5>
				<input type="text" name="cromosColec" placeholder="Colección a la que pertenece el producto" >
				<h5>Número o identificador:</h5>
				<input type="text" name="cromosNum" placeholder="Número o identificador del producto" >
			</div>
			<div class="libros" >
				<h5>Año:</h5>
				<input type="number" name="librosAnyo" placeholder="Año" min=0 max=2018 >
				<h5>Autor:</h5>
				<input type="text" name="librosAutor" placeholder="Autor del producto" >
				<h5>Editorial:</h5>
				<input type="text" name="librosEditorial" placeholder="Editorial del producto" >
				<h5>Género:</h5>
				<input type="text" name="librosGenero" placeholder="Género literario del producto" >
				<h5>Idioma:</h5>
				<input type="text" name="librosIdioma" placeholder="Idioma del producto" >
				<h5>Formato:</h5>
				<input type="text" name="librosFormato" placeholder="Formato del producto" >
			</div>
			<div class="trastero" >
				<h5>Año:</h5>
				<input type="number" name="trasteroAnyo" placeholder="Año" min=0 max=2018 >
				<h5>Origen:</h5>
				<input type="text" name="trasteroOrigen" placeholder="Origen del producto" >
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
	$enPuja = $producto->getEnPuja();
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
	else{
		header("Refresh: 0 ;URL= perfil.php?opt=anadProd");

	}
?>
<h2>Editar producto</h2>
<form action= "procesarEditarProducto.php" method = "POST" enctype="multipart/form-data">
	<div class="newProd">
		<div class="info">
			<input type="hidden" name="idP" value="<?=$id ?>">
			<h5>Nombre del producto:</h5>
			<input type="text" name="nomP" placeholder="Nombre del producto" value="<?=$nomP ?>" >
			<div class="imagen">
				<h5>Imagen del producto:</h5>
				<input type="file" name="fotoProd" value="/img/prods/<?=$id ?>.png" />
			</div>
			<h5>Descripción del producto:</h5>
			<textarea name="descP" placeholder="Descripción del producto" ><?=$descP ?></textarea>
			<?php if(!$enPuja){ ?>
			<h5>Precio:</h5>
			<input type="number" name="precio" placeholder="Precio del producto" min=0 value="<?=$precio ?>" required >
			<?php } ?>
			<h5>Categoria:</h5>
			<select class="cateP" name ="cateP" required>
				<?php
					switch ($cateP) {
						case '0':
							echo '<option value="0" selected>Numismática</option>';
							break;
						case '1':
							echo '<option value="1" selected>El Rincón de la Abuela</option>';
							break;
						case '2':
							echo '<option value="2" selected>Figuras</option>';
							break;
						case '3':
							echo '<option value="3" selected>Filatelia</option>';
							break;
						case '4':
							echo '<option value="4" selected>Vinilos/Discos</option>';
							break;
						case '5':
							echo '<option value="5" selected>Cromos</option>';
							break;
						case '6':
							echo '<option value="6" selected>Libros/Comics</option>';
							break;
						case '7':
							echo '<option value="7" selected>Trastero</option>';
							break;
						default:
							# code...
							break;
					}
				 ?>

			</select>
			<script type="text/javascript">alert('joder');</script>
			<?php
				switch ($cateP) {
						case '0':
							?>
								<div>
									<h5>Pais:</h5>
									<input type="text" name="paisP" placeholder="Pais de origen" value="<?=$paisP ?>" >
									<h5>Conservación: </h5>
									<input type="text" name="consP" placeholder="Estado de conservación" value="<?=$consP ?>" >
									<h5>Año:</h5>
									<input type="number" name="anioP" placeholder="Año" min=0 max=2018 value="<?=$anioP ?>" >
								</div>
							<?php
							break;
						case '1':
							?>
								<div>
									<h5>Tipo:</h5>
									<select name="rclaTipo">
										<option value="0">Dedal</option>
										<option value="1">Vajilla</option>
										<option value="2">Imán</option>
									</select>
									<h5>Origen:</h5>
									<input type="text" name="rclaOrigen" placeholder="Origen del producto" value="<?=$origP ?>" >
								</div>
							<?php
							break;
						case '2':
							?>
								<div>
									<h5>Alto</h5>
									<input type="number" name="figAlto" min="0" value="<?=$altoP ?>" ="">
									<h5>Ancho</h5>
									<input type="number" name="figAncho" min="0" value="<?=$anchoP ?>" ="">
									<h5>Largo</h5>
									<input type="number" name="figLargo" min="0" value="<?=$largoP ?>" ="">
									<h5>Tema:</h5>
									<input type="text" name="figTema" placeholder="Tema del producto" value="<?=$temaP ?>" >
									<h5>Material:</h5>
									<input type="text" name="figMaterial" placeholder="Material del que está hecho el producto" value="<?=$matP ?>" >
									<h5>Fabricante:</h5>
									<input type="text" name="figFabricante" placeholder="Fabricante del producto" value="<?=$fabrP ?>" >
								</div>
							<?php
							break;
						case '3':
							?>
								<div>
									<h5>Pais:</h5>
									<input type="text" name="filPais" placeholder="Pais de origen" value="<?=$paisP ?>" >
									<h5>Año:</h5>
									<input type="number" name="filAnyo" placeholder="Año" min=0 max=2018 value="<?=$anioP ?>" >
								</div>
							<?php
							break;
						case '4':
							?>
								<div>
									<h5>Año:</h5>
									<input type="number" name="viniAnyo" placeholder="Año" min=0 max=2018 value="<?=$anioP ?>" >
									<h5>Compositor:</h5>
									<input type="text" name="viniComp" placeholder="Autor/Compositor del producto" value="<?=$autCompP ?>" >
									<h5>Grupo o Cantante:</h5>
									<input type="text" name="viniGrupo" placeholder="Grupo/Cantante del producto" value="<?=$grupCantP ?>" >
									<h5>Género:</h5>
									<input type="text" name="viniGenero" placeholder="Género musical del producto" value="<?=$genP ?>" >
								</div>
							<?php
							break;
						case '5':
							?>
								<div>
									<h5>Año:</h5>
									<input type="number" name="cromosAnyo" placeholder="Año" min=0 max=2018 value="<?=$anioP ?>" >
									<h5>Colección:</h5>
									<input type="text" name="cromosColec" placeholder="Colección a la que pertenece el producto" value="<?=$coleccP ?>" >
									<h5>Número o identificador:</h5>
									<input type="text" name="cromosNum" placeholder="Número o identificador del producto" value="<?=$cromoP ?>" >
								</div>
							<?php
							break;
						case '6':
							?>
								<div>
									<h5>Año:</h5>
									<input type="number" name="librosAnyo" placeholder="Año" min=0 max=2018 value="<?=$anioP ?>" >
									<h5>Autor:</h5>
									<input type="text" name="librosAutor" placeholder="Autor del producto" value="<?=$autorP ?>" >
									<h5>Editorial:</h5>
									<input type="text" name="librosEditorial" placeholder="Editorial del producto" value="<?=$editP ?>" >
									<h5>Género:</h5>
									<input type="text" name="librosGenero" placeholder="Género literario del producto" value="<?=$genP ?>" >
									<h5>Idioma:</h5>
									<input type="text" name="librosIdioma" placeholder="Idioma del producto" value="<?=$idiomaP ?>" >
									<h5>Formato:</h5>
									<input type="text" name="librosFormato" placeholder="Formato del producto" value="<?=$formP ?>" >
								</div>
							<?php
							break;
						case '7':
							?>
								<div>
									<h5>Año:</h5>
									<input type="number" name="trasteroAnyo" placeholder="Año" min=0 max=2018 value="<?=$anioP ?>" >
									<h5>Origen:</h5>
									<input type="text" name="trasteroOrigen" placeholder="Origen del producto" value="<?=$origP ?>" >
								</div>
							<?php
							break;
						default:
							# code...
							break;
					}
			?>
			<button class="crear">Guardar cambios</button>
		</div>

	</div>
</form>
<?php
}
?>
