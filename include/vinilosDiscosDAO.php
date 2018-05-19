<?php
require_once('vinilosDiscosTransfer.php');
require_once('DAO.php');

class vinilosDiscosDAO extends DAO{

    // m�todos
    public function getVinilosDiscos($id) {
        //conexi�n bbdd
      if($ok = parent::conectar()) {
        //consulta del usuario
        $sql = "SELECT Id, Anyo, Autor_compositor, Grupo_cantante, Genero from vinilos_discos where Id = '$id'";
        $consulta = mysqli_query($this->db, $sql);
        if(mysqli_num_rows($consulta) > 0){
            $fila = mysqli_fetch_assoc($consulta);
            parent::desconectar();
            return new vinilosDiscosTransfer($fila["Id"], $fila["Anyo"], $fila["Autor_compositor"], $fila["Grupo_cantante"], $fila["Genero"]);
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
      $sql = "SELECT * from producto_ofrecido WHERE (Categoria = 4) ORDER BY Fecha DESC LIMIT ".$cantidad;
      
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


    public function newVinilosDiscos(vinilosDiscosTransfer $discvin) {
          //conexi�n bbdd
      if($ok = parent::conectar()) {
        $id = $discvin->getId();
        if($id != -1) {
           $anyo = $discvin->getAnyo();
           $autor_comp = $discvin->getAutorCompositor();
           $grupo_cant = $discvin->getgrupoCantante();
           $genero = $discvin->getGenero();
            //consulta del usuario
            $sql = "INSERT INTO vinilos_discos (Id, Anyo, Autor_compositor, Grupo_cantante, Genero) VALUES ('$id', '$anyo', '$autor_comp', '$grupo_cant', '$genero')";
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

    private function nextIdVinilosDiscos() {
      //conexi�n bbdd
      if($ok = parent::conectar()) {
        //consulta del usuario
        $sql = "SELECT MAX(Id) from vinilos_discos";
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

    public function editVinilosDiscos(vinilosDiscosTransfer $discvin) {
           //conexi�n bbdd
      if($ok = parent::conectar()) {

       $id = $discvin->getId();
       $anyo = $discvin->getAnyo();
       $autor_comp = $discvin->getAutorCompositor();
       $grupo_cant = $discvin->getGrupoCantante();
       $genero = $discvin->getGenero();
        //consulta del usuario 
        $sql = "UPDATE vinilos_discos SET Anyo = '$anyo', Autor_compositor = '$autor_comp', Grupo_cantante = ' $grupo_cant', Genero = ' $genero' WHERE Id = '$id'";
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

