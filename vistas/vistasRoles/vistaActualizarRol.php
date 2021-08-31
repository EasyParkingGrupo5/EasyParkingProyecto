<?php

echo "<pre>";
print_r($_SESSION['actualizarDatosRoles']);
echo "</pre>";

if (isset($_SESSION['actualizarDatosRoles'])){
    $actualizarDatosRoles = $_SESSION['actualizarDatosRoles'];
    unset($_SESSION['actualizarRol']);
}

?>
<div class="panel-heading">
     <h2 class="panel-title">Gestion de Rol</h2>
     <h3 class="panel-title">Actualizar Rol</h3>
</div>
<div>
    <fieldset>
        <center>
        <form role="form" action="Controlador.php" method="post" id="formActualizarRols">
            <table>
                <tr>
                    <td>Id:</td>
                    <td>
                        <input class="form-control" placeholder="Id" name="rolId" type="number" patter="" required="requires" value="<?php 
                        if(isset($actualizarDatosRoles->rolId)){echo($actualizarDatosRoles->rolId);} 
                        ?>">
                    </td>
                </tr>
                <tr>
                    <td>Nombre:</td>
                    <td>
                        <input class="form-control" placeholder="Nombre" name="rolNombre" type="text" patter="" required="requires" value="<?php 
                        if(isset($actualizarDatosRoles->rolNombre)){echo($actualizarDatosRoles->rolNombre);} 
                        ?>">
                    </td>
                </tr>
                <tr>
                    <td>Descripcion:</td>
                    <td>
                        <input class="form-control" placeholder="Descripcion" name="rolDescripcion" type="text" patter="" required="requires" value="<?php
                         if(isset($actualizarDatosRoles->rolDescripcion)){echo($actualizarDatosRoles->rolDescripcion);} 
                         ?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        <button type="submit" name="ruta" value="cancelarActualizarRol">Cancelar</button>
                    </td>
                    <td>
                        <button type="submit" name="ruta" value="confirmarActualizarRol">Confirmar</button>
                    </td>
                </tr>
            </table>
        </form>
</center>
    </fieldset>
</div>
