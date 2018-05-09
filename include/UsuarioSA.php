<?php
//session_start();
require_once('UsuarioDAO.php');
require_once('UsuarioTransfer.php');
class UsuarioSA {

    // Atributos
    protected $dao;

    // métodos
    public function getUsuario(UsuarioTransfer $usuario) {
      if(!$this->dao){
          $this->dao = new UsuarioDAO();
      }
      $aux= $this->dao;
      $getU=$aux->getUsuario($usuario);
      if($getU!=NULL && password_verify($usuario->getPass(), $getU->getPass()) && $getU->getActivo() == 1){
          return $getU;
      }
      return NULL;
    }

    public function mostrarUsuario(UsuarioTransfer $usuario) {
      if(!$this->dao){
           $this->dao = new UsuarioDAO();
      }
      $aux = $this->dao;
      return $aux->getUsuario($usuario);
    }

    public function cambiaPass(UsuarioTransfer $usuario, $nuevaPass) {
      if(!$this->dao){
          $this->dao = new UsuarioDAO();
      }
      $aux= $this->dao;
      $getU=$aux->getUsuario($usuario);
      if($getU!=NULL &&  password_verify($usuario->getPass(), $getU->getPass()) ){
          return $aux->cambiaPass($usuario, $nuevaPass);
      }
      return NULL;
    }

    public function eliminaCuenta(UsuarioTransfer $usuario) {

      if(!$this->dao){
         $this->dao = new UsuarioDAO();
      }
      $aux= $this->dao;
      return $aux->eliminaCuenta($usuario);

    }

    public function newUsuario(UsuarioTransfer $usuario) {
      if(!$this->dao){
         $this->dao = new UsuarioDAO();
      }
      $aux= $this->dao;
      return $aux->newUsuario($usuario);
    }

    public function editUsuario(UsuarioTransfer $usuario) {//campos nickname and password no editables
      if(!$this->dao){
         $this->dao = new UsuarioDAO();
      }
      $aux= $this->dao;
      return $aux->editUsuario($usuario);
    }

    public function valorarUsuario($nickname, $puntuacion){//nickname del usuario a valorar y su nueva valoracion
      if(!$this->dao){
        $this->dao = new UsuarioDAO();
     }
     $aux= $this->dao;
     return $aux->valorarUsuario($nickname, $puntuacion);
    }

} 
?>
