<?php
    extract($_REQUEST);
    if (!isset($_REQUEST['x'])){
        $x=0;
    }
    require_once 'model/usuario.php';
    require_once 'sesion.php';


    $userSession = new Sesion();
    $user = new Usuario();

    if(isset($_SESSION['user'])){
        $user->setUsuario($userSession->getUsuario());

        $rol = $userSession->getRol();
        if ($rol=="Administrador") {
                include_once 'view/inicio.php';
            }else{
                include_once 'view/inicio_empleado.php';
            }
    }else if(isset($_POST['email']) && isset($_POST['password'])){

        $email = $_POST['email'];
        $password = $_POST['password'];

        $user = new Usuario();
        if($user->verificarUsuario($email, $password)){
            $userSession->setUsuario($email);
            $user->setUsuario($email);
            $rol = $user->getRol();
            foreach ($rol as $value) {
                $userSession->setRol($value['nombre_rol']);
            }
            $user_rol = $userSession->getRol();
            if ($user_rol =="Administrador") {
                include_once 'view/inicio.php';
            }else{
                include_once 'view/inicio_empleado.php';
            }
            
        }else{
            $errorLogin = "Correo electronico y/o Contraseña incorrecta";
            include_once 'view/login.php';
        }
    }else{
        include_once 'view/login.php';
    }

?>