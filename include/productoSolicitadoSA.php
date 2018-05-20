<?php
/*session_start();*/

require_once('productoSolicitadoDAO.php');
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
}

   $productoSolSA = new productoSolicitadoSA();
   $producto=new productoOfreTransfer(16,"tito",'marvel per' ,0,'2018-05-17 00:00:00
','1','5' ,'asas','0');
   $productoSolSA->comprobarProducto($producto);

?>
