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

if($user != NULL) {
  $user->setNombre($nombre);
  $user->setApellido($apellido);
  $user->setCorreo($email);
  $anadido=regUserControlador($user);

  $id = move_uploaded_file($_FILES['fotoPerfil']['tmp_name'], "img/" . $user->getNickname() . ".png");

  if($anadido) {
    if($id) {
      echo "<script>alert('Usuario modificado');</script>";
        $data['success'] = True;
    }
    else {
      echo "<script>alert('Usuario modificado pero error al cambiar la imagen');</script>";
        $data['success'] = True;
        $data['errors']='Usuario modificado pero error al cambiar la imagen';
    }
  }
  else {
  	echo "<script>alert('No se ha podido modificar el usuario');</script>";
      $data['errors']='No se ha podido modificar el usuario';
      $data['success'] = False;
    }
}
else {
  echo "<script>alert('La contraseña es errónea');</script>";
    $data['errors']='La contraseña es errónea';
    $data['success'] = False;
}


header("Refresh: 0 ;URL= perfil.php");
?>
