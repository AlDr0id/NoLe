<?php
//session_start();
require_once('figurasTransfer.php');
require_once('figurasDAO.php');

class figurasSA {

    // Atributos
    protected $dao;

    // métodos
    public function getProductoFiguras($id) {
      if(!$this->dao) {
          $this->dao = new figurasDAO();
        }
      $aux = $this->dao;
      return $aux->getFiguras($id);
    }

    public function newProductoFiguras(figurasTransfer $producto) {
       if(!$this->dao) {
          $this->dao= new figurasDAO();
        }
         $aux = $this->dao;

      return $aux->newFiguras($producto);
    }

    public function editProductoFiguras(figurasTransfer $producto) {

      if(!$this->dao) {
          $this->dao = new figurasDAO();
        }
      $aux = $this->dao;
      return $aux->editFiguras($producto);
    }

}

?>
