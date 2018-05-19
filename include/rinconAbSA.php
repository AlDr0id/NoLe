<?php
//session_start();
require_once('rinconAbTransfer.php');
require_once('rinconAbDAO.php');

class rinconAbSA {

    // Atributos
    protected $dao;

    // métodos
    public function getProductoRinconAb($id) {
      if(!$this->dao) {
          $this->dao = new rinconAbDAO();
        }
      $aux = $this->dao;
      return $aux->getRinconAb($id);
    }

    public function newProductoRinconAb(rinconAbTransfer $producto) {
       if(!$this->dao) {
          $this->dao= new rinconAbDAO();
        }
         $aux = $this->dao;

      return $aux->newRinconAb($producto);
    }

    public function editProductoRinconAb(rinconAbTransfer $producto) {

      if(!$this->dao) {
          $this->dao = new rinconAbDAO();
        }
      $aux = $this->dao;
      return $aux->editRinconAb($producto);
    }

}

?>
