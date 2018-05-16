<?php
//session_start();
require_once('vinilosDiscosTransfer.php');
require_once('vinilosDiscosDAO.php');

class vinilosDiscosSA {

    // Atributos
    protected $dao;

    // métodos
    public function getProductoVinilosDiscos($id) {
      if(!$this->dao) {
          $this->dao = new vinilosDiscosDAO();
        }
      $aux = $this->dao;
      return $aux->getVinilosDiscos($id);
    }

    public function newProductoVinilosDiscos(vinilosDiscosTransfer $producto) {
       if(!$this->dao) {
          $this->dao= new vinilosDiscosDAO();
        }
         $aux = $this->dao;

      return $aux->newVinilosDiscos($producto);
    }

    public function editProductoVinilosDiscos(vinilosDiscosTransfer $producto) {

      if(!$this->dao) {
          $this->dao = new vinilosDiscosDAO();
        }
      $aux = $this->dao;
      return $aux->editVinilosDiscos($producto);
    }

}

?>
