<?php
//session_start();
require_once('librosComicsTransfer.php');
require_once('librosComicsDAO.php');

class librosComicsSA {

    // Atributos
    protected $dao;

    // métodos
    public function getProductoLibrosComics($id) {
      if(!$this->dao) {
          $this->dao = new librosComicsDAO();
        }
      $aux = $this->dao;
      return $aux->getLibrosComics($id);
    }

    public function newProductoLibrosComics(librosComicsTransfer $producto) {
       if(!$this->dao) {
          $this->dao= new librosComicsDAO();
        }
         $aux = $this->dao;

      return $aux->newLibrosComics($producto);
    }

    public function editProductoLibrosComics(librosComicsTransfer $producto) {

      if(!$this->dao) {
          $this->dao = new librosComicsDAO();
        }
      $aux = $this->dao;
      return $aux->editLibrosComics($producto);
    }

}

?>
