<?php
class rinconAbTransfer{
	
	private $id;
	private $tipo;
	private $origen;
	
	public function __construct($id, $tipo, $origen){
		$this->id = $id;
		$this->tipo = $tipo;
		$this->origen = $origen;
	}

	public function getId(){
		return $this->id;
	}

	public function getTipo(){
		return $this->tipo;
	}

	public function getOrigen(){
		return $this->origen;
	}

	public function setId($id){
		$this->id = $id ;
	}

	public function setTipo($tipo){
		$this->tipo = $tipo ;
	}

	public function setOrigen($origen){
		$this->origen = $origen ;
	}

}


?>
