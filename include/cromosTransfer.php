<?php
class cromosTransfer{
	
	private $id;
	private $anyo;
	private $coleccion;
	private $nCromo;

	public function __construct($id, $anyo, $coleccion, $nCromo){
		$this->id = $id;
		$this->anyo = $anyo;
		$this->coleccion = $coleccion;
		$this->nCromo = $nCromo;
	}

	public function getId(){
		return $this->id;
	}

	public function getAnyo(){
		return $this->anyo;
	}

	public function getColeccion(){
		return $this->coleccion;
	}

	public function getNCromo(){
		return $this->nCromo;
	}

	public function setId($id){
		$this->id = $id ;
	}

	public function setAnyo($anyo){
		$this->anyo = $anyo ;
	}

	public function setColeccion($coleccion){
		$this->coleccion = $coleccion ;
	}

	public function setNCromo($nCromo){
		$this->nCromo = $nCromo ;
	}
}


?>
