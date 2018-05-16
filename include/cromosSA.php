<?php
//session_start();
require_once('cromosTransfer.php');
require_once('cromosDAO.php');

class cromosSA {

    // Atributos
    protected $dao;

    // métodos
    public function getProductoCromos($id) {
      if(!$this->dao) {
          $this->dao = new cromosDAO();
        }
      $aux = $this->dao;
      return $aux->getCromos($id);
    }

    public function newProductoCromos(cromosTransfer $producto) {
       if(!$this->dao) {
          $this->dao= new cromosDAO();
        }
         $aux = $this->dao;

      return $aux->newCromos($producto);
    }

    public function editProductoCromos(cromosTransfer $producto) {

      if(!$this->dao) {
          $this->dao = new cromosDAO();
        }
      $aux = $this->dao;
      return $aux->editCromos($producto);
    }

}

?>
