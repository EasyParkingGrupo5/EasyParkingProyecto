<?php

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../css/vistas/vistaAdminUsuarios/vistaInsertarRol.css">
</head>
<body>
     <h2 id="text-1">Gestion de Rol</h2>
     <h3 id="text-2">Insertar Rol</h3>
<div class="formInsertarRol">
        <form role="form" action="../../../Controlador.php" method="post" id="formInsertarRol">
        <div class="contenedor-input">
                <h6>Nombre:</h6>
                        <input class="input-100" placeholder="Nombre" name="rolNombre" type="text" patter="" required="requires" autocomplete="off" value="<?php 
                        if(isset($_SESSION['rolNombre'])){echo($_SESSION['rolNombre']);} 
                        ?>">
                <h6>Descripcion:</h6>
                        <input class="input-100" placeholder="Descripcion" name="rolDescripcion" type="text" patter="" autocomplete="off" required="requires" value="<?php
                         if(isset($_SESSION['rolDescripcion'])){echo($_SESSION['rolDescripcion']);} 
                         ?>">
                        <button class="btnInsertar" type="submit" name="ruta" value="insertarRol">Insertar</button>
                </div>
        </form>
</div>
</body>
</html>
