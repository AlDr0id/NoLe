<?php
	require_once("include/productoSolicitadoSA.php");
	$sa = new productoSolicitadoSA();
	$prod = $sa->getProductoSolicitadoUsuario($_SESSION["nombre"]);
?>
	<h1>Tus productos solicitados</h1>

	<?php
	if($prod != NULL){
		for ($i=0; $i < sizeof($prod); $i++) {
		?>
		<div class="card">
			<div class="details">
				<?php
						
					$perfil = 'perfilVisitante.php?nickname='.$prod[$i]->getId_user().'';
					echo"<h1>".$prod[$i]->getNombreP()."</h1>"; ?>
					<div class="author">
						<?php echo '<a class ="seemore" href='. $perfil . '></i><img src=\"img/"tito.png\"/>
			              <h2>'. $prod[$i]->getId_user() .'</h2></a>' ?>
					</div>
					<div class="category">
						<h2><?php echo $prod[$i]->getCategoria() ?></h2>
					</div>
					<?php
					if( $prod[$i]->getId_Producto()!= NULL){

					?>
							<div class="producto">
								<?php echo '<a class ="catLink" href=product.php?id='. $prod[$i]->getId_Producto() . '>
					              <h2>'."Ir al producto".'</h2></a>' ?>
							
							</div>

							<div class="imagen">
							<?php echo '<div class="thumbnail"><img class="left-prod" height="200" width="200" src="img/'.$prod[$i]->getId_Producto().'.png"/></div>'; ?>
							</div>
					<?php
						}
					?>

					
					<div class="separator"></div>
					<p>Palabras clave: <?php echo $prod[$i]->getPalabrasClave() ?></p>
					<div class="eliminar">
						<?php echo '<a class ="catLink" href=procesarEliminarSolicitado.php?id='. $prod[$i]->getId() .'&idP='. $prod[$i]->getId_Producto() .'> 
			              <h2>'."Eliminar".'</h2></a>' ?>
					</div>
				

			</div>
		</div>
	<?php
		}
	}
	else echo "No hay productos solicitados";
	    ?>