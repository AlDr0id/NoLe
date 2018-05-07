<?php
require_once('numismaticaTransfer.php');
require_once('DAO.php');

class numismaticaDAO extends DAO{

    // métodos
    public function getNumismatica($id) {
        //conexión bbdd
      if($ok = parent::conectar()) {
        //consulta del usuario
        $sql = "SELECT Id, Pais, Anyo, Conservacion from numismatica where Id = '$id'";
        $consulta = mysqli_query($this->db, $sql);
        if(mysqli_num_rows($consulta) > 0){
            $fila = mysqli_fetch_assoc($consulta);
            parent::desconectar();
            return new numismaticaTransfer($fila["Id"], $fila["Pais"], $fila["Anyo"], $fila["Conservacion"]);
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
      $sql = "SELECT * from producto_ofrecido WHERE (Categoria = NUMISMATICA) ORDER BY Fecha DESC LIMIT ".$cantidad;
      //$sql = "SELECT * from numismatica join producto_ofrecido on numismatica.Id = producto_ofrecido.ID ORDER BY producto_ofrecido.Fecha DESC LIMIT ".$cantidad;
      $consulta = mysqli_query($this->db, $sql);
      if(mysqli_num_rows($consulta) > 0) {  //devuelve error si no devuelve ninguna fila
        $productos = array();
        while($fila = mysqli_fetch_assoc($consulta)) {
          $producto = new productoOfreTransfer($fila["ID"], $fila["Usuario"], $fila["Nombre"], $fila["Categoria"], $fila["Fecha"], $fila["Disponible"], $fila["Precio"], $fila["Descripcion"]);
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


    public function newNumismatica(numismaticaTransfer $numis) {
          //conexión bbdd
      if($ok = parent::conectar()) {
        $id = $numis->getId();
        if($id != -1) {
           $pais = $numis->getPais();
           $anyo = $numis->getAño();
           $conservacion = $numis->getConservacion();
            //consulta del usuario
            $sql = "INSERT INTO numismatica (Id, Pais, Anyo, Conservacion) VALUES ('$id', '$pais', '$anyo', '$conservacion')";
            $consulta = mysqli_query($this->db, $sql);
            if($consulta) {
                 parent::desconectar();
                 return true;
            }
            else {
              parent::desconectar();
              return false;
            }
        }
        else {
          parent::desconectar();
          return false;
        }
    }
    else {
      parent::desconectar();
      return false;
    }
  }

    private function nextIdNumisatica() {
      //conexión bbdd
      if($ok = parent::conectar()) {
        //consulta del usuario
        $sql = "SELECT MAX(Id) from numismatica";
        $consulta = mysqli_query($this->db, $sql);
        if($consulta) {
            $fila = mysqli_fetch_assoc($consulta);
             //parent::desconectar();
            return $fila["MAX(Id)"] + 1;
        }
        else {
         return -1;
        }
      }
      else
        return -1;
    }

    public function editNumismatica(numismaticaTransfer $numis) {
           //conexión bbdd
      if($ok = parent::conectar()) {

       $id = $numis->getId();
       $pais = $numis->getPais();
       $anyo = $numis->getAño();
       $conservacion = $numis->getConservacion();
        //consulta del usuario
        $sql = "UPDATE numismatica SET Pais = '$pais', Anyo = '$anyo', Conservacion = '$conservacion' WHERE Id = '$id'";
        $consulta = mysqli_query($this->db, $sql);
        if($consulta) {
             parent::desconectar();
             return true;
        }
        else {
          parent::desconectar();
          return false;
        }

      }
      else
        return false;
    }

}

?>
