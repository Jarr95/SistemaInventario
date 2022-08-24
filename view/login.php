<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sistema de Inventario</title>

    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>
    <form action="" method="POST" class="login">
        <?php
            if(isset($errorLogin)){
                echo $errorLogin;
            }
        ?>
        <h2 align="center">Iniciar sesión</h2>
        <p>Email: <br>
        <input type="email" name="email"></p>
        <p>Password: <br>
        <input type="password" name="password"></p>
        <p class="center"><input type="submit" value="Iniciar Sesión"></p>
    </form>
</body>
</html>