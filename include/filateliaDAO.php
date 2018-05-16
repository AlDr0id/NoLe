<?php
require_once('filateliaTransfer.php');
require_once('DAO.php');

class filateliaDAO extends DAO{

    // m�todos
    public function getFilatelia($id) {
        //conexi�n bbdd
      if($ok = parent::conectar()) {
        //consulta del usuario
        $sql = "SELECT Id, Anyo, Pais from filatelia where Id = '$id'";
        $consulta = mysqli_query($this->db, $sql);
        if(mysqli_num_rows($consulta) > 0){
            $fila = mysqli_fetch_assoc($consulta);
            parent::desconectar();
            return new filateliaTransfer($fila["Id"], $fila["Anyo"], $fila["Pais"]);
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
      //conexi�n bbdd
    if($ok = parent::conectar()) {
      //consulta del usuario
      $sql = "SELECT * from producto_ofrecido WHERE (Categoria = 3) ORDER BY Fecha DESC LIMIT ".$cantidad;
      
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


    public function newFilatelia(filateliaTransfer $filatelia) {
          //conexi�n bbdd
      if($ok = parent::conectar()) {
        $id = $filatelia->getId();
        if($id != -1) {
           $anyo = $filatelia->getAnyo();
           $pais = $filatelia->getPais();
           
            //consulta del usuario
            $sql = "INSERT INTO filatelia (Id, Anyo, Pais) VALUES ('$id', '$anyo', '$pais')";
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

    private function nextIdFilatelia() {
      //conexi�n bbdd
      if($ok = parent::conectar()) {
        //consulta del usuario
        $sql = "SELECT MAX(Id) from filatelia";
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

    public function editFilatelia(filateliaTransfer $filatelia) {
           //conexi�n bbdd
      if($ok = parent::conectar()) {

       $id = $filatelia->getId();
       $anyo = $filatelia->getAnyo();
       $pais = $filatelia->getColeccion();
        //consulta del usuario
        $sql = "UPDATE filatelia SET Anyo = '$anyo', Pais = '$pais' WHERE Id = '$id'";
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

