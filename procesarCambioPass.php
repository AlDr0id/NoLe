<?php
session_start();
require_once("include/UsuarioSA.php");
require_once("include/UsuarioTransfer.php");

$data = array();

function cambiaPass(usuarioTransfer $user, $nuevaPass){
 	$usuarioSa = new usuarioSA();
 	$correcto=$usuarioSa->cambiaPass($user, $nuevaPass);
 	return $correcto;
}

$antiguaPass = htmlspecialchars(trim(strip_tags($_POST["ant"])));
$nuevaPass = htmlspecialchars(trim(strip_tags($_POST["pass"])));
$nuevaPass2 = htmlspecialchars(trim(strip_tags($_POST["pass2"])));
$nickname = $_SESSION['nombre'];
$user = new usuarioTransfer($nickname,"","",$antiguaPass, "","");


if ($nuevaPass == $nuevaPass2) {
  $anadido = cambiaPass($user, $nuevaPass);
  if($anadido != NULL){

      $data['success'] = True;
      echo"<script language='JavaScript'>
              alert('Contraseña cambiada');
         </script>";
      header("Refresh: 0 ;URL= index.php");
  }
  else {
    $data['success'] = False;
    $data['errors'] = 'Contraseña incorrecta';
  }

}
else{
	/*echo"<script language='JavaScript'>
          alert('Contraseñas incorrectas');
     </script>";*/
    $data['success'] = False;
    $data['errors'] = 'Las contraseñas no coinciden';
}

echo json_encode($data);
?>
