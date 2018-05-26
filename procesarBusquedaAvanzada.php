<?php 
$data = array();


$data['nombre'] = urlencode($_POST['nomProd']);
$data['preciomin'] = urlencode($_POST['minPre']);
$data['preciomax'] = urlencode($_POST['maxPre']);
$data['Categoria'] = urlencode($_POST['cateP']);
$data['numiFecha'] = urlencode($_POST['anio']);
$data['numiconservacion'] = urlencode($_POST['cons']);
$data['numipais'] = urlencode($_POST['pais']);
$data['rdlaTipo'] = urlencode($_POST['rclaTipo']);
$data['rdlaOrigen'] = urlencode($_POST['rclaOrigen']);
$data['figTema'] = urlencode($_POST['figTema']);
$data['figMaterial'] = urlencode($_POST['figMaterial']);
$data['figFabricante'] = urlencode($_POST['figFabricante']);
$data['filPais'] = urlencode($_POST['filPais']);
$data['filFecha'] = urlencode($_POST['filAnyo']);
$data['viniFecha'] = urlencode($_POST['viniAnyo']);
$data['viniAutor'] = urlencode($_POST['viniComp']);
$data['viniGrupo'] = urlencode($_POST['viniGrupo']);
$data['viniGenero'] = urlencode($_POST['viniGenero']);
$data['cromosFecha'] = urlencode($_POST['cromosAnyo']);
$data['cromosColeccion'] = urlencode($_POST['cromosColec']);
$data['cromosNcomro'] = urlencode($_POST['cromosNum']);
$data['librosFecha'] = urlencode($_POST['librosAnyo']);
$data['librosAutor'] = urlencode($_POST['librosAutor']);
$data['librosEditorial'] = urlencode($_POST['librosEditorial']);
$data['librosGenero'] = urlencode($_POST['librosGenero']);
$data['librosIdioma'] = urlencode($_POST['librosIdioma']);
$data['trasteroFecha'] = urlencode($_POST['trasteroAnyo']);
$data['trasteroOrigen'] = urlencode($_POST['trasteroOrigen']);

echo json_encode($data);
?>