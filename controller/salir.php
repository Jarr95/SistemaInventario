<?php

    include_once 'sesion.php';

    $SesionUsuario = new Sesion();
    $SesionUsuario->cerrarSesion();

    header("location: ../index.php");

?>