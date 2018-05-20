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
						<?php echo '<a class ="seemore" href='. $perfil . '></i><img src="pica.jpg"/>
			              <h2>'. $prod[$i]->getId_user() .'</h2></a>' ?>
					</div>
					<div class="category">
						<h2><?php echo $prod[$i]->getCategoria() ?></h2>
					</div>
					<div class="separator"></div>
					<p>Palabras clave: <?php echo $prod[$i]->getPalabrasClave() ?></p>
				?>

			</div>
		</div>
	<?php
		}
	}
	else echo "No hay productos solicitados";
	    ?>