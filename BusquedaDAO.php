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
                  if(array_key_exists ('Fecha', $argumentos)){
                    $anio= $argumentos["Fecha"];
                    $sql .= " AND numismatica.Anyo LIKE '$anio'";
                    $p = false;
                  }
                  if(array_key_exists ('pais', $argumentos)) {
                     if(!$p)
                      $sql .= " AND";
                    else{
                       $sql .= " WHERE ";
                    }
                    $pais = $argumentos["pais"];
                    $sql .= " UPPER(numismatica.Pais) LIKE UPPER('$pais')";

                    $p = false;
                  }
                  if(array_key_exists ('conservacion', $argumentos)) {
                     if(!$p)
                      $sql .= " AND";
                    else{
                       $sql .= " WHERE ";
                    }
                    $conservacion = $argumentos["conservacion"];
                    $sql .= " UPPER(numismatica.Conservacion) LIKE UPPER('%$conservacion%')";

                    $p = false;
                  }
              
              break;
               case 1:
                  $sql = "SELECT * FROM producto_ofrecido INNER JOIN rincon_de_la_abuela ON producto_ofrecido.id=rincon_de_la_abuela.id" ;
                  $sql .= " AND producto_ofrecido.Categoria = $Categoria";
                  if(array_key_exists ('Tipo', $argumentos)){
                    $tipo= $argumentos["Tipo"];
                    $sql .= " AND rincon_de_la_abuela.Tipo LIKE '$tipo'";
                    $p = false;
                  }
                  if(array_key_exists ('Origen', $argumentos)) {
                     if(!$p)
                      $sql .= " AND";
                    else{
                       $sql .= " WHERE ";
                    }
                    $origen = $argumentos["Origen"];
                    $sql .= " UPPER(rincon_de_la_abuela.Origen) LIKE UPPER('$origen')";

                    $p = false;
                  }
                  
              
              break;

               case 2:
                  $sql = "SELECT * FROM producto_ofrecido INNER JOIN figuras ON producto_ofrecido.id=figuras.id" ;
                  $sql .= " AND producto_ofrecido.Categoria = $Categoria";
                  if(array_key_exists ('Tema', $argumentos)){
                    $tema= $argumentos["Tema"];
                    $sql .= " AND figuras.Tema LIKE '$tema'";
                    $p = false;
                  }
                  if(array_key_exists ('Material', $argumentos)) {
                     if(!$p)
                      $sql .= " AND";
                    else{
                       $sql .= " WHERE ";
                    }
                    $material = $argumentos["Material"];
                    $sql .= " UPPER(figuras.Material) LIKE UPPER('$material')";

                    $p = false;
                  }
                  if(array_key_exists ('Fabricante', $argumentos)) {
                     if(!$p)
                      $sql .= " AND";
                    else{
                       $sql .= " WHERE ";
                    }
                    $fabricante = $argumentos["Fabricante"];
                    $sql .= " UPPER(figuras.Fabricante) LIKE UPPER('$fabricante')";

                    $p = false;
                  }
              
              break;
              case 3:
                  $sql = "SELECT * FROM producto_ofrecido INNER JOIN filatelia ON producto_ofrecido.id=filatelia.id" ;
                  $sql .= " AND producto_ofrecido.Categoria = $Categoria";
                   if(array_key_exists ('Fecha', $argumentos)){
                    $anio= $argumentos["Fecha"];
                    $sql .= " AND filatelia.Anyo LIKE '$anio'";
                    $p = false;
                  }
                  if(array_key_exists ('pais', $argumentos)) {
                     if(!$p)
                      $sql .= " AND";
                    else{
                       $sql .= " WHERE ";
                    }
                    $pais = $argumentos["pais"];
                    $sql .= " UPPER(filatelia.Pais) LIKE UPPER('$pais')";

                    $p = false;
                  }
              
              break;
              case 4:
                  $sql = "SELECT * FROM producto_ofrecido INNER JOIN vinilos_discos ON producto_ofrecido.id=vinilos_discos.id" ;
                  $sql .= " AND producto_ofrecido.Categoria = $Categoria";
                   if(array_key_exists ('Fecha', $argumentos)){
                    $anio= $argumentos["Fecha"];
                    $sql .= " AND vinilos_discos.Anyo LIKE '$anio'";
                    $p = false;
                  }
                  if(array_key_exists ('Autor', $argumentos)) {
                     if(!$p)
                      $sql .= " AND";
                    else{
                       $sql .= " WHERE ";
                    }
                    $autor = $argumentos["Autor"];
                    $sql .= " UPPER(vinilos_discos.Autor_compositor) LIKE UPPER('$autor')";

                    $p = false;
                  }
                  if(array_key_exists ('Grupo', $argumentos)) {
                     if(!$p)
                      $sql .= " AND";
                    else{
                       $sql .= " WHERE ";
                    }
                    $grupo = $argumentos["Grupo"];
                    $sql .= " UPPER(vinilos_discos.Grupo_cantante) LIKE UPPER('$grupo')";

                    $p = false;
                  }
                  if(array_key_exists ('Genero', $argumentos)) {
                     if(!$p)
                      $sql .= " AND";
                    else{
                       $sql .= " WHERE ";
                    }
                    $genero = $argumentos["Genero"];
                    $sql .= " UPPER(vinilos_discos.Genero) LIKE UPPER('$genero')";

                    $p = false;
                  }
              
              break;
              case 5:
                  $sql = "SELECT * FROM producto_ofrecido INNER JOIN cromos ON producto_ofrecido.id=cromos.id" ;
                  $sql .= " AND producto_ofrecido.Categoria = $Categoria";
                   if(array_key_exists ('Fecha', $argumentos)){
                    $anio= $argumentos["Fecha"];
                    $sql .= " AND cromos.Anyo LIKE '$anio'";
                    $p = false;
                  }
                  if(array_key_exists ('Coleccion', $argumentos)) {
                     if(!$p)
                      $sql .= " AND";
                    else{
                       $sql .= " WHERE ";
                    }
                    $coleccion = $argumentos["Coleccion"];
                    $sql .= " UPPER(cromos.Coleccion) LIKE UPPER('$coleccion')";

                    $p = false;
                  }
                   if(array_key_exists ('Ncomro', $argumentos)) {
                     if(!$p)
                      $sql .= " AND";
                    else{
                       $sql .= " WHERE ";
                    }
                    $ncomro = $argumentos["Ncomro"];
                    $sql .= " UPPER(cromos.Ncromo_idcromo) LIKE UPPER('$ncomro')";

                    $p = false;
                  }
              
              
              break;
              case 6:
                  $sql = "SELECT * FROM producto_ofrecido INNER JOIN libros_cromics ON producto_ofrecido.id=libros_cromics.id" ;
                  $sql .= " AND producto_ofrecido.Categoria = $Categoria";
                   if(array_key_exists ('Fecha', $argumentos)){
                    $anio= $argumentos["Fecha"];
                    $sql .= " AND libros_cromics.Anyo LIKE '$anio'";
                    $p = false;
                  }
                  if(array_key_exists ('Coleccion', $argumentos)) {
                     if(!$p)
                      $sql .= " AND";
                    else{
                       $sql .= " WHERE ";
                    }
                    $autor = $argumentos["Autor"];
                    $sql .= " UPPER(libros_cromics.Autor) LIKE UPPER('$autor')";

                    $p = false;
                  }
                   if(array_key_exists ('Editorial', $argumentos)) {
                     if(!$p)
                      $sql .= " AND";
                    else{
                       $sql .= " WHERE ";
                    }
                    $editorial = $argumentos["Editorial"];
                    $sql .= " UPPER(filatelia.Editorial) LIKE UPPER('$editorial')";

                    $p = false;
                  }
                  if(array_key_exists ('Genero', $argumentos)) {
                     if(!$p)
                      $sql .= " AND";
                    else{
                       $sql .= " WHERE ";
                    }
                    $genero = $argumentos["Genero"];
                    $sql .= " UPPER(Genero.Editorial) LIKE UPPER('$genero')";

                    $p = false;
                  }
                  if(array_key_exists ('Idioma', $argumentos)) {
                     if(!$p)
                      $sql .= " AND";
                    else{
                       $sql .= " WHERE ";
                    }
                    $idioma = $argumentos["Idioma"];
                    $sql .= " UPPER(filatelia.Idioma) LIKE UPPER('$idioma')";

                    $p = false;
                  }
              
              
              break;
              case 7:
                  $sql = "SELECT * FROM producto_ofrecido INNER JOIN trastero ON producto_ofrecido.id=trastero.id" ;
                  $sql .= " AND producto_ofrecido.Categoria = $Categoria";
                   if(array_key_exists ('Fecha', $argumentos)){
                    $anio= $argumentos["Fecha"];
                    $sql .= " AND trastero.Anyo LIKE '$anio'";
                    $p = false;
                  }
                  if(array_key_exists ('Origen', $argumentos)) {
                     if(!$p)
                      $sql .= " AND";
                    else{
                       $sql .= " WHERE ";
                    }
                    $origen = $argumentos["Origen"];
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
        echo $sql;
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
                echo $info->ID;
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
