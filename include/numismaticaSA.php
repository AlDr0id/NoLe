<?php
//session_start();
require_once('numismaticaTransfer.php');
require_once('numismaticaDAO.php');

class numismaticaSA {

    // Atributos
    protected $dao;

    // métodos
    public function getProductoNumi($id) {
      if(!$this->dao) {
          $this->dao = new numismaticaDAO();
        }
      $aux = $this->dao;
      return $aux->getNumismatica($id);
    }

    public function newProductoNumi(numismaticaTransfer $producto) {
       if(!$this->dao) {
          $this->dao= new numismaticaDAO();
        }
         $aux = $this->dao;

      return $aux->newNumismatica($producto);
    }

    public function editProductoNumi(numismaticaTransfer $producto) {

      if(!$this->dao) {
          $this->dao = new numismaticaDAO();
        }
      $aux = $this->dao;
      return $aux->editNumismatica($producto);
    }

}

?>
