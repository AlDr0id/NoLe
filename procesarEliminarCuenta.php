<?php
session_start();
require_once("include/UsuarioSA.php");
require_once("include/UsuarioTransfer.php");

$data = array();

function eliminaCuenta(usuarioTransfer $user){
 	$usuarioSa = new usuarioSA();
 	$correcto=$usuarioSa->eliminaCuenta($user);
 	return $correcto;
}

$op = htmlspecialchars(trim(strip_tags($_POST["op"])));
$nickname = $_SESSION['nombre'];
$user = new usuarioTransfer($nickname,"","","","","");

if ($op == '1') {
  $anadido = eliminaCuenta($user);
  /* FALTA HACER TODAS LAS COMPROBACIONES QUE SEAN NECESARIAS ANTES DE ELIMINAR UNA CUENTA, COMO QUE NO TENGA PRODUCTOS O PUJAS, O EN SU
  DEFECTO DESACTIVAR TODOS SUS PRODUCTOS Y SUS PUJAS ANTES DE DAR DE BAJA LA CUENTA */
  if($anadido != NULL){

      $data['success'] = True;
      session_destroy();
      session_unset();

      echo"<script language='JavaScript'>
              alert('Cuenta eliminada');
         </script>";
      header("Refresh: 0 ;URL= index.php");

  }
  else {
      $data['success'] = False;
      $data['errors'] = 'No se ha podido eliminar la cuenta';
  }
}

echo json_encode($data);
?>
