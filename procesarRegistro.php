<?php
session_start();
require_once("include/UsuarioSA.php");
require_once("include/UsuarioTransfer.php");

function regUserControlador(usuarioTransfer $user){
    $usuarioSa = new usuarioSA();
    $correcto=$usuarioSa->newUsuario($user);
    return $correcto;
}

$data = array();

$nickname=htmlspecialchars(trim(strip_tags($_POST["userReg"])));
$pass=htmlspecialchars(trim(strip_tags($_POST["passReg"])));
$pass2=htmlspecialchars(trim(strip_tags($_POST["passReg2"])));
$nombre=htmlspecialchars(trim(strip_tags($_POST["nom"])));
$apellido=htmlspecialchars(trim(strip_tags($_POST["ape"])));
$email=htmlspecialchars(trim(strip_tags($_POST["mail"])));



if($pass == $pass2) {
  $user = new usuarioTransfer($nickname,$nombre,$apellido,$pass,$email,0,0,'1');
  $anadido=regUserControlador($user);
  if($anadido) {
    $data['success'] = True;
  }
  else {
    $data['errors']='El registro no ha podido efectuarse, pruebe con otro nombre de usuario';
    $data['success'] = False;
  }
}


echo json_encode($data);
?>
