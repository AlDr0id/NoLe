<?php
require_once('cromosTransfer.php');
require_once('DAO.php');

class cromosDAO extends DAO{

    // m�todos
    public function getCromos($id) {
        //conexi�n bbdd
      if($ok = parent::conectar()) {
        //consulta del usuario
        $sql = "SELECT Id, Anyo, Coleccion, Ncromo_idcromo from cromos where Id = '$id'";
        $consulta = mysqli_query($this->db, $sql);
        if(mysqli_num_rows($consulta) > 0){
            $fila = mysqli_fetch_assoc($consulta);
            parent::desconectar();
            return new cromosTransfer($fila["Id"], $fila["Anyo"], $fila["Coleccion"], $fila["Ncromo_idcromo"]);
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
      $sql = "SELECT * from producto_ofrecido WHERE (Categoria = 5) ORDER BY Fecha DESC LIMIT ".$cantidad;
      
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


    public function newCromos(cromosTransfer $cromos) {
          //conexi�n bbdd
      if($ok = parent::conectar()) {
        $id = $cromos->getId();
        if($id != -1) {
           $anyo = $cromos->getAnyo();
           $coleccion = $cromos->getColeccion();
           $nCromo = $cromos->getNCromo();
            //consulta del usuario
            $sql = "INSERT INTO cromos (Id, Anyo, Coleccion, Ncromo_idcromo) VALUES ('$id', '$anyo', '$coleccion', '$nCromo')";
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

    private function nextIdCromos() {
      //conexi�n bbdd
      if($ok = parent::conectar()) {
        //consulta del usuario
        $sql = "SELECT MAX(Id) from cromos";
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

    public function editCromos(cromosTransfer $cromos) {
           //conexi�n bbdd
      if($ok = parent::conectar()) {

       $id = $cromos->getId();
       $anyo = $cromos->getAnyo();
       $coleccion = $cromos->getColeccion();
       $nCromo = $cromos->getNCromo();
        //consulta del usuario
        $sql = "UPDATE cromos SET Anyo = '$anyo', Coleccion = '$coleccion', Ncromo_idcromo = '$nCromo' WHERE Id = '$id'";
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

