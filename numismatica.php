<?php session_start(); 
require_once('include/BusquedaSA.php');
$busq = new BusquedaSA();
$array = [
 "Categoria" => 0
];

$prod = $busq->getProductoAvan($array);

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
  <script type="text/javascript" src="javascript.js"></script>
</head>
<body>

  <?php require_once("include/comun/cabecera.php"); 

  require_once("include/comun/menu.php");

  ?>

  <div class="slider">
    <img src="error/no-image.png">
  </div>
  <div class="container">
    <h1>Numismática</h1>

    <?php
    for ($i=0; $i < sizeof($prod); $i++) {
      ?>
      <div class="card">
        <?php echo '<div class="thumbnail"><img class="leftImg" src="img/'.$prod[$i]->getId().'.png"/></div>'; ?>
        <div class="details">
        <?php
          $path = 'product("'.$prod[$i]->getId().'")';
          echo"<h1>".$prod[$i]->getNombre()."</h1>";
        ?>
          <div class="author">
            <img src="pica.jpg"/>
              <h2><?php echo $prod[$i]->getOwner() ?></h2>
          </div>
          <div class="category">
              <h2><?php echo $prod[$i]->getCategoria() ?></h2>
          </div>
          <div class="separator"></div>
          <p><?php echo $prod[$i]->getDescripcionCorta() ?></p>

          <?php echo '<a class="seemore" onclick='.$path.'><i class="right"></i><p>Ir al producto</p></a>'?>
        </div>
      </div>
      <?php
    }


     ?>
  </div>
  <div class="footer">
    <p>Javier Picatoste - Rodrigo - Álvaro - Manu - Alex - Marcos - Dani - Alberto</p>
  </div>
</body>
</html>







