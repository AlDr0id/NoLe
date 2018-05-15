<?php
require_once("include/pujaSA.php");
require_once("include/productoOfreSA.php");
$sa = new pujaSA();
$saProd = new productoOfreSA();
$pujasGanadas = $sa->getPujasPostor($_SESSION["nombre"], "GANADA");
$pujasPerdidas = $sa->getPujasPostor($_SESSION["nombre"], "PERDIDA");
$pujasVendidas = $sa->getPujasVendedorCerradas($_SESSION["nombre"]);

?>


<div class="popupValorar">
    <span class="helper"></span>
    <div>
        <div class="popupCloseButton">X</div>
        <h1>Valorar</h1>
        <form class="formulario valForm" method="POST" action="procesarValoracion.php">
		  <p class="clasificacion">
		    <input id="radio1" type="radio" name="estrellas" value="5"><!--
		    --><label for="radio1">★</label><!--
		    --><input id="radio2" type="radio" name="estrellas" value="4"><!--
		    --><label for="radio2">★</label><!--
		    --><input id="radio3" type="radio" name="estrellas" value="3"><!--
		    --><label for="radio3">★</label><!--
		    --><input id="radio4" type="radio" name="estrellas" value="2"><!--
		    --><label for="radio4">★</label><!--
		    --><input id="radio5" type="radio" name="estrellas" value="1"><!--
		    --><label for="radio5">★</label>
		  </p>
		  <button type="submit">Valorar</button>
		</form>
    </div>
</div>


<h2>Tus pujas ganadas</h2>
<ul>
<?php
  if($pujasGanadas != NULL){
	for ($i=0; $i < sizeof($pujasGanadas); $i++) {
		$path = '"product.php?id='.$pujasGanadas[$i]->getIdProducto().'"';
		$pathOfer = '"product.php?id='.$pujasGanadas[$i]->getIdTrueque().'"';
		$p = $saProd->getProducto($pujasGanadas[$i]->getIdProducto());
	?>
		<li><em><?php echo $pujasGanadas[$i]->getFecha()?></em> - Ha ganado la puja por este <a href=<?php echo $path; ?>>producto</a> a cambio de 
			<?php 
				if($pujasGanadas[$i]->getIdTrueque()!=NULL){
					echo "<a href=".$pathOfer.">producto ofertado</a>.";
				}
				else{
					echo "<b>".$pujasGanadas[$i]->getPrecio()."$</b>.";
				}
			?>
			Vendedor: <a href=<?php echo "perfilVisitante.php?nickname=".$p->getOwner();?>></a><?php echo $p->getOwner();?>
			<a class='valorar' onclick= <?php echo "valorarPuja(".$pujasGanadas[$i]->getId().",'".$p->getOwner()."')"; ?>>Valorar vendedor</a>
		</li>
	<?php
		}
  } else echo "El usuario no tiene pujas ganadas";	
	    ?>
</ul>
<h2>Tus pujas perdidas</h2>
<ul>
<?php
  if($pujasPerdidas != NULL){
	for ($i=0; $i < sizeof($pujasPerdidas); $i++) {
		$path = '"product.php?id='.$pujasPerdidas[$i]->getIdProducto().'"';
		$pathOfer = '"product.php?id='.$pujasPerdidas[$i]->getIdTrueque().'"';
		$p = $saProd->getProducto($pujasPerdidas[$i]->getIdProducto());
	?>
		<li><em><?php echo $pujasPerdidas[$i]->getFecha()?></em> - Ha ganado la puja por este <a href=<?php echo $path; ?>>producto</a> a cambio de 
			<?php 
				if($pujasPerdidas[$i]->getIdTrueque()!=NULL){
					echo "<a href=".$pathOfer.">producto ofertado</a>.";
				}
				else{
					echo "<b>".$pujasPerdidas[$i]->getPrecio()."$</b>.";
				}
			?>
			Vendedor: <a href=<?php echo "perfilVisitante.php?nickname=".$p->getOwner();?>></a><?php echo $p->getOwner();?>
		</li>
	<?php
		}
		
  } else echo "El usuario no tiene pujas perdidas";	
	    ?>
</ul>
<h2>Tus ventas</h2>
<ul>
<?php
  if($pujasVendidas != NULL){
	for ($i=0; $i < sizeof($pujasVendidas); $i++) {
		$path = '"product.php?id='.$pujasVendidas[$i]->getIdProducto().'"';
		$pathOfer = '"product.php?id='.$pujasVendidas[$i]->getIdTrueque().'"';
		$p = $saProd->getProducto($pujasVendidas[$i]->getIdProducto());
	?>
		<li><em><?php echo $pujasVendidas[$i]->getFecha()?></em> - <a href=<?php echo "perfilVisitante.php?nickname=".$p->getOwner();?>></a><?php echo $p->getOwner();?> te ha comprado este <a href=<?php echo $path; ?>>producto</a> a cambio de 
			<?php 
				if($pujasVendidas[$i]->getIdTrueque()!=NULL){
					echo "<a href=".$pathOfer.">producto ofertado</a>.";
				}
				else{
					echo "<b>".$pujasVendidas[$i]->getPrecio()."$</b>.";
				}
			?>
		</li>
	<?php
		}
  } else echo "El usuario ha vendido ningún producto";	
	    ?>
</ul>