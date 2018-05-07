<?php 
	require_once('include/pujaSA.php');
  	$pu = new pujaSA();
  	

  	if (isset($_GET['puja'])) {
  		if($pu->terminarPuja($_GET['puja'])){
  			echo "<h1>La puja se ha cerrado correctamente</h1>";
  		}
  		else{
  			echo "<h1>La puja no se ha cerrado correctamente</h1>";
  		}
  	}
  	else{
  	$pujas = $pu->getPujaProducto($_GET['id']);
?>
<h1>Pujas del producto</h1>
<div class="pujas">
	<?php
		if($pujas != NULL){
			for ($i=0; $i < sizeof($pujas); $i++) {
				echo "<div class='card'>";
					echo "<p>Postor: ".$pujas[$i]->getIdPostor()." Oferta: ";
					if ($pujas[$i]->getIdTrueque() != NULL) {
						echo "<a href='product.php?id=".$pujas[$i]->getIdTrueque()."'> Producto</a></p>";
					}
					else{
						echo $pujas[$i]->getPrecio()."$</p>";
					}
					echo "<a class='seemore' href='perfil.php?opt=cerrarPujas&id=".$_GET['id']."&puja=".$pujas[$i]->getId()."'>Aceptar</a>";
				echo "</div>";
			}
		}
		else{
			echo "<p>No hay pujas por tu producto</p>";
		}
	?>
</div>
<?php } ?>