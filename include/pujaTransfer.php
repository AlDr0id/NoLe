<?php
class pujaTransfer{
	
	private $id;
	private $idProducto;
	private $idPostor;
	private $precio;
	private $idTrueque;
	private $fecha;
	private $estado;

	public function __construct($id, $idProducto, $idPostor, $precio, $idTrueque, $fecha, $estado){
		$this->id = $id;
		$this->idProducto = $idProducto;
		$this->idPostor = $idPostor;
		$this->precio = $precio;
		$this->idTrueque = $idTrueque;
		$this->fecha = $fecha;
		$this->estado = $estado;
	}

	public function getId(){
		return $this->id;
	}

	public function getIdProducto(){
		return $this->idProducto;
	}

	public function getIdPostor(){
		return $this->idPostor;
	}

	public function getPrecio(){
		return $this->precio;
	}

	public function getIdTrueque(){
		return $this->idTrueque;
	}

	public function getFecha(){
		return $this->fecha;
	}

	public function getEstado(){
		return $this->estado;
	}

	public function setId($id){
		$this->id = $id ;
	}

	public function setIdProd($idProducto){
		$this->idProducto = $idProducto ;
	}

	public function setIdPost($idPostor){
		$this->idPostor = $idPostor ;
	}

	public function setPre($precio){
		$this->precio = $precio ;
	}

	public function setIdTrueque($idTrueque){
		$this->idTrueque = $idTrueque ;
	}

	public function setFecha($fecha){
		$this->fecha = $fecha ;
	}

	public function setEstado($estado){
		$this->estado = $estado ;
	}

}


?>