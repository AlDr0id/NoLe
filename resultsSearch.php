<?php
require_once("include/BusquedaSA.php");
$sa = new BusquedaSA();
$prod = $sa->getProducto($_GET["nom"]);
?>
	<h1>Resultado búsqueda</h1>

	<?php
    for ($i=0; $i < sizeof($prod); $i++) {
    ?>
	  <div class="card">
		  <?php echo '<div class="thumbnail"><img class="leftImg" src="img/'.$prod[$i]->getId().'.png"/></div>'; ?>
		  <div class="details">
		    <?php
			    $path = 'product.php?id='.$prod[$i]->getId().'';
			    $perfil = 'perfilVisitante.php?nickname='.$prod[$i]->getOwner().'';
			    echo"<h1>".$prod[$i]->getNombre()."</h1>"; ?>
			    <div class="author">
			    	<?php echo '<a class ="seemore" href='. $perfil . '></i><img src="pica.jpg"/>
		              	<h2>'. $prod[$i]->getOwner() .'</h2></a>' ?>
			    </div>
			    <div class="category">
			      	<h2><?php echo $prod[$i]->getCategoria() ?></h2>
			    </div>
			    <div class="separator"></div>
			    <p><?php echo $prod[$i]->getDescripcion() ?></p>
			    <?php echo '<a class="seemore" href='.$path.'><i class="right"></i><p>Ir al producto</p></a>'?>

		  </div>
		</div>
	<?php
	}
	    ?>
