<?php
//session_start();
require_once('filateliaTransfer.php');
require_once('filateliaDAO.php');

class filateliaSA {

    // Atributos
    protected $dao;

    // métodos
    public function getProductoFilatelia($id) {
      if(!$this->dao) {
          $this->dao = new filateliaDAO();
        }
      $aux = $this->dao;
      return $aux->getFilatelia($id);
    }

    public function newProductoFilatelia(filateliaTransfer $producto) {
       if(!$this->dao) {
          $this->dao= new filateliaDAO();
        }
         $aux = $this->dao;

      return $aux->newFilatelia($producto);
    }

    public function editProductoFilatelia(filateliaTransfer $producto) {

      if(!$this->dao) {
          $this->dao = new filateliaDAO();
        }
      $aux = $this->dao;
      return $aux->editFilatelia($producto);
    }

}

?>
