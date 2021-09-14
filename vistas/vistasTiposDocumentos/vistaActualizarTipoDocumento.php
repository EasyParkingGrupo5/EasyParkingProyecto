<?php
/*echo "<pre>";
print_r($_SESSION['actualizarTipoDocumento']);
echo "<pre>";*/

if(isset($_SESSION['actualizarTipoDocumento'])){
    $actualizarTipoDocumento = $_SESSION['actualizarTipoDocumento'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../css/vistas/vistaAdminEmpleados/vistaActualizarTipDocumento.css">
</head>
<body>
<div>
    <h2 id="text-1">Gestión de Tipos Documentos</h2>
    <h3 id="text-2">Actualización de Tipos de Documentos</h3>
</div>
<div class = "formActualizarTipDocumento">
    <form role="form" action="../../../Controlador.php" method="POST" id="formRegistro" >
        <div class = "contenedor-input">
            <h6>Id Documento:</h6>
                <input class="input-100" placeholder="Id Documento" name = "tipDocId" type="number" pattern="" size="25" require="required" autofocus readonly="readonly"
                value="<?php if (isset($actualizarTipoDocumento->tipDocId)) {
                    echo $actualizarTipoDocumento->tipDocId;
                }?>" >
                    
            <h6>Sigla:</h6>
                    
                <input class="input-100" type="text" name="tipDocSigla" placeholder="Sigla"  size="25"
                value="<?php if (isset($actualizarTipoDocumento->tipDocSigla)) {
                    echo $actualizarTipoDocumento->tipDocSigla;
                } ?>" autocomplete="off">
            <h6>Nombre Documento:</h6>
                 
                <input class="input-100" type="text" name="tipDocNombre_documento" placeholder="Nombre Documento" size="25" 
                    value="<?php if (isset($actualizarTipoDocumento->tipDocNombre_documento)) {
                        echo $actualizarTipoDocumento->tipDocNombre_documento;
                    } ?>" autocomplete="off">

            <button class="btnCancelar" type="submit" name="ruta" value="cancelarActualizarTipoDocumento" >Cancelar</button>
            <button class="btnActualizar" type="submit" name="ruta" value="confirmarActualizarTipoDocumento">Actualizar Libro</button>
        </div>
    </form>
</div>
</body>
</html>
