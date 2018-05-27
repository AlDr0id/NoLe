<div class="menu">
	  <span><a href="advanced-search.php">Búsqueda avanzada</a></span>
	  <span class="dropdown">
	  	<button class="dropbtn">Categorías <i class="down"></i></button>
	  	<div class="dropdown-content">
		  	<a href="numismatica.php">Numismática</a>
		    <a href="rinconAbuela.php">El Rincón de la Abuela</a>
		    <a href="figuras.php">Figuras</a>
		    <a href="filatelia.php">Filatelia</a>
		    <a href="vinilosDiscos.php">Vinilos/Discos</a>
		    <a href="cromos.php">Cromos</a>
		    <a href="librosComics.php">Libros/Comics</a>
		    <a href="trastero.php">Trastero</a>
			</div>
	  </span>
	  <?php
		if (isset($_SESSION["login"]) and $_SESSION["login"]) {
			?>
			<span><a href="perfil.php?opt=anadProd">Añadir un artículo</a></span>
			<span><a href="perfil.php?opt=solicitarProd">Solicitar un artículo</a></span>
		<?php
		}
  		?>
	  
	  
	  <span><a href="sobre-nosotros.php">Sobre nosotros</a></span>
</div>
