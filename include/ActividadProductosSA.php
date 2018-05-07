<?php

require_once('ActividadProductosDAO.php');
require_once('productoOfreTransfer.php');
class ActividadProductosSA {
    // Atributos
    protected $dao;

    //
    public function getLista($nickname) {
      if(!$this->dao){
          $this->dao = new ActividadProductosDAO();
        }
      $aux = $this->dao;

     return $aux->notificaciones($nickname);

    }
  
}

$pepe=new ActividadProductosSA();
$lista=$pepe->getLista("a");

?>