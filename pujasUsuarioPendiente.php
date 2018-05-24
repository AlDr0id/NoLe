<?php
require_once("include/pujaSA.php");
require_once("include/productoOfreSA.php");
$sa = new pujaSA();
$saProd = new productoOfreSA();
$pujas = $sa->getPujasPostor($_SESSION["nombre"], "PENDIENTE");

?>
<h1>Tus pujas pendientes</h1>

<?php
  if($pujas != NULL){
	for ($i=0; $i < sizeof($pujas); $i++) {
	?>
		<div class="card">
    <?php echo '<div class="thumbnail"><img class="leftImg" src="img/prods/'.$pujas[$i]->getIdProducto().'.png"/></div>'; ?>
			<div class="details">
				<?php
					$p = $saProd->getProducto($pujas[$i]->getIdProducto());
					$path = 'product.php?id='.$pujas[$i]->getIdProducto().'';
					$perfil = 'perfilVisitante.php?nickname='.$p->getOwner().'';
					echo"<h1>".$p->getNombre()."</h1>"; ?>
					<div class="author">
						<?php echo '<a class ="seemore" href='. $perfil . '></i><img onerror=this.src="img/error/no-image.png" src="img/'.$p->getOwner().'.png"/>
		              		<h2>'. $p->getOwner() .'</h2></a>' ?>
					</div>
					<div class="precio">
						<h2><?php
						if($pujas[$i]->getIdTrueque()!=NULL){
							echo "Ofertado producto ".$pujas[$i]->getIdTrueque();
						}
						else{
							echo $pujas[$i]->getPrecio()."$";
						}
						?></h2>
					</div>
				<div class="fecha">
						<h2><?php echo $pujas[$i]->getFecha() ?></h2>
					</div>
				<div class="estado">
						<h2><?php echo $pujas[$i]->getEstado() ?></h2>
					</div>
					<div class="separator"></div>
					<!-- <p><?php //echo $pujas[$i]->getDescripcion() ?></p> -->
					<?php echo '<a class="seemore" href='.$path.'><p>Ir al producto</p></a>'?>

			</div>
			</div>
	<?php
		}
  } else echo "El usuario no tiene pujas";
	    ?>
