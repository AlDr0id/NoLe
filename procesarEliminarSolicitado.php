<?php
ob_start();
session_start();
require_once("include/productoSolicitadoSA.php");
require_once("include/productoSolicitadoTransfer.php");

$data = array();

function eliminaSoli( $id){
 	$productoSa = new productoSolicitadoSA();
 	$correcto=$productoSa->eliminar($id);
 	return $correcto;
}

$id = htmlspecialchars(trim(strip_tags($_GET["id"])));
$anadido = eliminaSoli($id);
 if($anadido != NULL){

      $data['success'] = True;

      header("Refresh: 0 ;URL= perfil.php?opt=verProdSolic&okCod=3");

  }
  else {
      $data['success'] = False;
      $data['errors'] = 'No se ha podido eliminar la Busqueda';
      header("Refresh: 0 ;URL= perfil.php?opt=verProdSolic&errCod=9");
  }

  ob_end_flush();
?>
