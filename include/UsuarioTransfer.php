<?php
class usuarioTransfer {
    // atributos
    private $Nickname;
    private $nombre;
    private $apellido;
    private $pass;
    private $correo;
    private $activo;
    private $valoracion;
    private $numValoraciones;

    // constantes
     public function __construct( $Nickname, $nombre, $apellido, $pass, $correo, $valoracion, $numValoraciones, $activo) {
        $this->Nickname = $Nickname;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->pass = $pass;
        $this->correo = $correo;
        $this->activo = $activo;
        $this->valoracion = $valoracion;
        $this->numValoraciones = $numValoraciones;

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

    public function getValoracion() {
        return $this->valoracion;
    }

    public function getNumValoraciones() {
        return $this->numValoraciones;
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

    public function setValoracion($valoracion) {
        $this->valoracion = $valoracion;
    }

    public function setNumValoraciones($numValoraciones) {
        $this->numValoraciones = $numValoraciones;
    }

     public function setActivo($activo) {
        $this->activo = $activo;
    }

}

?>