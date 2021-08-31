<?php


if (isset($_SESSION['actualizarReportes'])) {
    $actualizarLibro = $_SESSION['actualizarReportes'];
}
if (isset($_SESSION['listarCategorias'])) {
    $listarCategorias = $_SESSION['listarCategorias'];
    $categoriasCantidad = count($listarCategorias);
}

?>

<div class="penek-heading">
    <h2 class="panel-title">Gestión de Reportes</h2>
    <h3 class="panel-title">Actualización de Reportes</h3>
</div>
<div>
    <fieldset>
        <center>
        <form role="form" action="Controlador.php" method="POST" id="formRegistro" >
            <table>
                <tr>
                    <td>Id:</td>
                    <td>
                        <input type="form-control" placeholder="repId" name = "repId" type="number" pattern="" size="50" require="required" autofocus readonly="readonly"
                        value="<?php if (isset($actualizarReportes->repId)) {
                            echo $actualizarReportes->repId;}?>">
                    </td>
                </tr>
                <tr>
                    <td>Numero:</td>
                    <td>
                            <input type="form-control" type="text" name="repNumero" placeholder="repNumero"  size="50"
                            value="<?php if (isset($actualizarReportes->repNumero)) {
                                echo $actualizarReportes->repNumero;
                            } ?>">
                    </td>
                </tr>
                <tr>
                    <td>Fecha:</td>
                    <td>
                            <input type="form-control" type="text" name="repFecha" placeholder="repFecha" size="50" 
                            value="<?php if (isset($actualizarReportes->repFecha)) {
                                echo $actualizarReportes->repFecha;
                            } ?>">
                    </td>
                </tr>
                <tr>
                    <td>Estado:</td>
                    <td>
                            <input type="number" name="repEstado" placeholder="repEstado" style="width: 330px"
                            value="<?php if (isset($actualizarReportes->repEstado)) {
                                echo $actualizarReportes->repEstado;
                            } ?>">
                    </td>
                </tr>
                <tr>
                </tr>
                <tr>
                    <td>Numero de Tickets:</td>
                    <td>
                            <select name="ticNumero" id="ticNumero" style="width: 338px">
                                <?php for ($i=0; $i < $numeroCantidad; $i++) { 
                                ?>
                                    <option value="<?php echo $listarNumero[$i]->ticNumero; ?>" 
                                    <?php if (isset($listarNumero[$i]->ticNumero) && isset($actualizarVehiculos->ticNumero) && $listarNumero[$i]->ticNumero == $actualizarVehiculos->ticNumero) {
                                        echo "selected";
                                    } ?>
                                    >

                                    <?php echo $listarNumero[$i]->ticNumero; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                    </td>
                </tr>
                <tr>
                   
                    <td>
                        <br>
                        <button type="submit" name="ruta" value="cancelarActualizarTickets" >Cancelar</button>
                    </td>
                    <td>
                        <br>
                        &nbsp;&nbsp;||&nbsp;&nbsp;<button type="submit" name="ruta" value="confirmarActualizarTickets">Actualización de Tickets</button>
                    </td>
                </tr>
            </table>
        </form>
        </center>   
    </fieldset>
</div>
