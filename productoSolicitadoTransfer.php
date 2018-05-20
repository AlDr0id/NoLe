<?php
class productoSolicitadoTransfer {
    // atributos
    private $id;
    private $id_user;
    private $nombreP;
    private $categoria;
    private $id_Producto;
    private $activo;
    private $palabrasClave;
    // constantes
     public function __construct( $id, $id_user, $nombreP, $categoria, $id_Producto, $activo, $palabrasClave) {
         $this->id = $id;
         $this->id_user = $id_user;
         $this->nombreP = $nombreP;
         $this->categoria = $categoria;
         $this->id_Producto = $id_Producto;
         $this->activo = $activo;
         $this->palabrasClave = $palabrasClave;
    }

    //métodos
    public function getId() {
        return $this->id;
    }

    public function getId_user() {
        return $this->id_user;
    }

    public function getNombreP() {
        return $this->nombreP;
    }

    public function getCategoria() {
        return $this->categoria;
    }

    public function getId_Producto() {
        return $this->id_Producto;
    }

    public function getActivo() {
        return $this->activo;
    }

    public function getPalabrasClave() {
        return $this->palabrasClave;
    }







    public function setId($id) {
         $this->id = $id;
    }

    public function setId_user($id_user) {
         $this->id_user = $id_user;
    }

    public function SetNombreP($nombreP) {
         $this->nombreP = $nombreP;
    }

    public function setCategoria($categoria) {
         $this->categoria = $categoria;
    }

    public function setId_Producto($id_Producto) {
         $this->id_Producto = $id_Producto;
    }

    public function setActivo($activo) {
        $this->activo = $activo;
    }

     public function setPalabrasClave($palabrasClave) {
        $this->palabrasClave = $palabrasClave;
    }
}

?>
