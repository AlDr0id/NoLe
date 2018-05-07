<?php
	session_start();

	require_once('include/ActividadProductosSA.php');
	$tmp = new ActividadProductosSA();
	$ultimosProds = $tmp->getLista($_SESSION['nombre']);
?>
	<h1>Actividad reciente</h1>

	<?php

	for ($i=0; $i < sizeof($ultimosProds); $i++) {
	?>
	<div class="actividadrec">
		<?php
		$path = 'product("'.$ultimosProds[$i]->getId().'")'; ?>
		<h4>Nombre: <?php echo $ultimosProds[$i]->getNombre() ?></h4> 
		<p>Disponible: <?php 
		if  ($ultimosProds[$i]->getDisponible() == 1){
			echo "Si";
		}		
		else{
			echo "No";
		}					
		?></p>
		<p>Fecha: <?php echo $ultimosProds[$i]->getFechaSalida() ?></p>	
	</div>
	<?php
	}
	?>
