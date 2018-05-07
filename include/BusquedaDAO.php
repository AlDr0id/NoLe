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



    public function getProductoAvan($argumentos) {//falta concretar como se hara lo de categoría
        //conexión bbdd
      if($ok = parent::conectar()) {
        //consulta del usuario
        $p = true;
        $sql = "SELECT * FROM producto_ofrecido INNER JOIN numismatica ON producto_ofrecido.id=numismatica.id" ;
        if(array_key_exists ('Fecha', $argumentos)){
          $anio= $argumentos["Fecha"];
          $sql .= " AND numismatica.Anyo LIKE '$anio'";
          $p = false;
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
        if(array_key_exists ('Categoria', $argumentos)){
           if(!$p)
            $sql .= " AND";
          else{
             $sql .= " WHERE ";
          }
          $Categoria = $argumentos["Categoria"];
          $sql .= " producto_ofrecido.Categoria = $Categoria";
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

?>
