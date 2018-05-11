<?php
session_start();
require_once("include/UsuarioSA.php");
require_once("include/UsuarioTransfer.php");

function regUserControlador(usuarioTransfer $user){
    $usuarioSa = new usuarioSA();
    $correcto=$usuarioSa->editUsuario($user);
    return $correcto;
}

$data = array();

$nombre=htmlspecialchars(trim(strip_tags($_POST["nom"])));
$apellido=htmlspecialchars(trim(strip_tags($_POST["ape"])));
$email=htmlspecialchars(trim(strip_tags($_POST["mail"])));
$pass=htmlspecialchars(trim(strip_tags($_POST["pass"])));

$userB = new usuarioTransfer($_SESSION["nombre"],"","",$pass,"",0,0,"");

$usuarioSA = new usuarioSA();
$user = $usuarioSA->getUsuario($userB);

$user->setNombre($nombre);
$user->setApellido($apellido);
$user->setCorreo($email);
$anadido=regUserControlador($user);

if($anadido) {
	echo "<script>alert('Usuario modificado');</script>";
    $data['success'] = True;
  }
else {
	echo "<script>alert('No se pudo modificar el usuario');</script>";
    $data['errors']='No se ha podido editar el usuario correctamente';
    $data['success'] = False;
  }

header("Refresh: 0 ;URL= ../index.php");
?>
