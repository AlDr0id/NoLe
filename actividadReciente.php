<?php
require_once("include/pujaSA.php");
require_once("include/productoOfreSA.php");
$sa = new pujaSA();
$saProd = new productoOfreSA();
$pujasGanadas = $sa->getPujasPostor($_SESSION["nombre"], "GANADA");
$pujasPerdidas = $sa->getPujasPostor($_SESSION["nombre"], "PERDIDA");
$pujasVendidas = $sa->getPujasVendedorCerradas($_SESSION["nombre"]);

?>
<h1>Tus pujas ganadas</h1>

<?php
  if($pujasGanadas != NULL){
	for ($i=0; $i < sizeof($pujasGanadas); $i++) {
	?>
		<div class="card">
		<div class="thumbnail"><img class="leftImg" src="img/puja.jpg"/></div>
			<div class="details">
				<?php
					$p = $saProd->getProducto($pujasGanadas[$i]->getIdProducto());
					$path = 'product.php?id='.$pujasGanadas[$i]->getIdProducto().'';
					echo"<h1>".$p->getNombre()."</h1>"; ?>
					<div class="author">
						<img src="pica.jpg"/>
						<h2>Dueño actual: <?php echo $p->getOwner();?></h2>
					</div>
					<div class="precio">
						<h2><?php 
						if($pujasGanadas[$i]->getIdTrueque()!=NULL){
							echo "Ofertado producto ".$pujasGanadas[$i]->getIdTrueque();
						}
						else{
							echo $pujasGanadas[$i]->getPrecio()."$";
						}
						?></h2>
					</div>
				<div class="fecha">
						<h2><?php echo $pujasGanadas[$i]->getFecha() ?></h2>
					</div>
				<div class="estado">
						<h2>Estado: <?php echo $pujasGanadas[$i]->getEstado() ?></h2>
					</div>
                    
				<div class="valorar">
						<h2>Formulario Valoración</h2>
				</div>
					<div class="separator"></div>
					<!-- <p><?php //echo $pujasGanadas[$i]->getDescripcion() ?></p> -->
					<?php echo '<a class="seemore" href='.$path.'><i class="right"></i><p>Ir al producto</p></a>'?>

			</div>
			</div>
	<?php
		}
  } else echo "El usuario no tiene pujas ganadas";	
	    ?>

<h1>Tus pujas perdidas</h1>

<?php
  if($pujasPerdidas != NULL){
	for ($i=0; $i < sizeof($pujasPerdidas); $i++) {
	?>
		<div class="card">
		<div class="thumbnail"><img class="leftImg" src="img/puja.jpg"/></div>
			<div class="details">
				<?php
					$p = $saProd->getProducto($pujasPerdidas[$i]->getIdProducto());
					$path = 'product.php?id='.$pujasPerdidas[$i]->getIdProducto().'';
					echo"<h1>".$p->getNombre()."</h1>"; ?>
					<div class="author">
						<img src="pica.jpg"/>
						<h2>Dueño actual: <?php echo $p->getOwner();?></h2>
					</div>
					<div class="precio">
						<h2><?php 
						if($pujasPerdidas[$i]->getIdTrueque()!=NULL){
							echo "Ofertado producto ".$pujasPerdidas[$i]->getIdTrueque();
						}
						else{
							echo $pujasPerdidas[$i]->getPrecio()."$";
						}
						?></h2>
					</div>
				<div class="fecha">
						<h2><?php echo $pujasPerdidas[$i]->getFecha() ?></h2>
					</div>
				<div class="estado">
						<h2>Estado: <?php echo $pujasPerdidas[$i]->getEstado() ?></h2>
					</div>
					<div class="separator"></div>
					<!-- <p><?php //echo $pujasPerdidas[$i]->getDescripcion() ?></p> -->
					<?php echo '<a class="seemore" href='.$path.'><i class="right"></i><p>Ir al producto</p></a>'?>

			</div>
			</div>
	<?php
		}
  } else echo "El usuario no tiene pujas perdidas";	
	    ?>
<h1>Tus ventas</h1>

<?php
  if($pujasVendidas != NULL){
	for ($i=0; $i < sizeof($pujasVendidas); $i++) {
	?>
		<div class="card">
		<div class="thumbnail"><img class="leftImg" src="img/puja.jpg"/></div>
			<div class="details">
				<?php
					$p = $saProd->getProducto($pujasVendidas[$i]->getIdProducto());
					$path = 'product.php?id='.$pujasVendidas[$i]->getIdProducto().'';
					echo"<h1>".$p->getNombre()."</h1>"; ?>
					<div class="author">
						<img src="pica.jpg"/>
						<h2>Dueño actual: <?php echo $p->getOwner();?></h2>
					</div>
					<div class="precio">
						<h2><?php 
						if($pujasVendidas[$i]->getIdTrueque()!=NULL){
							echo "Ofertado producto ".$pujasVendidas[$i]->getIdTrueque();
						}
						else{
							echo $pujasVendidas[$i]->getPrecio()."$";
						}
						?></h2>
					</div>
				<div class="fecha">
						<h2><?php echo $pujasVendidas[$i]->getFecha() ?></h2>
					</div>
				<div class="estado">
						<h2>Estado: <?php echo $pujasVendidas[$i]->getEstado() ?></h2>
					</div>
                    
				<div class="valorar">
						<h2>Formulario Valoración</h2>
				</div>
					<div class="separator"></div>
					<!-- <p><?php //echo $pujasVendidas[$i]->getDescripcion() ?></p> -->
					<?php echo '<a class="seemore" href='.$path.'><i class="right"></i><p>Ir al producto</p></a>'?>

			</div>
			</div>
	<?php
		}
  } else echo "El usuario ha vendido ningún producto";	
	    ?>
