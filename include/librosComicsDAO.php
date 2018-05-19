<?php
require_once('librosComicsTransfer.php');
require_once('DAO.php');

class librosComicsDAO extends DAO{

    // m�todos
    public function getLibrosComics($id) {
        //conexi�n bbdd
      if($ok = parent::conectar()) {
        //consulta del usuario
        $sql = "SELECT Id, Anyo, Autor,Editorial, Genero, Idioma, Formato from libros_comics where Id = '$id'";
        $consulta = mysqli_query($this->db, $sql);
        if(mysqli_num_rows($consulta) > 0){
            $fila = mysqli_fetch_assoc($consulta);
            parent::desconectar();
            return new librosComicsTransfer($fila["Id"], $fila["Anyo"], $fila["Autor"], $fila["Editorial"], $fila["Genero"], $fila["Idioma"], $fila["Formato"]);
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
      $sql = "SELECT * from producto_ofrecido WHERE (Categoria = 6) ORDER BY Fecha DESC LIMIT ".$cantidad;
      
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


    public function newLibrosComics(librosComicsTransfer $libcom) {
          //conexi�n bbdd
      if($ok = parent::conectar()) {
        $id = $libcom->getId();
        if($id != -1) {   
           $anyo = $libcom->getAnyo();
           $autor = $libcom->getAutor();
           $editorial = $libcom->getEditorial();
           $genero = $libcom->getGenero();
           $idioma = $libcom->getIdioma();
           $formato = $libcom->getFormato();
            //consulta del usuario
            $sql = "INSERT INTO libros_comics (Id, Anyo, Autor,Editorial, Genero, Idioma, Formato) VALUES ('$id', '$anyo', '$autor', '$editorial', '$genero', '$idioma', '$formato')";
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

    private function nextIdLibrosComics() {
      //conexi�n bbdd
      if($ok = parent::conectar()) {
        //consulta del usuario
        $sql = "SELECT MAX(Id) from libros_comics";
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

    public function editLibrosComics(librosComicsTransfer $libcom) {
           //conexi�n bbdd
      if($ok = parent::conectar()) {

       $id = $libcom->getId();
       $anyo = $libcom->getAnyo();
       $autor = $libcom->getAutor();
       $editorial = $libcom->getEditorial();
       $genero = $libcom->getGenero();
       $idioma = $libcom->getIdioma();
       $formato = $libcom->getFormato();

        //consulta del usuario    
        $sql = "UPDATE libros_comics SET Anyo = '$anyo', Autor = '$autor', Editorial = '$editorial', Genero = '$genero', Idioma = '$idioma', Formato = '$formato' WHERE Id = '$id'";
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

