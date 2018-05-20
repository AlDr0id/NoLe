<?php

require_once('DAO.php');
require_once('productoSolicitadoTransfer.php');


class productoSolicitadoDAO extends DAO{

    // métodos
    public function comprobarProducto(productoOfreTransfer $producto) {
        //conexión bbdd
      if($ok = parent::conectar()) {
        //consulta del usuario
        $nomP=$producto->getNombre();
        $cate=$producto->getCategoria();
        $des=$producto->getDescripcion();
        $idP=$producto->getId();

        $sql = "SELECT * FROM producto_solicitado WHERE  Categoria LIKE '$cate' ";
        $consulta = mysqli_query($this->db, $sql);
        
        
        if($consulta) {

          $num =$consulta->num_rows;
          $producto->getId();

        }
        else {
          parent::desconectar();
          return NULL;
          }
          if($num!=0) {
            $contador = 0;
            
            while ($info = $consulta->fetch_object()) {
      
                 if($info->id_Producto==NULL && $info->activo==1 &&( stripos($nomP,$info->nombreP)!==false ||stripos($des,$info->palabrasClave)!==false )){
                     $sql = "UPDATE producto_solicitado SET id_Producto='$idP'   WHERE  id= '$info->id'";
                     mysqli_query($this->db, $sql);
                   }
            }
            parent::desconectar();
          }

        else {
          parent::desconectar();
          return false;
        }
      }
      else
        return false;
    }


  public function getProductoSolicitado($id) {
          //conexión bbdd
        if($ok = parent::conectar()) {
          //consulta del usuario
          $sql = "SELECT * from producto_solicitado where id = '$id'";
          $consulta = mysqli_query($this->db, $sql);
          if(mysqli_num_rows($consulta) > 0) {
               $fila = mysqli_fetch_assoc($consulta);
               parent::desconectar();
              return new productoSolicitadoTransferv($fila["id"], $fila["id_user"], $fila["nombreP"], $fila["categoria"], $fila["id_Producto"], $fila["activo"], $fila["palabrasClave"]);
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





  public function getProductoSolicitadoUsuario($id_user) {
        //conexión bbdd
      if($ok = parent::conectar()) {
        //consulta del usuario
        $sql = "SELECT * from producto_solicitado WHERE id_user = '".$id_user."' AND activo = 1";
        $consulta = mysqli_query($this->db, $sql);
        if(mysqli_num_rows($consulta) > 0) {  //devuelve error si no devuelve ninguna fila
          $productosS = array();
          while( $fila = mysqli_fetch_assoc($consulta)) {
            $productoS = new productoSolicitadoTransfer($fila["id"], $fila["id_user"], $fila["nombreP"], $fila["categoria"], $fila["id_Producto"], $fila["activo"], $fila["palabrasClave"]);
            $productosS[] = $productoS;
          }

             parent::desconectar();
             return $productosS;
        }
        else {
          parent::desconectar();
          return NULL;
        }
      }
      else
        return NULL;
    }



    public function newProducto(productoSolicitadoTransfer $producto) {
          //conexión bbdd
      if($ok = parent::conectar()) {
        $id = $this->nextIdProductoS();
        if($id != -1) {
           $id_user = $producto->getId_user();
           $nombreP = $producto->getNombreP();
           $categoria = $producto->getCategoria();
           $id_Producto = $producto->getId_Producto();
           $activo = $producto->getActivo();
           $palabrasClave = $producto->getPalabrasClave();
           
           //consulta del usuario
           $sql = "INSERT INTO producto_solicitado (id, id_user, nombreP, categoria, id_Producto, activo, palabrasClave) VALUES ('$id', '$id_user', '$nombreP', '$categoria', NULL, '$activo', '$palabrasClave')";
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

     private function nextIdProductoS() {
          //conexión bbdd
          if($ok = parent::conectar()) {
            //consulta del usuario
            $sql = "SELECT MAX(id) from producto_solicitado";
            $consulta = mysqli_query($this->db, $sql);
            if(mysqli_num_rows($consulta) > 0) {
                 $fila = mysqli_fetch_assoc($consulta);
                 //parent::desconectar();
                return $fila["MAX(id)"] + 1;
            }
            else {
              return -1;
            }
          }
          else {
            return -1;
          }
    }


  }

?>
