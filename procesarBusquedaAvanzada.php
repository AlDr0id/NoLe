<?php 
$data = array();


$data['nombre'] = $_POST['nomProd'];
$data['preciomin'] = $_POST['minPre'];
$data['preciomax'] = $_POST['maxPre'];
$data['Categoria'] = $_POST['cateP'];
$data['numiFecha'] = $_POST['anio'];
$data['numiconservacion'] = $_POST['cons'];
$data['numipais'] = $_POST['pais'];
$data['rdlaTipo'] = $_POST['rclaTipo'];
$data['rdlaOrigen'] = $_POST['rclaOrigen'];
$data['figTema'] = $_POST['figTema'];
$data['figMaterial'] = $_POST['figMaterial'];
$data['figFabricante'] = $_POST['figFabricante'];
$data['filPais'] = $_POST['filPais'];
$data['filFecha'] = $_POST['filAnyo'];
$data['viniFecha'] = $_POST['viniAnyo'];
$data['viniAutor'] = $_POST['viniComp'];
$data['viniGrupo'] = $_POST['viniGrupo'];
$data['viniGenero'] = $_POST['viniGenero'];
$data['cromosFecha'] = $_POST['cromosAnyo'];
$data['cromosColeccion'] = $_POST['cromosColec'];
$data['cromosNcomro'] = $_POST['cromosNum'];
$data['librosFecha'] = $_POST['librosAnyo'];
$data['librosAutor'] = $_POST['librosAutor'];
$data['librosEditorial'] = $_POST['librosEditorial'];
$data['librosGenero'] = $_POST['librosGenero'];
$data['librosIdioma'] = $_POST['librosIdioma'];
$data['trasteroFecha'] = $_POST['trasteroAnyo'];
$data['trasteroOrigen'] = $_POST['trasteroOrigen'];

echo json_encode($data);
?>