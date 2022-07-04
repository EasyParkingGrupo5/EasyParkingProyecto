<?php
if (isset($_SESSION['actualizarDatosUsuarios_Roles'])) {
    $actualizarUsuarioRoles = $_SESSION['actualizarDatosUsuarios_Roles'];
}

if (isset($_SESSION['listarUsuarios'])) {
    $listarUsuarios = $_SESSION['listarUsuarios'];
    $usuarioCantidad = count($listarUsuarios);
}

if (isset($_SESSION['listarRol'])) {
    $listarRoles = $_SESSION['listarRol'];
    $RolCantidad = count($listarRoles);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../css/vistas/vistaAdminUsuarios/vistaActualizarUsuRol.css">
</head>
<body>
    <h2 id="text-1">Gestión de Usuarios Roles</h2>
    <h3 id="text-2">Actualización de Usuario con Rol</h3>
<div class="formActualizarUsuRol">
        <form role="form" action="../../../Controlador.php" method="POST" autocomplete="off">
        <div class="contenedor-input">
                <h6>Id Usuario:</h6>
                        <input class="input-100"  name="id_usuario_s" type="text" patter="" required="requires" autofocus readonly="readonly" value="<?php
                        for ($i=0; $i < $usuarioCantidad; $i++) { 
                         if(isset( $actualizarUsuarioRoles->id_usuario_s) && isset($listarUsuarios[$i]->usuId) && $actualizarUsuarioRoles->id_usuario_s == $listarUsuarios[$i]->usuId){
                             echo( $actualizarUsuarioRoles->id_usuario_s);
                            } 
                         }
                
                         ?>">
                <h6>Correo:</h6>
                        <input class="input-100"  name="" type="text" patter="" required="requires" autofocus readonly="readonly" value="<?php
                        for ($i=0; $i < $usuarioCantidad; $i++) { 
                         if(isset( $actualizarUsuarioRoles->id_usuario_s) && isset($listarUsuarios[$i]->usuId) && $actualizarUsuarioRoles->id_usuario_s == $listarUsuarios[$i]->usuId){
                             echo($listarUsuarios[$i]->usuLogin);
                            } 
                         }
                
                         ?>">
                <h6>Rol:</h6>
                            <select class="select-48" name="id_rol" id="rolId">
                                <?php for ($i=0; $i < $RolCantidad; $i++) { 
                                ?>
                                    <option value="<?php echo $listarRoles[$i]->rolId; ?>" 
                                    <?php if (isset($listarRoles[$i]->rolId) && isset($actualizarUsuarioRoles->id_rol) && $listarRoles[$i]->rolId == $actualizarUsuarioRoles->id_rol) {
                                        echo " selected";
                                    } ?>
                                    >

                                    <?php echo $listarRoles[$i]->rolId.' - '.$listarRoles[$i]->rolNombre; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        <button class="btnCancelar" type="submit" name="ruta" value="listarUsuarios_SRoles" >Cancelar</button>
                        <button class="btnActualizar" type="submit" name="ruta" value="confirmarActualizarUsuarioRol">Actualizar</button>
                    </div>
        </form>
</div>
</body>
</html>
