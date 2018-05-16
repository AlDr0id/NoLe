<?php
class filateliaTransfer{
	
	private $id;
	private $anyo;
	private $pais;

	public function __construct($id, $anyo, $pais){
		$this->id = $id;
		$this->anyo = $anyo;
		$this->pais = $pais;
		
	}

	public function getId(){
		return $this->id;
	}

	public function getAnyo(){
		return $this->anyo;
	}

	public function getPais(){
		return $this->pais;
	}

	public function setId($id){
		$this->id = $id ;
	}

	public function setAnyo($anyo){
		$this->anyo = $anyo ;
	}

	public function setPais($pais){
		$this->pais = $pais ;
	}


}


?>
