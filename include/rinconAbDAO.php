<?php
require_once('rinconAbTransfer.php');
require_once('DAO.php');

class rinconAbDAO extends DAO{

    // m�todos
    public function getRinconAb($id) {
        //conexi�n bbdd
      if($ok = parent::conectar()) {
        //consulta del usuario
        $sql = "SELECT Id, Tipo, Origen from rincon_de_la_abuela where Id = '$id'";
        $consulta = mysqli_query($this->db, $sql);
        if(mysqli_num_rows($consulta) > 0){
            $fila = mysqli_fetch_assoc($consulta);
            parent::desconectar();
            return new rinconAbTransfer($fila["Id"], $fila["Tipo"], $fila["Origen"]);
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
      $sql = "SELECT * from producto_ofrecido WHERE (Categoria = 1) ORDER BY Fecha DESC LIMIT ".$cantidad;
      
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


    public function newRinconAb(rinconAbTransfer $rinconAb) {
          //conexi�n bbdd
      if($ok = parent::conectar()) {
        $id = $rinconAb->getId();
        if($id != -1) {
           $tipo = $rinconAb->getTipo();
           $origen = $rinconAb->getOrigen();
           
            //consulta del usuario
            $sql = "INSERT INTO rincon_de_la_abuela (Id, Tipo, Origen) VALUES ('$id', '$tipo', '$origen')";
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

    private function nextIdRinconAb() {
      //conexi�n bbdd
      if($ok = parent::conectar()) {
        //consulta del usuario
        $sql = "SELECT MAX(Id) from rincon_de_la_abuela";
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

    public function editRinconAb(rinconAbTransfer $rinconAb) {
           //conexi�n bbdd
      if($ok = parent::conectar()) {

       $id = $rinconAb->getId();
       $tipo = $rinconAb->getTipo();
       $origen = $rinconAb->getOrigen();
       
        //consulta del usuario
        $sql = "UPDATE rincon_de_la_abuela SET Tipo = '$tipo', Origen = '$origen' WHERE Id = '$id'";
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

