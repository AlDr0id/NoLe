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
			    	<img src="pica.jpg"/>
			      	<h2><?php echo $prod[$i]->getOwner() ?></h2>
			    </div>
			    <div class="category">
			      	<h2><?php echo $prod[$i]->getCategoria() ?></h2>
			    </div>
			    <div class="separator"></div>
			    <p><?php echo $prod[$i]->getDescripcionCorta() ?></p>
			    <?php echo '<a class="seemore" href='.$path.'><i class="right"></i><p>Ir al producto</p></a>'?>

		  </div>
		</div>
	<?php
	}
	    ?>