<?php

class DAO {

   protected $db;

    // métodos
    protected function conectar() {

       if ($this->db = new mysqli("localhost", "noleUser", "MAbqq3DquJh3bQvY", "nole")) {
        	return $this->db;
      }
        else
          return false;
    }

    protected function desconectar() {
       if($this->db) {
       	$ok = mysqli_close($this->db);
       	if($ok)
          return true;
       	else
          return false;
       }
       else
        return false;
    }

}

?>
