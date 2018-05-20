<?php
session_start();
require_once("include/productoSolicitadoSA.php");
require_once("include/productoSolicitadoTransfer.php");

$nomP = htmlspecialchars(trim(strip_tags($_POST['nomP'])));
$cat = htmlspecialchars(trim(strip_tags($_POST['cateP'])));
$pclave = htmlspecialchars(trim(strip_tags($_POST['palabrasP'])));

$producto = new productoSolicitadoTransfer('',$_SESSION['nombre'],$nomP ,$cat,'','1', $pclave);

$productoSA = new productoSolicitadoSA();
$id=$productoSA->newProducto($producto);

header("Refresh: 0 ;URL= perfil.php?opt=verProdSolic");