<?php

?>
<div class="panel-heading">
     <h2 class="panel-title">Gestion de Rol</h2>
     <h3 class="panel-title">Insertar Rol</h3>
</div>
<div>
    <fieldset>
        <center>
        <form role="form" action="Controlador.php" method="post" id="formInsertarRol">
            <table>
                <tr>
                    <td>Id:</td>
                    <td>
                        <input class="form-control" placeholder="Id" autocomplete="off" name="rolId" type="number" patter="" required="requires" value="<?php 
                        if(isset($_SESSION['rolId'])){echo($_SESSION['rolId']);} 
                        ?>">
                    </td>
                </tr>
                <tr>
                    <td>Nombre:</td>
                    <td>
                        <input class="form-control" placeholder="Nombre" name="rolNombre" type="text" patter="" required="requires" autocomplete="off" value="<?php 
                        if(isset($_SESSION['rolNombre'])){echo($_SESSION['rolNombre']);} 
                        ?>">
                    </td>
                </tr>
                <tr>
                    <td>Descripcion:</td>
                    <td>
                        <input class="form-control" placeholder="Descripcion" name="rolDescripcion" type="text" patter="" autocomplete="off" required="requires" value="<?php
                         if(isset($_SESSION['rolDescripcion'])){echo($_SESSION['rolDescripcion']);} 
                         ?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        <button type="submit" name="ruta" value="listarRoles">Cancelar</button>
                    </td>
                    <td>
                        <button type="submit" name="ruta" value="insertarRol">Confirmar</button>
                    </td>
                </tr>
            </table>
        </form>
</center>
    </fieldset>
</div>