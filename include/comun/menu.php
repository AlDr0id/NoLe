<div class="menu">
	  <span><a href="advanced-search.php">Búsqueda avanzada</a></span>
	  <span class="dropdown">
	  	<button class="dropbtn">Categorías <i class="down"></i></button>
	  	<div class="dropdown-content">
		  	<a href="numismatica.php">Numismática</a>
		    <a href="#">El Rincón de la Abuela</a>
		    <a href="#">Figuras</a>
		    <a href="#">Filatelia</a>
		    <a href="#">Vinilos/Discos</a>
		    <a href="#">Cromos</a>
		    <a href="#">Libros/Comics</a>
		    <a href="#">Trastero</a>
			</div>
	  </span>
	  <?php
		if (isset($_SESSION["login"]) and $_SESSION["login"]) {
			?>
			<span><a href="perfil.php?opt=anadProd">Añadir un artículo</a></span>
		<?php
		}
  		?>
	  
	  
	  <span><a href="sobre-nosotros.php">Sobre nosotros</a></span>
</div>
