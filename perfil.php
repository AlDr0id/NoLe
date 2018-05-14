<?php session_start();
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
  <link rel="stylesheet" type="text/css" href="actividadReciente-style.css">
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
    <h1>Perfil del usuario</h1>
    <div class="perfil-div">
        <!-- Aquí tiene que haber dos apartados. A la derecha las opciones, y cuando se seleccione una debe aparecer en la izquierda
              Por defecto debe aparecer la actividad reciente al entrar a perfil.php -->
        <div class="izquierda">
          <?php 
          if (isset($_GET['opt'])) {
            switch ($_GET['opt']) {
               case 'activRec':
                    
                 break;
                case 'verProds':
                    require_once('productosUsuario.php');
                 break;
                case 'verPujas':
                    require_once('pujasUsuarioPendiente.php');
                 break;
                case 'verProdPuja':
                    require_once('productosPuja.php');
                 break;
                case 'anadProd':
                    require_once('newProd.php');
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
                 # code...
                 break;
            }
          }
        ?>

        </div>
        <div class="derecha">
          <a href="perfil.php?opt=actividadReciente">Historial</a>
          <a href="perfil.php?opt=verProds">Ver todos mis productos de inventario(No en puja)</a>
          <a href="perfil.php?opt=verPujas">Ver todas mis pujas</a>
          <a href="perfil.php?opt=verProdPuja">Ver todos mis productos en puja</a>
          <a href="perfil.php?opt=anadProd">Añadir un producto</a>
          <a href="perfil.php?opt=verPerfil" >Ver mi perfil</a> <!-- Dentro de aquí habrá una opción para editar perfil, salvo la contraseña que va aquí fuera  -->
          <a href="perfil.php?opt=camPass">Cambiar contraseña</a>
          <a href="perfil.php?opt=deleteCuenta">Eliminar mi cuenta</a>

        </div>
    </div>
  </div>
  <div class="footer">
    <p>Javier Picatoste - Rodrigo - Álvaro - Manu - Alex - Marcos - Dani - Alberto</p>
  </div>
</body>
<script type="text/javascript" src="javascript.js"></script>
<script type="text/javascript" src="perfil.js"></script>
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
















