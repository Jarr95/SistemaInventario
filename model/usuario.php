<?php
require_once 'conexion.php';

class Usuario {
    private $nombre;
    private $email;
    private $Conexion;
    private $rol;

    public function Usuario(){        
        $this->Conexion = Conexion::Conectar();
    }

    public function verificarUsuario($email, $password){
        $md5password = md5($password);
        $consulta = $this->Conexion->prepare('SELECT * FROM personas WHERE email = :user AND password = :pass');
        $consulta->execute(['user' => $email, 'pass' => $md5password]);
        if($consulta->rowCount()){
            return true;
        }else{
            return false;
        }
    }

    public function setUsuario($user){
        $consulta = $this->Conexion->prepare('SELECT * FROM personas WHERE email = :user');
        $consulta->execute(['user' => $user]);
        foreach ($consulta as $Usuario) {
            $this->nombre = $Usuario['nombre'];
            $this->email = $Usuario['email'];
            $this->rol = $Usuario['id_rol'];
        }
    }

    public function getNombre(){
        return $this->nombre;
    }

    public function getRol(){
        $rol = $this->rol;
        $consulta = $this->Conexion->prepare("SELECT nombre_rol FROM rol WHERE id_rol = $rol");
        $consulta->execute();
        return $consulta;
    }
}

?>