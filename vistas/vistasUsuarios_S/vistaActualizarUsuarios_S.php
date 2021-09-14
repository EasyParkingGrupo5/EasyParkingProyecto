<?php

if (isset($_SESSION['actualizarDatosUsuarios'])){
    $actualizarDatosUsuarios = $_SESSION['actualizarDatosUsuarios'];
    unset($_SESSION['actualizarUsuarios']);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../css/vistas/vistaAdminUsuarios/vistaActualizarUsuario.css">
</head>
<body>
     <h2 id="text-1">Gestion de Usuario</h2>
     <h3 id="text-2">Actualizar Usuario</h3>
<div class="formActualizarUsuario">
        <form role="form" action="../../../Controlador.php" method="post" id="formActualizarRols">
        <div class="contenedor-input">
                <h6>Id:</h6>
                        <input class="input-100" placeholder="Usuario Login" name="usuId" type="text" patter="" required="requires" autofocus readonly="readonly" value="<?php 
                        if(isset($actualizarDatosUsuarios->usuId)){echo $actualizarDatosUsuarios->usuId;} 
                        ?>">
                <h6>Usuario Login:</h6>
                        <input class="input-100" placeholder="Usuario Login" name="usuLogin" type="text" patter="" required="requires" value="<?php 
                        if(isset($actualizarDatosUsuarios->usuLogin)){echo $actualizarDatosUsuarios->usuLogin;} 
                        ?>">
                <h6>Contraseña:</h6>
                
                        <input class="input-100" placeholder="Contraseña" name="usuPassword" type="text" patter="" required="requires" value="<?php
                         if(isset($actualizarDatosUsuarios->usuPassword)){echo($actualizarDatosUsuarios->usuPassword);} 
                         ?>">
                        <button class="btnCancelar" type="submit" name="ruta" value="cancelarActualizarUsuarios">Cancelar</button>
                        <button class="btnActualizar" type="submit" name="ruta" value="confirmarActualizarUsuarios">Confirmar</button>
            </div>
        </form>
</div>
</body>
</html>
