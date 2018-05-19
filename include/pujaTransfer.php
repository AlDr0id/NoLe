<?php
class pujaTransfer{
	
	private $id;
	private $idProducto;
	private $idPostor;
	private $precio;
	private $idTrueque;
	private $fecha;
	private $estado;
	private $idVendedor;
	private $valorada;
	public function __construct($id, $idProducto, $idVendedor, $idPostor, $precio, $idTrueque, $fecha, $estado, $valorada){
		$this->id = $id;
		$this->idProducto = $idProducto;
		$this->idPostor = $idPostor;
		$this->precio = $precio;
		$this->idTrueque = $idTrueque;
		$this->fecha = $fecha;
		$this->estado = $estado;
		$this->idVendedor = $idVendedor;
		$this->valorada = $valorada;
	}

	public function getId(){
		return $this->id;
	}

	public function getIdProducto(){
		return $this->idProducto;
	}

	public function getIdVendedor(){
		return $this->idVendedor;
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

	public function getValorada(){
		return $this->valorada;
	}

	public function setId($id){
		$this->id = $id ;
	}

	public function setIdProducto($idProducto){
		$this->idProducto = $idProducto;
	}

	public function setIdVendedor($idVendedor){
		$this->idVendedor = $idVendedor;
	}

	public function setIdPostor($idPostor){
		$this->idPostor = $idPostor ;
	}

	public function setPrecio($precio){
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

	public function setValorada($valorada){
		$this->valorada = $valorada ;
	}

}


?>