<?php
/*echo "<pre>";
print_r($_SESSION['actualizarTipoDocumento']);
echo "<pre>";*/

if(isset($_SESSION['actualizarTipoDocumento'])){
    $actualizarTipoDocumento = $_SESSION['actualizarTipoDocumento'];
}
?>

<div class="penek-heading">
    <h2 class="panel-title">Gestión de Libros</h2>
    <h3 class="panel-title">Actualización de Libro</h3>
</div>
<div>
    <fieldset>
        <center>
        <form role="form" action="Controlador.php" method="POST" id="formRegistro" >
            <table>
                <tr>
                    <td>Id Documento:</td>
                    <td>
                        <input type="form-control" placeholder="Id Documento" name = "tipDocId" type="number" pattern="" size="25" require="required" autofocus readonly="readonly"
                        value="<?php if (isset($actualizarTipoDocumento->tipDocId)) {
                            echo $actualizarTipoDocumento->tipDocId;}?>">
                    </td>
                </tr>
                <tr>
                    <td>Sigla:</td>
                    <td>
                            <input type="form-control" type="text" name="tipDocSigla" placeholder="Sigla"  size="25"
                            value="<?php if (isset($actualizarTipoDocumento->tipDocSigla)) {
                                echo $actualizarTipoDocumento->tipDocSigla;
                            } ?>">
                    </td>
                </tr>
                <tr>
                    <td>Nombre Documento:</td>
                    <td>
                            <input type="form-control" type="text" name="tipDocNombre_documento" placeholder="Nombre Documento" size="25" 
                            value="<?php if (isset($actualizarTipoDocumento->tipDocNombre_documento)) {
                                echo $actualizarTipoDocumento->tipDocNombre_documento;
                            } ?>">
                    </td>
                </tr>
                <tr>
                   
                    <td>
                        <br>
                        <button type="submit" name="ruta" value="cancelarActualizarTipoDocumento" >Cancelar</button>&nbsp;&nbsp;||&nbsp;&nbsp;
                    </td>
                    <td>
                        <br>
                        <button type="submit" name="ruta" value="confirmarActualizarTipoDocumento">Actualizar Libro</button>
                    </td>
                </tr>
            </table>
        </form>
        </center>   
    </fieldset>
</div>