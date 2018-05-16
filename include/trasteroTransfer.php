<?php
class trasteroTransfer{
	
	private $id;
	private $anyo;
	private $origen;
	
	public function __construct($id, $anyo, $origen){
		$this->id = $id;
		$this->anyo = $anyo;
		$this->origen = $origen;
	}

	public function getId(){
		return $this->id;
	}

	public function getAnyo(){
		return $this->anyo;
	}

	public function getOrigen(){
		return $this->origen;
	}

	public function setId($id){
		$this->id = $id ;
	}

	public function setAnyo($anyo){
		$this->anyo = $anyo ;
	}

	public function setOrigen($origen){
		$this->origen = $origen ;
	}

}


?>
