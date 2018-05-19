<?php
require_once('figurasTransfer.php');
require_once('DAO.php');

class figurasDAO extends DAO{

    // m�todos
    public function getFiguras($id) {
        //conexi�n bbdd
      if($ok = parent::conectar()) {
        //consulta del usuario
        $sql = "SELECT Id, Alto, Ancho, Largo, Tema, Material, Fabricante from figuras where Id = '$id'";
        $consulta = mysqli_query($this->db, $sql);
        if(mysqli_num_rows($consulta) > 0){
            $fila = mysqli_fetch_assoc($consulta);
            parent::desconectar();
            return new figurasTransfer($fila["Id"], $fila["Alto"], $fila["Ancho"], $fila["Largo"], $fila["Tema"], $fila["Material"], $fila["Fabricante"]);
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
      $sql = "SELECT * from producto_ofrecido WHERE (Categoria = 2) ORDER BY Fecha DESC LIMIT ".$cantidad;
      
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


    public function newFiguras(figurasTransfer $figuras) {
          //conexi�n bbdd
      if($ok = parent::conectar()) {
        $id = $figuras->getId();
        if($id != -1) {
           $alto = $figuras->getAlto();
           $ancho = $figuras->getAncho();
           $largo = $figuras->getLargo();
           $tema = $figuras->getTema();
           $material = $figuras->getMaterial();
           $fabricante = $figuras->getFabricante();
            //consulta del usuario
            $sql = "INSERT INTO figuras (Id, Alto, Ancho, Largo, Tema, Material, Fabricante) VALUES ('$id', ' $alto', '$ancho', '$largo', ' $tema', '$material', '$fabricante')";
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

    private function nextIdFiguras() {
      //conexi�n bbdd
      if($ok = parent::conectar()) {
        //consulta del usuario
        $sql = "SELECT MAX(Id) from figuras";
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

    public function editFiguras(figurasTransfer $figuras) {
           //conexi�n bbdd
      if($ok = parent::conectar()) {

       $id = $figuras->getId();
       $alto = $figuras->getAlto();
       $ancho = $figuras->getAncho();
       $largo = $figuras->getLargo();
       $tema = $figuras->getTema();
       $material = $figuras->getMaterial();
       $fabricante = $figuras->getFabricante();
        //consulta del usuario
        $sql = "UPDATE figuras SET Alto = '$alto', Ancho = '$ancho', Largo = '$largo', Tema = '$tema', Material = '$material', Fabricante = '$fabricante' WHERE Id = '$id'";
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

