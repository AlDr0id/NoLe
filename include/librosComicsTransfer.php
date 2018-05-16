<?php
class librosComicsTransfer{
	
	private $id;
	private $anyo;
	private $autor;
	private $editorial;
	private $genero;
	private $idioma;
	private $formato;

	public function __construct($id, $anyo, $autor, $editorial, $genero, $idioma, $formato){
		$this->id = $id;
		$this->anyo = $anyo;
		$this->autor = $autor;
		$this->editorial = $editorial;
		$this->genero = $genero;
		$this->idioma = $idioma;
		$this->formato = $formato;
	}

	public function getId(){
		return $this->id;
	}

	public function getAnyo(){
		return $this->anyo;
	}

	public function getAutor(){
		return $this->autor;
	}

	public function getEditorial(){
		return $this->editorial;
	}

	public function getGenero(){
		return $this->genero;
	}

	public function getIdioma(){
		return $this->idioma;
	}

	public function getFormato(){
		return $this->formato;
	}

	public function setId($id){
		$this->id = $id ;
	}

	public function setAnyo($anyo){
		$this->anyo = $anyo ;
	}

	public function setAutor($autor){
		$this->autor = $autor ;
	}

	public function setEditorial($editorial){
		$this->editorial = $editorial ;
	}

	public function setGenero($genero){
		$this->genero = $genero ;
	}

	public function setIdioma($idioma){
		$this->idioma = $idioma ;
	}

	public function setFormato($formato){
		$this->formato = $formato ;
	}

}


?>
