<?php
require_once('UsuarioTransfer.php');
require_once('DAO.php');

class UsuarioDAO extends DAO{


    // métodos
    public function getUsuario(UsuarioTransfer $usuario) {
        //conexión bbdd
      if($ok = parent::conectar()){
        //consulta del usuario
        $nickname=$usuario->getNickname();
        $sql ="SELECT * FROM usuario WHERE Nickname LIKE '$nickname'";
        $consulta = mysqli_query($this->db, $sql);
        if($consulta){
             $info= $consulta->fetch_object();
           }
        else{
            parent::desconectar();
            return NULL;
          }
        if($info){
          parent::desconectar();
          return new UsuarioTransfer($info->Nickname,$info->Nombre,$info->Apellido,$info->Pass,$info->Correo,$info->Activo);
        }
        else{
            parent::desconectar();
            return NULL;
          }
      }
      else
        return NULL;
    }

    public function cambiaPass(UsuarioTransfer $usuario, $nuevaPass) {
      //conexión bbdd
    if($ok = parent::conectar()){
      //consulta del usuario
      $nickname=$usuario->getNickname();
      $pass=password_hash($nuevaPass, PASSWORD_DEFAULT);
      $sql ="UPDATE usuario SET Pass = '$pass' WHERE Nickname LIKE '$nickname'";
      $consulta = mysqli_query($this->db, $sql);
      if($consulta){
        parent::desconectar();
        return True;
      }
      else{
        parent::desconectar();
        return NULL;
        }

    }
    else
      return NULL;
    }

    public function eliminaCuenta(UsuarioTransfer $usuario) {
      //conexión bbdd
    if($ok = parent::conectar()){
      //consulta del usuario
      $nickname=$usuario->getNickname();
      $sql ="UPDATE usuario SET Activo = 0 WHERE Nickname LIKE '$nickname'";
      $consulta = mysqli_query($this->db, $sql);
      if($consulta){
           parent::desconectar();
           return True;
         }
      else{
          parent::desconectar();
          return NULL;
        }
    }
    else
      return NULL;
    }


    public function newUsuario(UsuarioTransfer $usuario) {
          //conexión bbdd
      if(parent::conectar()){
        $db=$this->db;
        $nickname = $usuario->getNickname();
        $nombre = $usuario->getNombre();
        $apellido = $usuario->getApellido();
        $passS = $usuario->getPass();
        $pass=password_hash($passS, PASSWORD_DEFAULT);
        $correo = $usuario->getCorreo();
        $activo = $usuario->getActivo();
        $query="SELECT * FROM usuario WHERE Nickname LIKE '$nickname'"; //comprobamos que no exista ese mismo nickname
        $resultado=$db->query($query) or die ($mysqli->error. " en la línea ".(__LINE__-1));
        $info= $resultado->fetch_object();
        if(!$info){

         $sql = "INSERT INTO usuario ( Nombre, Apellido,Nickname, Pass, Correo, Activo) VALUES ('$nombre', '$apellido',   '$nickname','$pass', '$correo', '1')";

          $consulta = mysqli_query($db, $sql);
          if($consulta){
               parent::desconectar();
               return true;
          }
          else{
            // echo mysqli_error($this->db);

            parent::desconectar();
            return false;
          }
        }
         else
          return false;
      }
      else
        return false;
    }
  public function editUsuario(UsuarioTransfer $usuario) {
    if(parent::conectar()){
        $db=$this->db;
        $nombre = $usuario->getNombre();
        $apellido = $usuario->getApellido();
        $correo = $usuario->getCorreo();
        $sql ="UPDATE usuario SET Nombre = '$nombre', Apellido = '$Apellido', Correo = '$Correo' WHERE Nickname LIKE '$nickname'";
        $consulta = mysqli_query($db, $sql);
        if($consulta){
          parent::desconectar();
          return true;
       }
        else{
        // echo mysqli_error($this->db);
          parent::desconectar();
          return false;
        }
    }
    else
      return false;
    }   
}

?>
