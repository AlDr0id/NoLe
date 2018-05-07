<?php
class numismaticaTransfer {
    // atributos
    private $id;
    private $pais;
    private $año;
    private $conservacion;

    // constantes
     public function __construct($id, $pais, $año, $conservacion) {
         $this->id = $id;
         $this->pais = $pais;
         $this->año = $año;
         $this->conservacion = $conservacion;
    }

    //métodos
    public function getId() {
        return $this->id;
    }

    public function getPais() {
        return $this->pais;
    }

    public function getAño() {
        return $this->año;
    }

    public function getConservacion() {
        return $this->conservacion;
    }



    public function setId($id) {
         $this->id = $id;
    }

    public function setPais($pais) {
         $this->pais = $pais;
    }

    public function setAño($año) {
         $this->año = $año;
    }

    public function setConservacion($conservacion) {
         $this->conservacion = $conservacion;
    }


}

?>
