<?php
//session_start();
require_once('productoOfreTransfer.php');
require_once('productoOfreDAO.php');

class productoOfreSA {
    // No hemos puesto que extienda de un SA como DAO porque cada uno va a ser muy diferente
    // Si se ve que se pueden agrupar funciones, se extenderá de un SA que crearemos

    // Atributos
    protected $dao;

    // métodos
    public function getProducto($id) {
      if(!$this->dao){
          $this->dao= new productoOfreDAO();
        }
      $aux= $this->dao;
      return $aux->getProducto($id);
    }

    public function getProductoUsuarioPuja($idUsuario) { // Esta función y la siguiente, tanto en el DAO como en el SA,
      //pueden ser una con un parámetro(el estado) que te diga si quieres buscar productos del inventario o que esten en pujua
      if(!$this->dao){
          $this->dao= new productoOfreDAO();
        }
      $aux= $this->dao;
      return $aux->getProductoUsuarioPuja($idUsuario); // Devuelve un array con todos los productos que pertenecen a idUsuario
    }

    public function getProductoUsuarioInventario($idUsuario) {
      if(!$this->dao){
          $this->dao= new productoOfreDAO();
        }
      $aux= $this->dao;
      return $aux->getProductoUsuarioInventario($idUsuario); // Devuelve un array con todos los productos que pertenecen a idUsuario
    }

    public function getLastProducts($num) {
      if(!$this->dao){
          $this->dao= new productoOfreDAO();
        }
      $aux= $this->dao;

      return $aux->getLastProducts($num); // Devuelve un array con los $num ultimos elementos
    }

    public function newProducto(productoOfreTransfer $producto) {
       if(!$this->dao){
          $this->dao= new productoOfreDAO();
        }
         $aux= $this->dao;

      return $aux->newProducto($producto);
    }

    public function editProducto(productoOfreTransfer $producto) {

      if(!$this->dao){
          $this->dao= new productoOfreDAO();
        }
          $aux= $this->dao;
      return $aux->editProducto($producto);
    }
    public function deleteProducto($idProducto) {

      if(!$this->dao){
          $this->dao= new productoOfreDAO();
        }
          $aux= $this->dao;
      return $aux->deleteProducto($idProducto);
    }
    public function  eliminarProductos($idUsuario){
        if(!$this->dao){
          $this->dao= new productoOfreDAO();
        }
          $aux= $this->dao;
      return $aux->eliminarProductos($idUsuario);
    }

}

?>
