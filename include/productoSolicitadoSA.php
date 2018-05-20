<?php
/*session_start();*/

require_once('productoSolicitadoDAO.php');
require_once('productoSolicitadoTransfer.php');
require_once('productoOfreTransfer.php');


class productoSolicitadoSA {
    // Atributos
    protected $dao;

    // métodos
   public function comprobarProducto(productoOfreTransfer $producto) {
      if(!$this->dao){
          $this->dao = new productoSolicitadoDAO();
        }
      $aux = $this->dao;
     return $aux->comprobarProducto($producto);
    }
    public function newProducto(productoSolicitadoTransfer $producto) {
       if(!$this->dao){
          $this->dao= new productoSolicitadoDAO();
        }
         $aux= $this->dao;

      return $aux->newProducto($producto);
    }
}


?>
