<?php 
$data = array();


$data['nombre'] = $_POST['nomProd'];
$data['preciomin'] = $_POST['minPre'];
$data['preciomax'] = $_POST['maxPre'];
$data['Categoria'] = $_POST['cateP'];
$data['Fecha'] = $_POST['anio'];
$data['conservacion'] = $_POST['cons'];
$data['pais'] = $_POST['pais'];

echo json_encode($data);
?>