<?php
ob_start();
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
$user = new usuarioTransfer($nickname,"","","","",0,0,"");

if ($op == '1') {
  $anadido = eliminaCuenta($user);
  if($anadido != NULL){

      $data['success'] = True;
      session_destroy();
      session_unset();

      header("Refresh: 0 ;URL= index.php?okCod=2");

  }
  else {
      $data['success'] = False;
      $data['errors'] = 'No se ha podido eliminar la cuenta';
      header("Refresh: 0 ;URL= perfil.php?errCod=5");
  }
}
ob_end_flush();
?>
