<?php 
session_start();
require_once("include/UsuarioSA.php");
require_once("include/UsuarioTransfer.php");

$data = array();

function loginControlador(usuarioTransfer $user){
 	$usuarioSa = new usuarioSA();
 	$correcto=$usuarioSa->getUsuario($user);
 	return $correcto;
}

$nickname=htmlspecialchars(trim(strip_tags($_POST["user"])));
$pass=htmlspecialchars(trim(strip_tags($_POST["pass"])));
$user = new usuarioTransfer($nickname,"","",$pass, "",0,0,"");
$anadido=loginControlador($user);

if($anadido!= NULL){
	$_SESSION['login']=True;
	$_SESSION['nombre'] = $nickname;
	$data['success'] = True;
}
else{
	/*echo"<script language='JavaScript'> 
          alert('Contraseñas incorrectas'); 
     </script>";*/
    $data['success'] = False;
    $data['errors'] = 'Usuario/Contraseña incorrecta';
}

echo json_encode($data);
?>