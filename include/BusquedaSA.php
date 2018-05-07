<?php
/*session_start();*/

require_once('BusquedaDAO.php');

class BusquedaSA {
    // Atributos
    protected $dao;

    // métodos
    //busqueda sencilla por id
    public function getProducto($nombre) {
      if(!$this->dao){
          $this->dao = new BusquedaDAO();
        }
      $aux = $this->dao;

     return $aux->getProducto($nombre);

    }
    //hacer busqueda avanzada
     public function getProductoAvan($argumentos) {
      if(!$this->dao){
          $this->dao = new BusquedaDAO();
        }
      $aux = $this->dao;

     return $aux->getProductoAvan($argumentos);

    }
}

?>
