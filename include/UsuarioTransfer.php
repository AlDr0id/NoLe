<?php
class usuarioTransfer {
    // atributos
    private $Nickname;
    private $nombre;
    private $apellido;
    private $pass;
    private $correo;
    private $activo;
    // constantes
     public function __construct( $Nickname, $nombre, $apellido, $pass, $correo, $activo) {
         $this->Nickname = $Nickname;
         $this->nombre = $nombre;
         $this->apellido = $apellido;
         $this->pass = $pass;
         $this->correo = $correo;
         $this->activo = $activo;
    }
    //métodos
    public function getNickname() {
        return $this->Nickname;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getApellido() {
        return $this->apellido;
    }

    public function getPass() {
        return $this->pass;
    }

    public function getCorreo() {
        return $this->correo;
    }

    public function getActivo() {
        return $this->activo;
    }

    public function setNickname($Nickname) {
         $this->Nickname = $Nickname;
    }

    public function setNombre($nombre) {
         $this->nombre = $nombre;
    }

    public function setApellido($apellido) {
         $this->apellido = $apellido;
    }

    public function setPass($pass) {
         $this->pass = $pass;
    }

    public function setCorreo($correo) {
        $this->correo = $correo;
    }

     public function setActivo($activo) {
        $this->activo = $activo;
    }

}

?>