<?php
//session_start();
require_once('trasteroTransfer.php');
require_once('trasteroDAO.php');

class trasteroSA {

    // Atributos
    protected $dao;

    // métodos
    public function getProductoTrastero($id) {
      if(!$this->dao) {
          $this->dao = new trasteroDAO();
        }
      $aux = $this->dao;
      return $aux->getTrastero($id);
    }

    public function newProductoTrastero(trasteroTransfer $producto) {
       if(!$this->dao) {
          $this->dao= new trasteroDAO();
        }
         $aux = $this->dao;

      return $aux->newTrastero($producto);
    }

    public function editProductoTrastero(trasteroTransfer $producto) {

      if(!$this->dao) {
          $this->dao = new trasteroDAO();
        }
      $aux = $this->dao;
      return $aux->editTrastero($producto);
    }

}

?>
