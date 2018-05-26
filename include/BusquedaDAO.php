<?php
require_once('productoOfreTransfer.php');
require_once('DAO.php');


class BusquedaDAO extends DAO{

    // métodos
    public function getProducto($nombre) {
        //conexión bbdd
      if($ok = parent::conectar()) {
        //consulta del usuario
        $sql = "SELECT * FROM producto_ofrecido WHERE UPPER(Nombre) LIKE UPPER('%$nombre%')";
        $consulta = mysqli_query($this->db, $sql);
        if($consulta) {
          $num =$consulta->num_rows;
        }
        else {
          parent::desconectar();
          return NULL;
          }
          if($num!=0) {
            $contador = 0;
            while ($info = $consulta->fetch_object()) {

                $array[$contador] = new productoOfreTransfer($info->ID,$info->Usuario,$info->Nombre,$info->Categoria,$info->Fecha,$info->Disponible,$info->Precio,$info->Descripcion,$info->EnPuja);
                $contador = $contador + 1;
            }
            return $array;
            parent::desconectar();
          }

        else {
          parent::desconectar();
          return NULL;
        }
      }
      else
        return NULL;
    }


    public function getProductoAvan($argumentos) {
        //conexión bbdd
      if($ok = parent::conectar()) {
        //consulta del usuario
        $p = true;
        if(array_key_exists ('Categoria', $argumentos)){
         
          $Categoria = $argumentos["Categoria"];
          switch ($Categoria) {
            case 0:
                  $sql = "SELECT * FROM producto_ofrecido INNER JOIN numismatica ON producto_ofrecido.id=numismatica.id" ;
                  $sql .= " AND producto_ofrecido.Categoria = $Categoria";
                  if(array_key_exists ('numiFecha', $argumentos)){
                    $anio= $argumentos["numiFecha"];
                    $sql .= " AND numismatica.Anyo LIKE '$anio'";
                    $p = false;
                  }
                  if(array_key_exists ('numipais', $argumentos)) {
                     if(!$p)
                      $sql .= " AND";
                    else{
                       $sql .= " WHERE ";
                    }
                    $pais = $argumentos["numipais"];
                    $sql .= " UPPER(numismatica.Pais) LIKE UPPER('$pais')";

                    $p = false;
                  }
                  if(array_key_exists ('numiconservacion', $argumentos)) {
                     if(!$p)
                      $sql .= " AND";
                    else{
                       $sql .= " WHERE ";
                    }
                    $conservacion = $argumentos["numiconservacion"];
                    $sql .= " UPPER(numismatica.Conservacion) LIKE UPPER('%$conservacion%')";

                    $p = false;
                  }
              
              break;
               case 1:
                  $sql = "SELECT * FROM producto_ofrecido INNER JOIN rincon_de_la_abuela ON producto_ofrecido.id=rincon_de_la_abuela.id" ;
                  $sql .= " AND producto_ofrecido.Categoria = $Categoria";
                  if(array_key_exists ('rdlaTipo', $argumentos)){
                    $tipo= $argumentos["rdlaTipo"];
                    $sql .= " AND rincon_de_la_abuela.Tipo LIKE '$tipo'";
                    $p = false;
                  }
                  if(array_key_exists ('rdlaOrigen', $argumentos)) {
                     if(!$p)
                      $sql .= " AND";
                    else{
                       $sql .= " WHERE ";
                    }
                    $origen = $argumentos["rdlaOrigen"];
                    $sql .= " UPPER(rincon_de_la_abuela.Origen) LIKE UPPER('$origen')";

                    $p = false;
                  }
                  
              
              break;

               case 2:
                  $sql = "SELECT * FROM producto_ofrecido INNER JOIN figuras ON producto_ofrecido.id=figuras.id" ;
                  $sql .= " AND producto_ofrecido.Categoria = $Categoria";
                  if(array_key_exists ('figTema', $argumentos)){
                    $tema= $argumentos["figTema"];
                    $sql .= " AND figuras.Tema LIKE '$tema'";
                    $p = false;
                  }
                  if(array_key_exists ('figMaterial', $argumentos)) {
                     if(!$p)
                      $sql .= " AND";
                    else{
                       $sql .= " WHERE ";
                    }
                    $material = $argumentos["figMaterial"];
                    $sql .= " UPPER(figuras.Material) LIKE UPPER('$material')";

                    $p = false;
                  }
                  if(array_key_exists ('figFabricante', $argumentos)) {
                     if(!$p)
                      $sql .= " AND";
                    else{
                       $sql .= " WHERE ";
                    }
                    $fabricante = $argumentos["figFabricante"];
                    $sql .= " UPPER(figuras.Fabricante) LIKE UPPER('$fabricante')";

                    $p = false;
                  }
              
              break;
              case 3:
                  $sql = "SELECT * FROM producto_ofrecido INNER JOIN filatelia ON producto_ofrecido.id=filatelia.id" ;
                  $sql .= " AND producto_ofrecido.Categoria = $Categoria";
                   if(array_key_exists ('filFecha', $argumentos)){
                    $anio= $argumentos["filFecha"];
                    $sql .= " AND filatelia.Anyo LIKE '$anio'";
                    $p = false;
                  }
                  if(array_key_exists ('filpais', $argumentos)) {
                     if(!$p)
                      $sql .= " AND";
                    else{
                       $sql .= " WHERE ";
                    }
                    $pais = $argumentos["filpais"];
                    $sql .= " UPPER(filatelia.Pais) LIKE UPPER('$pais')";

                    $p = false;
                  }
              
              break;
              case 4:
                  $sql = "SELECT * FROM producto_ofrecido INNER JOIN vinilos_discos ON producto_ofrecido.id=vinilos_discos.id" ;
                  $sql .= " AND producto_ofrecido.Categoria = $Categoria";
                   if(array_key_exists ('viniFecha', $argumentos)){
                    $anio= $argumentos["viniFecha"];
                    $sql .= " AND vinilos_discos.Anyo LIKE '$anio'";
                    $p = false;
                  }
                  if(array_key_exists ('viniAutor', $argumentos)) {
                     if(!$p)
                      $sql .= " AND";
                    else{
                       $sql .= " WHERE ";
                    }
                    $autor = $argumentos["viniAutor"];
                    $sql .= " UPPER(vinilos_discos.Autor_compositor) LIKE UPPER('$autor')";

                    $p = false;
                  }
                  if(array_key_exists ('viniGrupo', $argumentos)) {
                     if(!$p)
                      $sql .= " AND";
                    else{
                       $sql .= " WHERE ";
                    }
                    $grupo = $argumentos["viniGrupo"];
                    $sql .= " UPPER(vinilos_discos.Grupo_cantante) LIKE UPPER('$grupo')";

                    $p = false;
                  }
                  if(array_key_exists ('viniGenero', $argumentos)) {
                     if(!$p)
                      $sql .= " AND";
                    else{
                       $sql .= " WHERE ";
                    }
                    $genero = $argumentos["viniGenero"];
                    $sql .= " UPPER(vinilos_discos.Genero) LIKE UPPER('$genero')";

                    $p = false;
                  }
              
              break;
              case 5:
                  $sql = "SELECT * FROM producto_ofrecido INNER JOIN cromos ON producto_ofrecido.id=cromos.id" ;
                  $sql .= " AND producto_ofrecido.Categoria = $Categoria";
                   if(array_key_exists ('cromosFecha', $argumentos)){
                    $anio= $argumentos["cromosFecha"];
                    $sql .= " AND cromos.Anyo LIKE '$anio'";
                    $p = false;
                  }
                  if(array_key_exists ('cromosColeccion', $argumentos)) {
                     if(!$p)
                      $sql .= " AND";
                    else{
                       $sql .= " WHERE ";
                    }
                    $coleccion = $argumentos["cromosColeccion"];
                    $sql .= " UPPER(cromos.Coleccion) LIKE UPPER('$coleccion')";

                    $p = false;
                  }
                   if(array_key_exists ('cromosNcomro', $argumentos)) {
                     if(!$p)
                      $sql .= " AND";
                    else{
                       $sql .= " WHERE ";
                    }
                    $ncomro = $argumentos["cromosNcomro"];
                    $sql .= " UPPER(cromos.Ncromo_idcromo) LIKE UPPER('$ncomro')";

                    $p = false;
                  }
              
              
              break;
              case 6:
                  $sql = "SELECT * FROM producto_ofrecido INNER JOIN libros_comics ON producto_ofrecido.id=libros_comics.id" ;
                  $sql .= " AND producto_ofrecido.Categoria = $Categoria";
                   if(array_key_exists ('librosFecha', $argumentos)){
                    $anio= $argumentos["librosFecha"];
                    $sql .= " AND libros_comics.Anyo LIKE '$anio'";
                    $p = false;
                  }
                  if(array_key_exists ('librosColeccion', $argumentos)) {
                     if(!$p)
                      $sql .= " AND";
                    else{
                       $sql .= " WHERE ";
                    }
                    $autor = $argumentos["librosAutor"];
                    $sql .= " UPPER(libros_comics.Autor) LIKE UPPER('$autor')";

                    $p = false;
                  }
                   if(array_key_exists ('librosEditorial', $argumentos)) {
                     if(!$p)
                      $sql .= " AND";
                    else{
                       $sql .= " WHERE ";
                    }
                    $editorial = $argumentos["librosEditorial"];
                    $sql .= " UPPER(libros_comics.Editorial) LIKE UPPER('$editorial')";

                    $p = false;
                  }
                  if(array_key_exists ('librosGenero', $argumentos)) {
                     if(!$p)
                      $sql .= " AND";
                    else{
                       $sql .= " WHERE ";
                    }
                    $genero = $argumentos["librosGenero"];
                    $sql .= " UPPER(libros_comics.Genero) LIKE UPPER('$genero')";

                    $p = false;
                  }
                  if(array_key_exists ('librosIdioma', $argumentos)) {
                     if(!$p)
                      $sql .= " AND";
                    else{
                       $sql .= " WHERE ";
                    }
                    $idioma = $argumentos["librosIdioma"];
                    $sql .= " UPPER(libros_comics.Idioma) LIKE UPPER('$idioma')";

                    $p = false;
                  }
              
              
              break;
              case 7:
                  $sql = "SELECT * FROM producto_ofrecido INNER JOIN trastero ON producto_ofrecido.id=trastero.id" ;
                  $sql .= " AND producto_ofrecido.Categoria = $Categoria";
                   if(array_key_exists ('trasteroFecha', $argumentos)){
                    $anio= $argumentos["trasteroFecha"];
                    $sql .= " AND trastero.Anyo LIKE '$anio'";
                    $p = false;
                  }
                  if(array_key_exists ('trasteroOrigen', $argumentos)) {
                     if(!$p)
                      $sql .= " AND";
                    else{
                       $sql .= " WHERE ";
                    }
                    $origen = $argumentos["trasteroOrigen"];
                    $sql .= " UPPER(trastero.Origen) LIKE UPPER('$origen')";

                    $p = false;
                  }

              break;
            
            default:
                      $sql = "SELECT * FROM producto_ofrecido";
                      $p=true;
                      
              break;
          }
          
         
        }
       else{
          $sql = "SELECT * FROM producto_ofrecido";
          $p=true;
            
       }
        if(array_key_exists ('nombre', $argumentos)) {
           if(!$p)
            $sql .= " AND";
          else{
             $sql .= " WHERE ";
          }
          $nombre = $argumentos["nombre"];
          $sql .= " UPPER(producto_ofrecido.Nombre) LIKE UPPER('%$nombre%')";

          $p = false;
        }
        if(array_key_exists ('preciomin', $argumentos)){
          if(!$p)
            $sql .= " AND";
          else{
             $sql .= " WHERE ";
          }
          $preciomin = $argumentos["preciomin"];
          $sql .= " producto_ofrecido.Precio >= $preciomin";
          $p = false;
        }
        
        if(array_key_exists ('preciomax', $argumentos)){
           if(!$p)
            $sql .= " AND";
          else{
             $sql .= " WHERE ";
          }
          $preciomax = $argumentos["preciomax"];
          $sql .= " producto_ofrecido.Precio <= $preciomax";
          $p = false;
        }
        if(!$p)
            $sql .= " AND";
        else{
            $sql .= " WHERE ";
        }
        $sql .= " producto_ofrecido.EnPuja LIKE '1'";
        $p = false;

        $consulta = mysqli_query($this->db, $sql);
        if($consulta){
          $num =$consulta->num_rows;
        }
        else {
          parent::desconectar();
          return NULL;
        }
          if($num!=0) {
            $contador = 0;
             while ($info = $consulta->fetch_object()) {
                $array[$contador] = new productoOfreTransfer($info->ID,$info->Usuario,$info->Nombre,$info->Categoria,$info->Fecha,$info->Disponible,$info->Precio,$info->Descripcion,$info->EnPuja);
                $contador = $contador + 1;
            }
            parent::desconectar();
            return $array;
          }

        else {
          parent::desconectar();
          return NULL;
        }
      }
      else
        return NULL;
    }

}
/*

$aux=new BusquedaDAO();
$array = [
 // "preciomin" => 40,
 // "Fecha" => 1996,
  //"preciomax" => 8,
  //"nombre" => "a"
 // "Categoria" => 0
];
$pepe=$aux->getProductoAvan($array);*/
?>
