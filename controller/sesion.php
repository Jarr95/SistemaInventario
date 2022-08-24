<?php

class Sesion{

    public function __construct(){
        session_start();
    }

    public function setUsuario($user){
        $_SESSION['user'] = $user;
    }

    public function getUsuario(){
        return $_SESSION['user'];
    }

    public function setRol($rol){
        $_SESSION['rol'] = $rol;
    }

    public function getRol(){
        return $_SESSION['rol'];
    }

    public function cerrarSesion(){
        session_unset();
        session_destroy();
    }
}

?>