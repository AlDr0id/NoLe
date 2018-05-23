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
					<?php
					if( $prod[$i]->getId_Producto()!= NULL){

					?>
							<div class="imagen">
							<?php echo '<div class="thumbnail"><img class="left-prod" height="200" width="200" src="img/prods/'.$prod[$i]->getId_Producto().'.png"/></div>'; ?>
							</div>

							<div class="producto">
								<?php echo '<a class ="seemore" href=product.php?id='. $prod[$i]->getId_Producto() . '>
					              <p>'."Ir al producto".'</p></a>' ?>

							</div>
					<?php
						}
					?>
					<div class="author">
						<?php echo '<a class ="seemore" href='. $perfil . '><img src="img/'. $prod[$i]->getId_user() .'.png"/>
			              <h2>'. $prod[$i]->getId_user() .'</h2></a>' ?>
					</div>
					<div class="category">
						<?php
						switch ($prod[$i]->getCategoria()) {
							case '0':
								echo "<a class='catLink' href='numismatica.php'>Numismatica</a>";
								break;
							case '1':
								echo "<a class='catLink' href='rinconAbuela.php'>Rincón de la Abuela</a>";
								break;
							case '2':
								echo "<a class='catLink' href='figuras.php'>Figuras</a>";
								break;
							case '3':
								echo "<a class='catLink' href='filatelia.php'>Filatelia</a>";
								break;
							case '4':
								echo "<a class='catLink' href='vinilosDiscos.php'>Vinilos/Discos</a>";
								break;
							case '5':
								echo "<a class='catLink' href='cromos.php'>Cromos</a>";
								break;
							case '6':
								echo "<a class='catLink' href='librosComics.php'>Libros/Comics</a>";
								break;
							case '7':
								echo "<a class='catLink' href='trastero.php'>Trastero</a>";
								break;

							default:
								echo "Pendiente";
								break;
						}
						?>
					</div>

					<div class="separator"></div>
					<p>Palabras clave: <?php echo $prod[$i]->getPalabrasClave() ?></p>
					<div class="eliminar">
						<?php echo '<a class ="seemore" href=procesarEliminarSolicitado.php?id='. $prod[$i]->getId() .'&idP='. $prod[$i]->getId_Producto() .'>
			              <p>'."Eliminar".'</p></a>' ?>
					</div>


			</div>
		</div>
	<?php
		}
	}
	else echo "No hay productos solicitados";
	    ?>
