<h1>Solicitar un producto</h1>
<form action= "procesarSolicitarProducto.php" method = "POST" enctype="multipart/form-data">
	<div class="newProd">
		<div class="info">
			<h5>Nombre del producto:</h5>
			<input type="text" name="nomP" placeholder="Nombre del producto" required >
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
			<h5>Palabras clave:</h5>
			<input type="text" name="palabrasP" placeholder="Palabras clave" required >
			<button class="crear">Solicitar</button>
		</div>

	</div>
</form>