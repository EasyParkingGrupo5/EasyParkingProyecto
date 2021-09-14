<?php

if (isset($_SESSION['actualizarDatosRoles'])){
    $actualizarDatosRoles = $_SESSION['actualizarDatosRoles'];
    unset($_SESSION['actualizarRol']);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../css/vistas/vistaAdminUsuarios/vistaActualizarRol.css">
</head>
<body>
<h2 id="text-1">Gestion de Rol</h2>
     <h3 id="text-2">Actualizar Rol</h3>
<div class="formActualizarRols">
        <form role="form" action="../../../Controlador.php" method="post" autocomplete="off">
            <div class="contenedor-input">
            <h6>Id:</h6> 
                        <input class="input-100" placeholder="Nombre" name="rolId" type="text" patter="" required="requires" autofocus readonly="readonly" value="<?php 
                        if (isset($actualizarDatosRoles->rolId)) {
                            echo $actualizarDatosRoles->rolId;} 
                        ?>">
                  <h6>Nombre:</h6> 
                        <input class="input-100" placeholder="Nombre" name="rolNombre" type="text" patter="" required="requires" value="<?php 
                        if(isset($actualizarDatosRoles->rolNombre)){echo($actualizarDatosRoles->rolNombre);} 
                        ?>">
                    

                   <h6>Descripcion:</h6>
                        <input class="input-100" placeholder="Descripcion" name="rolDescripcion" type="text" patter="" required="requires" value="<?php
                         if(isset($actualizarDatosRoles->rolDescripcion)){echo($actualizarDatosRoles->rolDescripcion);} 
                         ?>">
                        
                        <button class="btnCancelar" type="submit" name="ruta" value="cancelarActualizarRol">Cancelar</button>

                        <button class="btnActualizar" type="submit" name="ruta" value="confirmarActualizarRol">Confirmar</button>
                        </div>
                    </form> 
</div>
</body>
</html>
