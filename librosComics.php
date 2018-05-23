<?php session_start();
require_once('include/BusquedaSA.php');
$busq = new BusquedaSA();
$array = [
 "Categoria" => 6
];

$prod = $busq->getProductoAvan($array);

?>
<!DOCTYPE html>
<html>
<head>
  <title>NoLe</title>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="estilo.css">
  <link rel="stylesheet" type="text/css" href="card.css">
  <link rel="stylesheet" type="text/css" href="menu.css">
  <link rel="stylesheet" type="text/css" href="arrows.css">
  <link rel="stylesheet" type="text/css" href="popup-style.css">
  <link rel="stylesheet" type="text/css" href="cabecera.css">
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
    <h1>Libros/Comics</h1>
    <div class="productosCuadricula">
    <?php
    for ($i=0; $i < sizeof($prod); $i++) {
      ?>
      <div class="card cuadricula">
        <?php echo '<div class="thumbnail"><img class="leftImg" src="img/prods/'.$prod[$i]->getId().'.png"/></div>'; ?>
        <div class="details">
          <?php
            $path = 'product.php?id='.$prod[$i]->getId().'';
            echo"<h1>".$prod[$i]->getNombre()."</h1>"; ?>
            <div class="author"><!-- Imagen que habra que cambiar cuando se tengan fotos del usuario -->
            <?php $perfil = 'perfilVisitante.php?nickname='.$prod[$i]->getOwner().'';
              echo '<a class ="seemore" href='. $perfil . '></i><img src="img/'.$prod[$i]->getOwner().'.png"/>
              <h2>'. $prod[$i]->getOwner() .'</h2></a>' ?>
          </div>
            <div class="category">
                <?php
                  switch ($prod[$i]->getCategoria()) {
                    case '0':
                      echo "<a class='catLink' href='numismatica.php'> Numismática</a>";
                      break;
                    case '1':
                      echo "<a class='catLink' href='rinconAbuela.php'>Rincón de la Abuela</a>";
                      break;
                    case '2':
                      echo "<a class='catLink' href='figuras.php'>Figuras</a>";
                      break;
                    case '3':
                      echo "<a class='catLink' href='filatelia.php'>Filatelia</a>";
                      break;
                    case '4':
                      echo "<a class='catLink' href='vinilosDiscos.php'>Vinilos/Discos</a>";
                      break;
                    case '5':
                      echo "<a class='catLink' href='cromos.php'>Cromos</a>";
                      break;
                    case '6':
                      echo "<a class='catLink' href='librosComics.php'>Libros/Comics</a>";
                      break;
                    case '7':
                      echo "<a class='catLink' href='trastero.php'>Trastero</a>";
                      break;
                   }?>

            </div>
            <div class="precio">
                <h2><?php echo $prod[$i]->getPrecio() ?>$</h2>
            </div>

            <div class="separator"></div>
            <p><?php echo $prod[$i]->getDescripcionCorta() ?></p>
            <?php echo '<a class="seemore" href='.$path.'><p>Ir al producto</p></a>'?>

        </div>
      </div>
      <?php
    }


     ?>
   </div>
  </div>
  <?php require_once("include/comun/footer.php"); ?>
</body>
</html>
