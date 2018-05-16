<?php
class figurasTransfer{
	
	private $id;
	private $alto;
	private $ancho;
	private $largo;
	private $tema;
	private $material;
	private $fabricante;

	public function __construct($id, $alto, $ancho, $largo, $tema, $material, $fabricante){
		$this->id = $id;
		$this->alto = $alto;
		$this->ancho = $ancho;
		$this->largo = $largo;
		$this->tema = $tema;
		$this->material = $material;
		$this->fabricante = $fabricante;
	}

	public function getId(){
		return $this->id;
	}

	public function getAlto(){
		return $this->alto;
	}

	public function getAncho(){
		return $this->ancho;
	}

	public function getLargo(){
		return $this->largo;
	}

	public function getTema(){
		return $this->tema;
	}

	public function getMaterial(){
		return $this->material;
	}

	public function getFabricante(){
		return $this->fabricante;
	}

	public function setId($id){
		$this->id = $id ;
	}

	public function setAlto($alto){
		$this->alto = $alto ;
	}

	public function setAncho($ancho){
		$this->ancho = $ancho ;
	}

	public function setLargo($largo){
		$this->largo = $largo ;
	}

	public function setTema($tema){
		$this->tema = $tema ;
	}

	public function setMaterial($material){
		$this->material = $material ;
	}

	public function setFabricante($fabricante){
		$this->fabricante = $fabricante ;
	}

}


?>
