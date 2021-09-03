<?php
session_start();
if (isset($_SESSION['mensaje'])) {
    $mensaje = $_SESSION['mensaje'];
    echo "<script languaje='javascript'>alert('$mensaje')</script>";
    unset($_SESSION['mensaje']);
}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Login</title>
        <link rel="stylesheet" href="css/login.css">
        <script type="text/javascript" src="javascript/funciones.js" defer></script>
        <script type="text/javascript" src="javascript/md5.js"></script>  
        <script src="https://kit.fontawesome.com/570e942042.js" crossorigin="anonymous"></script>      
    </head>
    <body>
        <div class="login-box">
            <img src="css/loginStyle/Logo.png" alt="">
            <h1 class="panel-title">Login</h1>
            <form role="form" method="POST" action="Controlador.php" name="formLogin">
                <div class = "textbox">
                    <i class="fas fa-user"></i>
                    <input id="InputCorreo" placeholder="Correo Electrónico" name="usuLogin" type="email" autocomplete="off" >
                </div>
                <div class="textbox">
                    <i class="fas fa-key"></i>
                    <input id="InputPassword" placeholder="Contraseña" name="usuPassword" type="password" value="">
                </div>
                    <input type="hidden" name="ruta" value="gestionDeAcceso">
                    <input class="btn" type="button" class="btn btn-lg btn-success btn-block" onclick="validar_logueo();" value="Ingresar">
                <div style="padding-top:15px; font-size:85%">
                ¿Aún no se ha registrado? 
                <a href="Controlador.php?ruta=registrar" style="color:#FF0000">
                    Registrese Aquí
                </a>
                </div>
        </form>
        </div>
    </body>
</html>