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
  	$pujas = $pu->getPujasProductoPendientes($_GET['id']);
?>
<h1>Pujas del producto</h1>
<div class="pujas">
	<?php
		if($pujas != NULL){
			for ($i=0; $i < sizeof($pujas); $i++) {
				echo "<div class='card'>";
					echo "<p>Postor: ".$pujas[$i]->getIdPostor()."</p><p style= 'margin-left:35px'> Oferta: </p>";
					if ($pujas[$i]->getIdTrueque() != NULL) {
						echo "<a class='seemore' style= 'margin-left:15px' href='product.php?id=".$pujas[$i]->getIdTrueque()."'><p>Producto</p></a>";
					}
					else{
						echo "<p style= 'margin-left:5px'>".$pujas[$i]->getPrecio()."$ </p>";
					}
					echo "<a class='seemore' style= 'margin-left:50px' href='perfil.php?opt=cerrarPujas&id=".$_GET['id']."&puja=".$pujas[$i]->getId()."'><p>Aceptar</p></a>";
				echo "</div>";
			}
		}
		else{ 
?>
			<h2>Nadie ha pujado por su producto. Aún puedes <a href='perfil.php?opt=verProds&idProd=<?php echo $_GET["id"]; ?>'>mandarlo a su inventario </a>.</h2> 
		<?php
		}

	?>
</div>
<?php } ?>