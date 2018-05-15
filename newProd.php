<?php

require_once('include/productoOfreSA.php');
require_once('include/numismaticaSA.php');
if (! isset($_GET['id']) ) {
?>
<h2>Nuevo producto</h2>
<form action= "procesarNuevoProducto.php" method = "POST" enctype="multipart/form-data">
	<div class="newProd">
		<div class="imagen">
			<h5>Imagen: </h5>
			<center><input type="file" name="fotoProd" /></center>
			<br />
			<center><output id="list"></output></center>
		</div>

		<div class="info">
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
				<!--<option value="1">El Rincón de la Abuela</option>
				<option value="2">Figuras</option>
				<option value="3">Filatelia</option>
				<option value="4">Vinilos/Discos</option>
				<option value="5">Cromos</option>
				<option value="6">Libros/Comics</option>
				<option value="7">Trastero</option>-->
			</select>
			<div class="numis">
				<h5>Pais:</h5>
				<input type="text" name="paisP" placeholder="Pais de origen" required>
				<h5>Conservación: </h5>
				<input type="text" name="consP" placeholder="Estado de conservación" required>
				<h5>Año:</h5>
				<input type="number" name="anioP" placeholder="Año" min=0 max=2018 required>
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
		$paisP= $numis->getPais();
		$consP= $numis->getConservacion();
		$anioP= $numis->getAño();
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
				<!--<option value="1">El Rincón de la Abuela</option>
				<option value="2">Figuras</option>
				<option value="3">Filatelia</option>
				<option value="4">Vinilos/Discos</option>
				<option value="5">Cromos</option>
				<option value="6">Libros/Comics</option>
				<option value="7">Trastero</option>-->
			</select>
			<div class="numis">
				<h5>Pais:</h5>
				<input type="text" name="paisP" placeholder="Pais de origen" value="<?=$paisP ?>" required>
				<h5>Conservación: </h5>
				<input type="text" name="consP" placeholder="Estado de conservación" value="<?=$consP ?>" required>
				<h5>Año:</h5>
				<input type="number" name="anioP" placeholder="Año" min=0 max=2018 value="<?=$anioP ?>" required>
			</div>
			<button class="crear">Guardar cambios</button>
		</div>

	</div>
</form>
<?php
}
?>
