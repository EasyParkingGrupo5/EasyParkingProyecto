<?php


if (isset($_SESSION['actualizarTickets'])) {
    $actualizarLibro = $_SESSION['actualizarTickets'];
}
if (isset($_SESSION['listarCategorias'])) {
    $listarCategorias = $_SESSION['listarCategorias'];
    $categoriasCantidad = count($listarCategorias);
}

?>

<div class="penek-heading">
    <h2 class="panel-title">Gestión de Tickets</h2>
    <h3 class="panel-title">Actualización de Tickets</h3>
</div>
<div>
    <fieldset>
        <center>
        <form role="form" action="Controlador.php" method="POST" id="formRegistro" >
            <table>
                <tr>
                    <td>Id:</td>
                    <td>
                        <input type="form-control" placeholder="Id" name = "ticId" type="number" pattern="" size="50" require="required" autofocus readonly="readonly"
                        value="<?php if (isset($actualizarTickets->ticId)) {
                            echo $actualizarTickets->ticId;}?>">
                    </td>
                </tr>
                <tr>
                    <td>Numero:</td>
                    <td>
                            <input type="form-control" type="text" name="Numero" placeholder="Numero"  size="50"
                            value="<?php if (isset($actualizarTickets->Numero)) {
                                echo $actualizarTickets->Numero;
                            } ?>">
                    </td>
                </tr>
                <tr>
                    <td>Fecha:</td>
                    <td>
                            <input type="form-control" type="text" name="Fecha" placeholder="Fecha" size="50" 
                            value="<?php if (isset($actualizarTickets->Fecha)) {
                                echo $actualizarTickets->Fecha;
                            } ?>">
                    </td>
                </tr>
                <tr>
                    <td>Hora Ingreso:</td>
                    <td>
                            <input type="number" name="HoraIngreso" placeholder="HoraIngreso" style="width: 330px"
                            value="<?php if (isset($actualizarTickets->HoraIngreso)) {
                                echo $actualizarTickets->HoraIngreso;
                            } ?>">
                    </td>
                </tr>
                <tr>
                    <td>Hora Salida:</td>
                    <td>
                            <input type="number" name="HoraSalida" placeholder="Horasalida" style="width: 330px"
                            value="<?php if (isset($actualizarTickets->HoraSalida)) {
                                echo $actualizarTickets->HoraSalida;
                            } ?>">
                    </td>
                </tr>
                <tr>
                    <td>Valo Final:</td>
                    <td>
                            <input type="number" name="ValoFinal" placeholder="ValoFinal" style="width: 330px"
                            value="<?php if (isset($actualizarTickets->ValoFinal)) {
                                echo $actualizarTickets->ValoFinal;
                            } ?>">
                    </td>
                </tr>
                <tr>
                    <td>Categoria:</td>
                    <td>
                            <select name="categoriaLibro_catLibId" id="categoriaLibro_catLibId" style="width: 338px">
                                <?php for ($i=0; $i < $categoriasCantidad; $i++) { 
                                ?>
                                    <option value="<?php echo $listarCategorias[$i]->catLibId; ?>" 
                                    <?php if (isset($listarCategorias[$i]->catLibId) && isset($actualizarLibro->categoriaLibro_catLibId) && $listarCategorias[$i]->catLibId == $actualizarLibro->categoriaLibro_catLibId) {
                                        echo "selected";
                                    } ?>
                                    >

                                    <?php echo $listarCategorias[$i]->catLibNombre; ?></option>
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