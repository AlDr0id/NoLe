<?php
class vinilosDiscosTransfer{
	
	private $id;
	private $anyo;
	private $autorCompositor;
	private $grupoCantante;
	private $genero;

	public function __construct($id, $anyo, $autorCompositor, $grupoCantante, $genero){
		$this->id = $id;
		$this->anyo = $anyo;
		$this->autorCompositor = $autorCompositor;
		$this->grupoCantante = $grupoCantante;
		$this->genero = $genero;
	}

	public function getId(){
		return $this->id;
	}

	public function getAnyo(){
		return $this->anyo;
	}

	public function getAutorCompositor(){
		return $this->autorCompositor;
	}

	public function getGrupoCantante(){
		return $this->grupoCantante;
	}

	public function getGenero(){
		return $this->genero;
	}

	public function setId($id){
		$this->id = $id ;
	}

	public function setAnyo($anyo){
		$this->anyo = $anyo ;
	}

	public function setautorCompositor($autorCompositor){
		$this->autorCompositor = $autorCompositor ;
	}

	public function setGrupoCantante($grupoCantante){
		$this->grupoCantante = $grupoCantante ;
	}

	public function setGenero($genero){
		$this->genero = $genero ;
	}

}


?>
