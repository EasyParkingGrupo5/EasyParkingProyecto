<?php

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../css/vistas/vistaAdminEmpleados/vistaInsertarTipoDocumento.css">
</head>
<body>
     <h2 id="text-1">Gestion Tipos de Documento</h2>
     <h3 id="text-2">Insertar Tipo de Documento</h3>
<div class="formInsertarTipoDocumento">
        <form role="form" action="../../../Controlador.php" method="post" id="formInsertarRol">
        <div class="contenedor-input">
                <h6>Sigla:</h6>
                        <input class="input-100" placeholder="Sigla" name="tipDocSigla" type="text" patter="" required="requires" autocomplete="off" value="<?php 
                        if(isset($_SESSION['tipDocSigla'])){echo($_SESSION['tipDocSigla']);} 
                        ?>">
                <h6>Nombre Tipo Documento:</h6>
                        <input class="input-100" placeholder="Nombre Tipo Documento" name="tipDocNombre_documento" type="text" patter="" autocomplete="off" required="requires" value="<?php
                         if(isset($_SESSION['tipDocNombre_documento'])){echo($_SESSION['tipDocNombre_documento']);} 
                         ?>">
                        <button class="btnInsertar" type="submit" name="ruta" value="confirmarInsertarTipoDocumento">Insertar</button>
                </div>
        </form>
</div>
</body>
</html>