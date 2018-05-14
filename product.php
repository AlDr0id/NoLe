<?php
	require_once("include/productoOfreSA.php");
	require_once("include/numismaticaSA.php");
	session_start();
	if (isset($_GET["id"])) {
		$id = $_GET["id"];
		$sa = new productoOfreSA();
		$prod = $sa->getProducto($id);
		$propietario = $prod->getOwner();
		$editar = false;
		if (isset($_SESSION['login']) and $propietario == $_SESSION['nombre']){
			$editar = true;
		}

	}
	else{
		header("Location: index.php");
	}
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>NoLe</title>
	<link rel="stylesheet" type="text/css" href="estilo.css">
	<link rel="stylesheet" type="text/css" href="card.css">
	<link rel="stylesheet" type="text/css" href="menu.css">
	<link rel="stylesheet" type="text/css" href="arrows.css">
	<link rel="stylesheet" type="text/css" href="adv-search.css">
	<link rel="stylesheet" type="text/css" href="prod-styles.css">
	<link rel="stylesheet" type="text/css" href="popup-style.css">
	<link rel="stylesheet" type="text/css" href="perfil-style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300" rel="stylesheet">
</head>
<body>

	<?php require_once("include/comun/cabecera.php");

	require_once("include/comun/menu.php");

	?>

	<div class="slider">
		<img src="error/no-image.png">
	</div>
	<div class="container">
		<div class="popupPuja">
		    <span class="helper"></span>
		    <div>
		        <div class="popupCloseButton">X</div>
		        <?php if (isset($_SESSION['login']) and $_SESSION['login'] and $prod->getEnPuja() and $propietario != $_SESSION['nombre']) { ?>
		        <h1>Puja</h1>
		        <form id=opt>
			        <input class="din" type="radio" name="puja" value="dinero" checked>Pujar con dinero
					<input class="prod" type="radio" name="puja" value="producto">Pujar con un producto
				</form>
		        <form class="formulario" action=<?php echo "'procesarPuja.php?idProd=".$_GET['id']."&idVend=".$propietario."'"; ?> method="POST">

		        	<div class="popupPujaDin">
				        <input class="valorPuja" type="number" name="valorPuja" value=<?php echo $prod->getPrecio();?> min= <?php echo $prod->getPrecio();?>>
				        <button type="submit">Añadir puja</button>
		        	</div>

		        	<div class="popupPujaProd">
						<select name="trueque">
							<option value='-1' selected>-</option>
							<?php 
								$productos=$sa->getProductoUsuarioInventario($_SESSION['nombre']);
								if ($productos != NULL) {
									for ($i=0; $i < sizeof($productos); $i++) { 
										echo "<option value='".$productos[$i]->getId()."''>".$productos[$i]->getNombre()."</option>";
									}
								}
								else{
									echo "<option value='-1'>No tienes productos con los que pujar</option>";
								}
								
							 ?>
						</select>
		            <button type="submit">Añadir puja</button>
		        	</div>
		        </form>
		        <?php }
			    else{ 
			    	echo "<h2>No puedes pujar, ";
			    	if(!$prod->getEnPuja()){
			    		echo "este producto no es pujable.</h2>";
					}
					else if(isset($_SESSION['login']) and $propietario == $_SESSION['nombre']){
						echo "el propietario no puede pujar por sus productos.</h2>";
					}
			    	else{
			    		echo "haz login o regístrate para pujar.</h2>";
			    	}
			    }?>
		    </div>
		</div>
		<h1><?php echo $prod->getNombre();  ?></h1>
		<div class="producto">
			
			<div class="prod-cont">
				<?php 
				if ($editar){
					$path = $prod->getId();
					echo '<a class="seemore" href="perfil.php?opt=anadProd&id='.$path.'"><i class="right"></i><p>Editar producto</p></a>';
						
				}
				?>
				<div class="imagen">
					<?php echo '<div class="thumbnail"><img class="left-prod" src="img/'.$prod->getId().'.png"/></div>'; ?>
				</div>
				<div class="info">
					<div class= "details">
						<h2>Descripción:</h2>
						<p><?php echo $prod->getDescripcion(); ?></p>
						<h2>Detalles: </h2>
						<?php
						switch ($prod->getCategoria()) {
							case '0':
								$saNumi = new numismaticaSA();
								$prodNumi = $saNumi->getProductoNumi($id);
								echo '<p>Año: '.$prodNumi->getAño().'</p> <p>País: '.$prodNumi->getPais().'</p> <p>Conservación: '.$prodNumi->getConservacion().'</p>';
								break;

							default:
								echo "Pendiente";
								break;
						}
						?>
						<h2>Precio:</h2><p><?php echo $prod->getPrecio();?>$</p>
					</div>
					<div class="category">
						<h2><?php echo $prod->getCategoria(); ?></h2>
					</div>
					<div class="author">
				    	<img src="rodri.jpg"/>
				      	<h2><?php echo $prod->getOwner(); ?></h2>
			    	</div>
			    	<!-- Hacer opciones para cada botón. Si es pujar, poner oferta a pagar.
			    		Si es hacer intercambio, mostrar desplegable con los productos que tiene el usuario -->
					<div class="boton">
						<button class="puja">Pujar</button>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="footer">
		<p>Javier Picatoste - Rodrigo - Álvaro - Manu - Alex - Marcos - Dani - Alberto</p>
	</div>
</body>
	<script type="text/javascript" src="javascript.js"></script>
	<script type="text/javascript" src="puja.js"></script>
</html>








