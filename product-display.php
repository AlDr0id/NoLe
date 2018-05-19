<?php
	require_once("include/BusquedaSA.php");
	$sa = new BusquedaSA();

	$data = array();
	if ($_GET['nombre'] != '') {
	$data['nombre'] = $_GET['nombre'];
	}
	if ($_GET['preciomin'] >=0) {
		$data['preciomin'] = $_GET['preciomin'];
	}
	if ($_GET['preciomax'] >=0) {
		$data['preciomax'] = $_GET['preciomax'];
	}
	if ($_GET['Categoria'] >= 0) {
		$data['Categoria'] = $_GET['Categoria'];

		if ($_GET['numiFecha'] !='') {
			$data['numiFecha'] = $_GET['numiFecha'];
		}
		if ($_GET['numipais'] !='') {
			$data['numipais'] = $_GET['numipais'];
		}
		if ($_GET['numiconservacion'] != '') {
			$data['numiconservacion'] = $_GET['numiconservacion'];
		}
		if ($_GET['rdlaTipo'] >= 0) {
			$data['rdlaTipo'] = $_GET['rdlaTipo'];
		}
		if ($_GET['rdlaOrigen'] !='') {
			$data['rdlaOrigen'] = $_GET['rdlaOrigen'];
		}
		if ($_GET['figTema'] != '') {
			$data['figTema'] = $_GET['figTema'];
		}
		if ($_GET['figMaterial'] !='') {
			$data['figMaterial'] = $_GET['figMaterial'];
		}
		if ($_GET['figFabricante'] !='') {
			$data['figFabricante'] = $_GET['figFabricante'];
		}
		if ($_GET['filPais'] != '') {
			$data['filpais'] = $_GET['filPais'];
		}
		if ($_GET['filFecha'] !='') {
			$data['filFecha'] = $_GET['filFecha'];
		}
		if ($_GET['viniFecha'] !='') {
			$data['viniFecha'] = $_GET['viniFecha'];
		}
		if ($_GET['viniAutor'] != '') {
			$data['viniAutor'] = $_GET['viniAutor'];
		}
		if ($_GET['viniGrupo'] !='') {
			$data['viniGrupo'] = $_GET['viniGrupo'];
		}
		if ($_GET['viniGenero'] !='') {
			$data['viniGenero'] = $_GET['viniGenero'];
		}
		if ($_GET['cromosFecha'] != '') {
			$data['cromosFecha'] = $_GET['cromosFecha'];
		}
		if ($_GET['cromosColeccion'] !='') {
			$data['cromosColeccion'] = $_GET['cromosColeccion'];
		}
		if ($_GET['cromosNcomro'] !='') {
			$data['cromosNcomro'] = $_GET['cromosNcomro'];
		}
		if ($_GET['librosFecha'] != '') {
			$data['librosFecha'] = $_GET['librosFecha'];
		}
		if ($_GET['librosAutor'] !='') {
			$data['librosAutor'] = $_GET['librosAutor'];
		}
		if ($_GET['librosEditorial'] !='') {
			$data['librosEditorial'] = $_GET['librosEditorial'];
		}
		if ($_GET['librosGenero'] != '') {
			$data['librosGenero'] = $_GET['librosGenero'];
		}
		if ($_GET['librosIdioma'] !='') {
			$data['librosIdioma'] = $_GET['librosIdioma'];
		}
		if ($_GET['trasteroFecha'] !='') {
			$data['trasteroFecha'] = $_GET['trasteroFecha'];
		}
		if ($_GET['trasteroOrigen'] != '') {
			$data['trasteroOrigen'] = $_GET['trasteroOrigen'];
		}
	}
	$prod = $sa->getProductoAvan($data);
?>

	<h2>Resultado de la búsqueda</h2>

	<?php
    for ($i=0; $i < sizeof($prod); $i++) {
    ?>
	  <div class="card">
		  <?php echo '<div class="thumbnail"><img class="leftImg" src="img/'.$prod[$i]->getId().'.png"/></div>'; ?>
		  <div class="details">
		    <?php
			    $path = 'product.php?id='.$prod[$i]->getId().'';
			    $perfil = 'perfilVisitante.php?nickname='.$prod[$i]->getOwner().'';
			    echo"<h1>".$prod[$i]->getNombre()."</h1>"; ?>
			    <div class="author"><!-- Imagen que habra que cambiar cuando se tengan fotos del usuario -->
			    	<?php echo '<a class ="seemore" href='. $perfil . '></i><img src="pica.jpg"/>
				    <h2>'. $prod[$i]->getOwner() .'</h2></a>' ?>
			    </div>
			    <div class="category">
			      	<?php 
			      		switch ($prod[$i]->getCategoria()) {
			      		 	case '0':
			      		 		echo "<a class='catLink' href='numismatica.php'> Numismática</a>";
			      		 		break;
			      		 	case '1':
			      		 		echo "<a>Rincón de la Abuela</a>";
			      		 		break;
			      		 	case '2':
			      		 		echo "<a>Figuras</a>";
			      		 		break;
			      		 	case '3':
			      		 		echo "<a>Filatelia</a>";
			      		 		break;
			      		 	case '4':
			      		 		echo "<a>Vinilos/Discos</a>";
			      		 		break;
			      		 	case '5':
			      		 		echo "<a>Cromos</a>";
			      		 		break;
			      		 	case '6':
			      		 		echo "<a>Libros/Comics</a>";
			      		 		break;
			      		 	case '7':
			      		 		echo "<a>Trastero</a>";
			      		 		break;
			      		 }?>
			      	
			    </div>
			    <div class="precio">
			      	<h2><?php echo $prod[$i]->getPrecio() ?>$</h2>
			    </div>

			    <div class="separator"></div>
			    <p><?php echo $prod[$i]->getDescripcionCorta() ?></p>
			    <?php echo '<a class="seemore" href='.$path.'><p>Ir al producto</p></a>'?>

		  </div>
		</div>
	<?php
	}
	    ?>