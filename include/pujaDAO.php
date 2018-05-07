<?php

require_once('pujaTransfer.php');
require_once('DAO.php');

class pujaDAO extends DAO{

public function getPuja($id) {
        //conexión bbdd
      if($ok = parent::conectar()){
        //consulta del usuario
        $sql = "SELECT * from puja where Id =".$id;
        $consulta = mysqli_query($this->db, $sql);
        if($consulta){
            $fila = mysqli_fetch_assoc($consulta);
            parent::desconectar();
            return new pujaTransfer($fila["Id"], $fila["IdProducto"], $fila["IdPostor"], $fila["Precio"], $fila["IdTrueque"], $fila["Fecha"], $fila["Estado"]);
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

    public function getPujaPostorPendiente($idPostor) {
      //conexión bbdd
      if($ok = parent::conectar()){
        //consulta del usuario
        $sql = "SELECT * from puja where IdPostor = '".$idPostor."' AND Estado = 'PENDIENTE'";
        $consulta = mysqli_query($this->db, $sql);
        if(mysqli_num_rows($consulta) > 0){  //devuelve error si no devuelve ninguna fila
          $pujas = array();
          while( $fila = mysqli_fetch_assoc($consulta)){
            $puja = new pujaTransfer($fila["Id"], $fila["IdProducto"], $fila["IdPostor"], $fila["Precio"], $fila["IdTrueque"], $fila["Fecha"], $fila["Estado"]);
            $pujas[] = $puja;
          }

            parent::desconectar();
            return $pujas;
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

    public function getPujaPostorTerminada($idPostor) {
      //conexión bbdd
      if($ok = parent::conectar()){
        //consulta del usuario
        $sql = "SELECT * from puja where IdPostor = '".$idPostor."' AND Estado != 'PENDIENTE'";
        $consulta = mysqli_query($this->db, $sql);
        if(mysqli_num_rows($consulta) > 0){  //devuelve error si no devuelve ninguna fila
          $pujas = array();
          while( $fila = mysqli_fetch_assoc($consulta)){
            $puja = new pujaTransfer($fila["Id"], $fila["IdProducto"], $fila["IdPostor"], $fila["Precio"], $fila["IdTrueque"], $fila["Fecha"], $fila["Estado"]);
            $pujas[] = $puja;
          }

            parent::desconectar();
            return $pujas;
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


  public function getPujaProducto($idProducto) {
      //conexión bbdd
      if($ok = parent::conectar()){
      //consulta del usuario
      $sql = "SELECT * from puja where IdProducto = ".$idProducto." AND Estado = 'PENDIENTE'";
      $consulta = mysqli_query($this->db, $sql);
      if(mysqli_num_rows($consulta) > 0){  //devuelve error si no devuelve ninguna fila
        $pujas = array();
        while( $fila = mysqli_fetch_assoc($consulta)){
          $puja = new pujaTransfer($fila["Id"], $fila["IdProducto"], $fila["IdPostor"], $fila["Precio"], $fila["IdTrueque"], $fila["Fecha"], $fila["Estado"]);
          $pujas[] = $puja;
        }

          parent::desconectar();
          return $pujas;
      }
      else{
        parent::desconectar();
        return NULL;
      }
  }
    else {
      return NULL;
    }
  }

  public function getPujaVendedor($idVendedor) {
    //conexión bbdd
    if($ok = parent::conectar()){
      //consulta del usuario
      $sql = "SELECT * from producto_ofrecido join puja on producto_ofrecido.ID = puja.IdProducto
       where producto_ofrecido.Usuario = '".$idVendedor." AND puja.Estado = 'PENDIENTE'";
      $consulta = mysqli_query($this->db, $sql);
      if(mysqli_num_rows($consulta) > 0){  //devuelve error si no devuelve ninguna fila
        $pujas = array();
        while( $fila = mysqli_fetch_assoc($consulta)){
          $puja = new pujaTransfer($fila["Id"], $fila["IdProducto"], $fila["IdPostor"], $fila["Precio"], $fila["IdTrueque"], $fila["Fecha"], $fila["Estado"]);
          $pujas[] = $puja;
        }

          parent::desconectar();
          return $pujas;
      }
      else{
        parent::desconectar();
        return NULL;
      }
  }
    else {
      return NULL;
    }
  }



  public function newPuja(pujaTransfer $puja) {
          //conexión bbdd
      if($ok = parent::conectar()){
        $id = $this->nextIdPuja();
         if($id != -1){
           $idProducto = $puja->getIdProducto();
           $idPostor = $puja->getIdPostor();
           $precio = $puja->getPrecio();
           $idTrueque = $puja->getIdTrueque();
           $fecha = $puja->getFecha();
           $estado = $puja->getEstado();

           if($idTrueque == NULL)
            $sql = "INSERT INTO puja (Id, IdProducto, IdPostor, Precio, IdTrueque, Fecha, Estado) VALUES ('$id', '$idProducto', '$idPostor', '$precio', NULL, '$fecha', '$estado')";
           else
            $sql = "INSERT INTO puja (Id, IdProducto, IdPostor, Precio, IdTrueque, Fecha, Estado) VALUES ('$id', '$idProducto', '$idPostor', '$precio', '$idTrueque', '$fecha', '$estado')";

            $consulta = mysqli_query($this->db, $sql);
           if($consulta){
                parent::desconectar();
                return $id;
             }
             else{
                echo mysqli_error($this->db);

                parent::desconectar();
                return $id;
              }
         }
        else{
          parent::desconectar();
          return $id;
        }
      }
      else {
        return $id;
      }
    }

  private function nextIdPuja() {
          //conexión bbdd
          if($ok = parent::conectar()){
            //consulta del usuario
            $sql = "SELECT MAX(Id) from puja";
            $consulta = mysqli_query($this->db, $sql);
            if($consulta){
                $fila = mysqli_fetch_assoc($consulta);
                return $fila["MAX(Id)"] + 1;
            }
            else{
              return -1;
            }
          }
          else {
            return -1;
          }
    }

  public function editPuja(pujaTransfer $puja) {
        //conexión bbdd
   if($ok = parent::conectar()){
     $id = $puja->getId();
     $estado = $puja->getEstado();

     //consulta del usuario
     $sql = "UPDATE puja SET Estado = '".$estado."' WHERE Id = ".$id;
     $consulta = mysqli_query($this->db, $sql);
     if($consulta){ //si la base de datos no se modifica devuelve error
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
