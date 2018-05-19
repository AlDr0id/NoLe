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
            return new pujaTransfer($fila["Id"], $fila["IdProducto"], $fila["IdVendedor"], $fila["IdPostor"], $fila["Precio"], $fila["IdTrueque"], $fila["Fecha"], $fila["Estado"], $fila["Valorada"]);
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

    public function getPujasPostor($idPostor, $estado){
      //conexión bbdd
      if($ok = parent::conectar()){
        //consulta del usuario
        if($estado != "PENDIENTE" && $estado != "GANADA" && $estado != "PERDIDA") $sql = "SELECT * from puja where IdPostor = '$idPostor' ORDER BY Fecha";
        else $sql = "SELECT * from puja where IdPostor = '$idPostor' AND Estado = '$estado' ORDER BY Fecha";
        $consulta = mysqli_query($this->db, $sql);
        if(mysqli_num_rows($consulta) > 0){  //devuelve error si no devuelve ninguna fila
          $pujas = array();
          while( $fila = mysqli_fetch_assoc($consulta)){
            $puja = new pujaTransfer($fila["Id"], $fila["IdProducto"], $fila["IdVendedor"], $fila["IdPostor"], $fila["Precio"], $fila["IdTrueque"], $fila["Fecha"], $fila["Estado"], $fila["Valorada"]);
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

    


    public function getPujasProductoPendientes($idProducto) {
      //conexión bbdd
      if($ok = parent::conectar()){
      //consulta del usuario
      $sql = "SELECT * from puja where IdProducto = ".$idProducto." AND Estado = 'PENDIENTE' ORDER BY Fecha";
      $consulta = mysqli_query($this->db, $sql);
      if(mysqli_num_rows($consulta) > 0){  //devuelve error si no devuelve ninguna fila
        $pujas = array();
        while( $fila = mysqli_fetch_assoc($consulta)){
          $puja = new pujaTransfer($fila["Id"], $fila["IdProducto"], $fila["IdVendedor"], $fila["IdPostor"], $fila["Precio"], $fila["IdTrueque"], $fila["Fecha"], $fila["Estado"], $fila["Valorada"]);
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

  public function getPujasVendedorCerradas($idVendedor) {
    //conexión bbdd
    if($ok = parent::conectar()){
      //consulta del usuario
      $sql = "SELECT * from puja where IdVendedor = '$idVendedor' AND Estado = 'GANADA' ORDER BY Fecha";
      $consulta = mysqli_query($this->db, $sql);
      if(mysqli_num_rows($consulta) > 0){  //devuelve error si no devuelve ninguna fila
        $pujas = array();
        while( $fila = mysqli_fetch_assoc($consulta)){
          $puja = new pujaTransfer($fila["Id"], $fila["IdProducto"], $fila["IdVendedor"], $fila["IdPostor"], $fila["Precio"], $fila["IdTrueque"], $fila["Fecha"], $fila["Estado"], $fila["Valorada"]);
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
           $idVendedor = $puja->getIdVendedor();
           $idPostor = $puja->getIdPostor();
           $precio = $puja->getPrecio();
           $idTrueque = $puja->getIdTrueque();
           $fecha = $puja->getFecha();
           $estado = $puja->getEstado();
           $valorada = $puja->getValorada();

           if($idTrueque == NULL)
            $sql = "INSERT INTO puja (Id, IdProducto, idVendedor, IdPostor, Precio, IdTrueque, Fecha, Estado, Valorada) VALUES ('$id', '$idProducto', '$idVendedor', '$idPostor', '$precio', NULL, '$fecha', '$estado', $valorada)";
           else
            $sql = "INSERT INTO puja (Id, IdProducto, idVendedor, IdPostor, Precio, IdTrueque, Fecha, Estado, Valorada) VALUES ('$id', '$idProducto', '$idVendedor', '$idPostor', 0, '$idTrueque', '$fecha', '$estado', $valorada)";

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
     $valorada = $puja->getValorada();

     //consulta del usuario
     $sql = "UPDATE puja SET Estado = '$estado', Valorada = $valorada WHERE Id = ".$id;
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
