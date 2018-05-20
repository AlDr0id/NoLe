<?php session_start();?>
<!DOCTYPE html>
<html>
<head>
  <title>NoLe</title>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="estilo.css">
  <link rel="stylesheet" type="text/css" href="card.css">
  <link rel="stylesheet" type="text/css" href="menu.css">
  <link rel="stylesheet" type="text/css" href="arrows.css">
  <link rel="stylesheet" type="text/css" href="adv-search.css">
  <link rel="stylesheet" type="text/css" href="prod-styles.css">
  <link rel="stylesheet" type="text/css" href="popup-style.css">
  <link rel="stylesheet" type="text/css" href="perfil-style.css">
  <link rel="stylesheet" type="text/css" href="actividadReciente-style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300" rel="stylesheet">
  <script type="text/javascript" src="javascript.js"></script>
    <script type="text/javascript" src="perfil.js"></script>
</head>
<body>

  <?php require_once("include/comun/cabecera.php");
  require_once("include/comun/menu.php");

  if(isset($_GET['okCod'])){
      if ($_GET['okCod'] == 1) {?>
        <div class="alert success">
          <p><strong>Hecho!</strong> Contraseña cambiada</p>
        </div>
      <?php
      }
      if ($_GET['okCod'] == 2) {?>
        <div class="alert success">
          <p><strong>Hecho!</strong> Perfil editado con éxito</p>
        </div>
      <?php
      }
    }
  if(isset($_GET['errCod'])){
      if ($_GET['errCod'] == 1) {?>
        <div class="alert">
          <p><strong>Error!</strong> Ha habido un problema al añadir el producto, inténtelo de nuevo</p>
        </div>
      <?php
      }
      if ($_GET['errCod'] == 2) {?>
        <div class="alert">
          <p><strong>Error!</strong> Ha habido un problema al editar el producto, inténtelo de nuevo</p>
        </div>
      <?php
      }
      if ($_GET['errCod'] == 3) {?>
        <div class="alert">
          <p><strong>Error!</strong> La contraseña antigua no es correcta.</p>
        </div>
      <?php
      }
      if ($_GET['errCod'] == 4) {?>
        <div class="alert">
          <p><strong>Error!</strong> Las cotraseñas no coinciden</p>
        </div>
      <?php
      }
      if ($_GET['errCod'] == 5) {?>
        <div class="alert">
          <p><strong>Error!</strong> La cuenta no ha podido ser borrada</p>
        </div>
      <?php
      }
      if ($_GET['errCod'] == 6) {?>
        <div class="alert">
          <p><strong>Error!</strong> La imagen no ha podido ser editada</p>
        </div>
      <?php
      }
      if ($_GET['errCod'] == 7) {?>
        <div class="alert">
          <p><strong>Error!</strong> El perfil no ha podido ser editado</p>
        </div>
      <?php
      }
      if ($_GET['errCod'] == 8) {?>
        <div class="alert">
          <p><strong>Error!</strong> Contraseña incorrecta</p>
        </div>
      <?php
      }
    }
  ?>

  <div class="slider">
    <img src="error/no-image.png">
  </div>
  <div class="container">
    <h1>Perfil del usuario</h1>
    <div class="perfil-div">
        <!-- Aquí tiene que haber dos apartados. A la derecha las opciones, y cuando se seleccione una debe aparecer en la izquierda
              Por defecto debe aparecer la actividad reciente al entrar a perfil.php -->
        <div class="izquierda">
          <?php
          if (isset($_GET['opt'])) {
            switch ($_GET['opt']) {
                case 'verProds':
                    require_once('productosUsuario.php');
                 break;
                case 'verPujas':
                    require_once('pujasUsuarioPendiente.php');
                 break;
                case 'verProdPuja':
                    require_once('productosPuja.php');
                 break;
                case 'verProdSolic':
                    require_once('verProductosSolicitados.php');
                 break; 
                case 'anadProd':
                    require_once('newProd.php');
                  break;
                case 'solicitarProd':
                    require_once('productoSolicitado.php');
                  break;    
                case 'verPerfil':
                    require_once('verPerfil.php');
                  break;
                case 'camPass':
                      require_once('cambiaPass.php');
                  break;
                case 'deleteCuenta':
                      require_once('eliminaCuenta.php');
                  break;
                case 'cerrarPujas':
                      require_once('cerrarPujas.php');
                  break;
                case 'actividadReciente':
                      require_once('actividadReciente.php');
                  break;
               default:
                  require_once('actividadReciente.php');
                 break;
            }
          }
          else{
             require_once('actividadReciente.php'); 
          }
        ?>

        </div>
        <div class="derecha">
          <a class='actividadReciente' href="perfil.php?opt=actividadReciente" onclick="actualicePerfil()">Historial</a>
          <a class="verProductos" href="perfil.php?opt=verProds" onclick="actualicePerfil()">Ver todos mis productos de inventario(No en puja)</a>
          <a class="verPujas" href="perfil.php?opt=verPujas" onclick="actualicePerfil()">Ver todas mis pujas</a>
          <a class="verProductosPuja" href="perfil.php?opt=verProdPuja" onclick="actualicePerfil()">Ver todos mis productos en puja</a>
          <a class="verProductosSolicitados" href="perfil.php?opt=verProdSolic" onclick="actualicePerfil()">Ver mis productos solicitados</a>
          <a class="anadirProducto" href="perfil.php?opt=anadProd" onclick="actualicePerfil()">Añadir un producto</a>
          <a class="solicitarProducto" href="perfil.php?opt=solicitarProd" onclick="actualicePerfil()">Solicitar un producto</a>
          <a class="verPerfil" href="perfil.php?opt=verPerfil" onclick="actualicePerfil()">Ver mi perfil</a> <!-- Dentro de aquí habrá una opción para editar perfil, salvo la contraseña que va aquí fuera  -->
          <a class='cambiarPass' href="perfil.php?opt=camPass" onclick="actualicePerfil()">Cambiar contraseña</a>
          <a class='deleteCuenta' href="perfil.php?opt=deleteCuenta" onclick="actualicePerfil()">Eliminar mi cuenta</a>

        </div>
    </div>
  </div>
  <div class="footer">
    <p>Javier Picatoste - Rodrigo - Álvaro - Manu - Alex - Marcos - Dani - Alberto</p>
  </div>
</body>

<?php
  if (isset($_GET['opt'])) {
    switch ($_GET['opt']) {
        case 'anadProd':
          echo '<script type="text/javascript" src="cate.js"></script>';
          echo '<script type="text/javascript" src="imagenes.js"></script>';
          break;
        case 'verPerfil':
          echo '<script type="text/javascript" src="imagenes.js"></script>';
          break;
        case 'actividadReciente':
          echo '<script type="text/javascript" src="valoracion.js"></script>';
          break;
       default:
         # code...
         break;
    }
  }
?>
</html>
