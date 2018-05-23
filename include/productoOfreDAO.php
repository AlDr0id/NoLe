<?php
require_once('productoOfreTransfer.php');
require_once('DAO.php');

class productoOfreDAO extends DAO{

    // métodos
    public function getProducto($id) {
        //conexión bbdd
      if($ok = parent::conectar()) {
        //consulta del usuario
        $sql = "SELECT * from producto_ofrecido where ID = '$id'";
        $consulta = mysqli_query($this->db, $sql);
        if(mysqli_num_rows($consulta) > 0) {
             $fila = mysqli_fetch_assoc($consulta);
             parent::desconectar();
            return new productoOfreTransfer($fila["ID"], $fila["Usuario"], $fila["Nombre"], $fila["Categoria"], $fila["Fecha"], $fila["Disponible"], $fila["Precio"], $fila["Descripcion"], $fila["EnPuja"]);
        }
        else {
        parent::desconectar();
         return NULL;
        }
      }
      else {
        return NULL;
      }
    }

    public function getProductoUsuarioPuja($idUsuario) {
      //conexión bbdd
    if($ok = parent::conectar()) {
      //consulta del usuario
      $sql = "SELECT * from producto_ofrecido WHERE Usuario = '".$idUsuario."' AND EnPuja = 1";
      $consulta = mysqli_query($this->db, $sql);
      if(mysqli_num_rows($consulta) > 0) {  //devuelve error si no devuelve ninguna fila
        $productos = array();
        while( $fila = mysqli_fetch_assoc($consulta)) {
          $producto = new productoOfreTransfer($fila["ID"], $fila["Usuario"], $fila["Nombre"], $fila["Categoria"], $fila["Fecha"], $fila["Disponible"], $fila["Precio"], $fila["Descripcion"], $fila["EnPuja"]);
          $productos[] = $producto;
        }

           parent::desconectar();
           return $productos;
      }
      else {
        parent::desconectar();
        return NULL;
      }
    }
    else
      return NULL;
  }

  public function getProductoUsuarioInventario($idUsuario) {
    //conexión bbdd
  if($ok = parent::conectar()) {
    //consulta del usuario
    $sql = "SELECT * from producto_ofrecido WHERE Usuario = '".$idUsuario."' AND EnPuja = 0";
    $consulta = mysqli_query($this->db, $sql);
    if(mysqli_num_rows($consulta) > 0) {  //devuelve error si no devuelve ninguna fila
      $productos = array();
      while( $fila = mysqli_fetch_assoc($consulta)){
        $producto = new productoOfreTransfer($fila["ID"], $fila["Usuario"], $fila["Nombre"], $fila["Categoria"], $fila["Fecha"], $fila["Disponible"], $fila["Precio"], $fila["Descripcion"], $fila["EnPuja"]);
        $productos[] = $producto;
      }

         parent::desconectar();
         return $productos;
    }
    else{
      parent::desconectar();
      return NULL;
    }
  }
  else
    return NULL;
}

    public function getLastProducts($cantidad) {
        //conexión bbdd
      if($ok = parent::conectar()) {
        //consulta del usuario
        $sql = "SELECT * from producto_ofrecido WHERE EnPuja = 1 ORDER BY Fecha DESC LIMIT ".$cantidad;
        $consulta = mysqli_query($this->db, $sql);
        if(mysqli_num_rows($consulta) > 0) {  //devuelve error si no devuelve ninguna fila
          $productos = array();
          while( $fila = mysqli_fetch_assoc($consulta)) {
            //$descripcionCorta = array_slice($fila["Descripcion"], 27) . "..."; // La descripcion corta seran 30 caracteres incluyendo los puntos suspensivos
            $producto = new productoOfreTransfer($fila["ID"], $fila["Usuario"], $fila["Nombre"], $fila["Categoria"], $fila["Fecha"], $fila["Disponible"], $fila["Precio"], $fila["Descripcion"], $fila["EnPuja"]);
            $productos[] = $producto;
          }

             parent::desconectar();
             return $productos;
        }
        else {
          parent::desconectar();
          return NULL;
        }
      }
      else
        return NULL;
    }

    public function newProducto(productoOfreTransfer $producto) {
          //conexión bbdd
      if($ok = parent::conectar()) {
        $id = $this->nextIdProducto();
        if($id != -1) {
           $nombre = $producto->getNombre();
           $usuario = $producto->getOwner();
           $fechaSalida = $producto->getFechaSalida();
           $disponible = $producto->getDisponible();
           $precio = $producto->getPrecio();
           $descripcion = $producto->getDescripcion();
           $categoria = $producto->getCategoria();
           $enPuja = $producto->getEnPuja();
           //consulta del usuario
           $sql = "INSERT INTO producto_ofrecido (ID, Nombre, Usuario, Fecha, Disponible, Precio, Descripcion, Categoria, EnPuja) VALUES ('$id', '$nombre', '$usuario', '$fechaSalida', '$disponible', '$precio', '$descripcion', '$categoria', '$enPuja')";
           $consulta = mysqli_query($this->db, $sql);
           if($consulta) {
                 parent::desconectar();
                 return $id;
            }
            else{
                // echo mysqli_error($this->db);
                parent::desconectar();
                return $id;
              }
         }
        else {
          parent::desconectar();
          return $id;
        }
      }
      else {
        return $id;
      }
    }

     private function nextIdProducto() {
          //conexión bbdd
          if($ok = parent::conectar()) {
            //consulta del usuario
            $sql = "SELECT MAX(ID) from producto_ofrecido";
            $consulta = mysqli_query($this->db, $sql);
            if(mysqli_num_rows($consulta) > 0) {
                 $fila = mysqli_fetch_assoc($consulta);
                 //parent::desconectar();
                return $fila["MAX(ID)"] + 1;
            }
            else {
              return -1;
            }
          }
          else {
            return -1;
          }
    }

     public function editProducto(productoOfreTransfer $producto) {
           //conexión bbdd
      if($ok = parent::conectar()) {
        $id = $producto->getId();
        $nombre = $producto->getNombre();
        $disponible = $producto->getDisponible();
        $precio = $producto->getPrecio();
        $descripcion = $producto->getDescripcion();
        $enPuja = $producto->getEnPuja();
        $usuario = $producto->getOwner();
        $fechaSalida = $producto->getFechaSalida();

        //consulta del usuario
        $sql = "UPDATE producto_ofrecido SET Nombre = '$nombre', Descripcion = '$descripcion', Disponible = '$disponible', Precio = '$precio', EnPuja = '$enPuja', Fecha = '$fechaSalida', Usuario = '$usuario' WHERE ID = '$id'";
        $consulta = mysqli_query($this->db, $sql);
        if($consulta) { //si la base de datos no se modifica devuelve error
             parent::desconectar();
             return true;
        }
        else {
          parent::desconectar();
          return false;
        }

      }
      else {
        return false;
      }
    }

    public function deleteProducto($idProducto) {
           //conexión bbdd
      if($ok = parent::conectar()) {
        //consulta del usuario
        $sql = "DELETE FROM producto_ofrecido WHERE ID='$idProducto'";
        $consulta = mysqli_query($this->db, $sql);
        if($consulta) { //si la base de datos no se modifica devuelve error
             parent::desconectar();
             return true;
        }
        else {
          parent::desconectar();
          return false;
        }

      }
      else {
        return false;
      }
    }

}

?>
