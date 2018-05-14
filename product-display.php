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

		if ($_GET['Fecha'] !='') {
			$data['Fecha'] = $_GET['Fecha'];
		}
		if ($_GET['pais'] !='') {
			$data['pais'] = $_GET['pais'];
		}
		if ($_GET['conservacion'] != '') {
			$data['conservacion'] = $_GET['conservacion'];
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
			    echo"<h1>".$prod[$i]->getNombre()."</h1>"; ?>
			    <div class="author">
			    	<img src="pica.jpg"/> <!-- Imagen que habra que cambiar cuando se tengan fotos del usuario -->
			      	<h2><?php echo $prod[$i]->getOwner() ?></h2>
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