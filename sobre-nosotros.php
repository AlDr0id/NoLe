<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
  <title>NoLe</title>
  <meta charset="utf-8">
  <link rel="icon" href="img/logo.png">
  <link rel="stylesheet" type="text/css" href="estilo.css">
  <link rel="stylesheet" type="text/css" href="card.css">
  <link rel="stylesheet" type="text/css" href="menu.css">
  <link rel="stylesheet" type="text/css" href="arrows.css">
  <link rel="stylesheet" type="text/css" href="popup-style.css">
  <link rel="stylesheet" type="text/css" href="cabecera.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script type="text/javascript" src="javascript.js"></script>
</head>
<body>

  <?php require_once("include/comun/cabecera.php");

  require_once("include/comun/menu.php");

  ?>

  
  <div class="container">
    <h1>Sobre nosotros</h1>
    <div class="sobre-div">
        <div class="texto">
          <p><i class="right"></i>
            NoLe (NoLeTengo) es una aplicación web para poner en contacto compradores y vendedores de artículos de coleccionista,
            como por ejemplo cromos de fútbol de la primera edición de Panini, figuras de acción de mediados del siglo pasado,
            o incluso antigüedades como vasijas y utensilios de civilizaciones pasadas.
          </p>
          <p><i class="right"></i>
            Contiene una serie de usuarios con la capacidad de ofrecer productos, y de poder solicitarlos.
            Por tanto, en el perfil de cada usuario aparecen los productos que ofertan, así como las peticiones de productos que hace.
          </p>
          <p><i class="right"></i>
            Si un usuario pide un producto y no está disponible, se creará la petición mencionada,
            la cual será visible para todos los usuarios en los Productos solicitados.
          </p>
          <p><i class="right"></i>
            A la hora de querer adquirir un producto, se llevará a cabo una puja privada por el mismo.
            En dicha puja participarán todos los usuarios que quieran el producto. Cada uno propondrá un precio que considere que vale el producto,
            teniendo un precio base mínimo establecido por el vendedor.
            Cabe la posibilidad de ofrecer objetos además de dinero durante la puja. Cuando el vendedor considere oportuno,
            elegirá la propuesta que quiera de todas las que haya, pudiendo no elegir ninguna. Una vez termina la puja,
            se notificará a los usuarios de si su propuesta ha sido aceptada o no.
          </p>
          <p><i class="right"></i>
            Para poner en contacto a comprador y vendedor, una vez aceptada la propuesta, se mandarán al comprador los datos de contacto del vendedor,
            ajenos a la aplicación, para poder así llevar a cabo la venta como tal.
          </p>
          <p><i class="right"></i>
            La página muestra los productos clasificados en categorías, en cada categoría se muestran todos los productos,
            así como una sección con los productos más recientes y los más vendidos.
          </p>
      </div>
    </div>

  </div>
  <?php require_once('include/comun/footer.php');  ?>
</body>
</html>
