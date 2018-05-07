<?php
require_once("include/pujaSA.php");
require_once("include/productoOfreSA.php");
session_start();

$sa = new pujaSA();

$date = date('Y/m/d h:i:s', time());

if($_POST['trueque'] != -1){
	$puja = new pujaTransfer('',$_GET['idProd'],$_SESSION['nombre'],0,$_POST['trueque'],$date,'PENDIENTE');
	$sa->newPuja($puja);
}
else{
	$puja = new pujaTransfer('',$_GET['idProd'],$_SESSION['nombre'],$_POST["valorPuja"],NULL,$date,'PENDIENTE');
	$sa->newPuja($puja);

}

header('Location: product.php?id='.$_GET['idProd']);
?>
