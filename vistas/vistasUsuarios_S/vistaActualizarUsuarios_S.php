<?php

if (isset($_SESSION['actualizarDatosUsuarios'])){
    $actualizarDatosUsuarios = $_SESSION['actualizarDatosUsuarios'];
    unset($_SESSION['actualizarUsuarios']);
}

?>
<div class="panel-heading">
     <h2 class="panel-title">Gestion de Usuario</h2>
     <h3 class="panel-title">Actualizar Usuario</h3>
</div>
<div>
    <fieldset>
        <center>
        <form role="form" action="controlador.php" method="post" id="formActualizarRols">
            <table>
                <tr>
                    <td>Id:</td>
                    <td>
                        <input class="form-control" placeholder="Id" name="usuId" type="number" patter="" required="requires" value="<?php 
                        if(isset($actualizarDatosUsuarios->usuId)){echo($actualizarDatosUsuarios->usuId);} 
                        ?>">
                    </td>
                </tr>
                <tr>
                    <td>Usuario Login:</td>
                    <td>
                        <input class="form-control" placeholder="Usuario Login" name="usuLogin" type="text" patter="" required="requires" value="<?php 
                        if(isset($actualizarDatosUsuarios->usuLogin)){echo($actualizarDatosUsuarios->usuLogin);} 
                        ?>">
                    </td>
                </tr>
                <tr>
                    <td>Contraseña:</td>
                    <td>
                        <input class="form-control" placeholder="Contraseña" name="usuPassword" type="text" patter="" required="requires" value="<?php
                         if(isset($actualizarDatosUsuarios->usuPassword)){echo($actualizarDatosUsuarios->usuPassword);} 
                         ?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        <button type="submit" name="ruta" value="cancelarActualizarUsuarios">Cancelar</button>
                        <button type="submit" name="ruta" value="confirmarActualizarUsuarios">Confirmar</button>
                    </td>
                </tr>
            </table>
        </form>
</center>
    </fieldset>
</div>