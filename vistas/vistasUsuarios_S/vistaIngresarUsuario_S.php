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
                        <input class="form-control" placeholder="Id" autocomplete="off" name="usuId" type="number" patter="" required="requires" value="<?php 
                        if(isset($_SESSION['usuId'])){echo($_SESSION['usuId']);} 
                        ?>">
                    </td>
                </tr>
                <tr>
                    <td>Correo:</td>
                    <td>
                        <input class="form-control" placeholder="Nombre" name="usuLogin" type="text" patter="" required="requires" autocomplete="off" value="<?php 
                        if(isset($_SESSION['usuLogin'])){echo($_SESSION['usuLogin']);} 
                        ?>">
                    </td>
                </tr>
                <tr>
                    <td>Constraseña:</td>
                    <td>
                        <input class="form-control" placeholder="Descripcion" name="usuPassword" type="text" patter="" autocomplete="off" required="requires" value="<?php
                         if(isset($_SESSION['usuPassword'])){echo($_SESSION['usuPassword']);} 
                         ?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        <button type="submit" name="ruta" value="listarUsuarios">Cancelar</button>
                    </td>
                    <td>
                        <button type="submit" name="ruta" value="insertarUsuario">Confirmar</button>
                    </td>
                </tr>
            </table>
        </form>
</center>
    </fieldset>
</div>