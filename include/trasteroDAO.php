<?php
require_once('trasteroTransfer.php');
require_once('DAO.php');

class trasteroDAO extends DAO{

    // m�todos
    public function getTrastero($id) {
        //conexi�n bbdd
      if($ok = parent::conectar()) {
        //consulta del usuario
        $sql = "SELECT Id, Anyo, Origen from trastero where Id = '$id'";
        $consulta = mysqli_query($this->db, $sql);
        if(mysqli_num_rows($consulta) > 0){
            $fila = mysqli_fetch_assoc($consulta);
            parent::desconectar();
            return new trasteroTransfer($fila["Id"], $fila["Anyo"], $fila["Origen"]);
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
      $sql = "SELECT * from producto_ofrecido WHERE (Categoria = 7) ORDER BY Fecha DESC LIMIT ".$cantidad;
      
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


    public function newTrastero(trasteroTransfer $trastero) {
          //conexi�n bbdd
      if($ok = parent::conectar()) {
        $id = $trastero->getId();
        if($id != -1) {
           $anyo = $trastero->getAnyo();
           $pais = $trastero->getOrigen();
          
            //consulta del usuario
            $sql = "INSERT INTO trastero (Id, Anyo, Origen) VALUES ('$id', '$anyo', '$pais')";
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

    private function nextIdTrastero() {
      //conexi�n bbdd
      if($ok = parent::conectar()) {
        //consulta del usuario
        $sql = "SELECT MAX(Id) from trastero";
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

    public function editTrastero(trasteroTransfer $trastero) {
           //conexi�n bbdd
      if($ok = parent::conectar()) {

       $id = $trastero->getId();
       $anyo = $trastero->getAnyo();
       $pais = $trastero->getPais();
       
        //consulta del usuario
        $sql = "UPDATE trastero SET Anyo = '$anyo', Pais = '$pais' WHERE Id = '$id'";
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

