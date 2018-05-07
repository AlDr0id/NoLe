<?php
require_once('productoOfreTransfer.php');
require_once('DAO.php');


class ActividadProductosDAO extends DAO{

	public function notificaciones($nickname){

		 if($ok = parent::conectar()) {
		 	$sql = "SELECT * FROM producto_ofrecido WHERE Usuario LIKE '$nickname' ORDER BY Fecha DESC";
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
	            	echo "<p> Producto : ".$info->Nombre." </p>";
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
	}

}

?>