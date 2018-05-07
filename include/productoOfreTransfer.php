<?php
class productoOfreTransfer {
    // atributos
    private $id;
    private $owner;
    private $nombre;
    private $categoria;
    private $fechaSalida;
    private $disponible;
    private $precio;
    private $descripcion;
    private $enPuja;
    // constantes
     public function __construct( $id, $owner, $nombre, $categoria, $fechaSalida, $disponible, $precio, $descripcion, $enPuja) {
         $this->id = $id;
         $this->nombre = $nombre;
         $this->owner = $owner;
         $this->categoria = $categoria;
         $this->fechaSalida = $fechaSalida;
         $this->disponible = $disponible;
         $this->precio = $precio;
         $this->descripcion = $descripcion;
         $this->enPuja = $enPuja;
    }

    //métodos
    public function getId() {
        return $this->id;
    }

    public function getOwner() {
        return $this->owner;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getCategoria() {
        return $this->categoria;
    }

    public function getFechaSalida() {
        return $this->fechaSalida;
    }

    public function getDisponible() {
        return $this->disponible;
    }

    public function getPrecio() {
        return $this->precio;
    }

    public function getDescripcion() {
        return $this->descripcion;
    }

    public function getDescripcionCorta() {
        $desc = "";
        $i = 0;
        //$desc = array_slice($this->descripcion, 27) . "...";
        while ($i < strlen($this->descripcion) && $i < 100) {
          $desc .= $this->descripcion[$i];
          $i++;
        }
        if($i >= 27) {
          $desc .= "...";
        }

        return $desc;
    }

    public function getEnPuja(){
        return $this->enPuja;
    }


    public function setId($id) {
         $this->id = $id;
    }

    public function setOwner($owner) {
         $this->owner = $owner;
    }

    public function setNombre($nombre) {
         $this->nombre = $nombre;
    }

    public function setCorreo($categoria) {
         $this->categoria = $categoria;
    }

    public function setFechaSalida($fechaSalida) {
         $this->fechaSalida = $fechaSalida;
    }

    public function setDisponible($disponible) {
        $this->disponible = $disponible;
    }

     public function setPrecio($precio) {
        $this->precio = $precio;
    }

     public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    public function setEnPuja($enPuja){
        $this->enPuja = $enPuja;
    }
    public function setCategoria($categoria) {
         $this->categoria = $categoria;
    }
}

?>
