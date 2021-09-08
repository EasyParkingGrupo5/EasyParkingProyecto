<?php


if (isset($_SESSION['actualizarTickets'])) {
    $actualizarTickets = $_SESSION['actualizarTickets'];
}
/*echo'<pre>';
print_r($_SESSION['actualizarTickets']);
echo'</pre>';*/
if (isset($_SESSION['listarEmpleados'])) {
    $listarEmpleados = $_SESSION['listarEmpleados'];
    $empleadosCantidad = count($listarEmpleados);
}
if (isset($_SESSION['listarTarifa'])) {
    $listarTarifa = $_SESSION['listarTarifa'];
    $tarifaCantidad = count($listarTarifa);
}

?>
<style type="text/css">

form{
	width:550px;
	padding:16px;
	border-radius:10px;
	margin:auto;
	background-color:white;
    border: black 3px solid;
}

form button[type="submit"]{
	cursor:pointer;
}

form input[type="text"]{
    margin: 5px;
    width: 200px;
}

form input[type="number"]{
    margin: 5px;
    width: 200px;
}

form select{
    margin: 5px;
    width: 200px;
}

.titulo{
    display: flex;
    justify-content: center;
}

.botonCancelar{
    margin-left: center;
}

.botonActualizar{
    margin-left: 60px;
}

.letras{
    justify-content: center;
    text-align: left;
}

</style>

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
                            <input type="form-control" type="text" name="ticNumero" placeholder="ticNumero"  size="50"
                            value="<?php if (isset($actualizarTickets->ticNumero)) {
                                echo $actualizarTickets->ticNumero;
                            } ?>">
                    </td>
                </tr>
                <tr>
                    <td>Fecha:</td>
                    <td>
                            <input type="form-control" type="text" name="ticFecha" placeholder="ticFecha" size="50" 
                            value="<?php if (isset($actualizarTickets->ticFecha)) {
                                echo $actualizarTickets->ticFecha;
                            } ?>">
                    </td>
                </tr>
                <tr>
                    <td>Hora Ingreso:</td>
                    <td>
                            <input type="text" name="ticHoraIngreso" placeholder="ticHoraIngreso" style="width: 330px"
                            value="<?php if (isset($actualizarTickets->ticHoraIngreso)) {
                                echo $actualizarTickets->ticHoraIngreso;
                            } ?>">
                    </td>
                </tr>
                <tr>
                    <td>Hora Salida:</td>
                    <td>
                            <input type="text" name="ticHoraSalida" placeholder="ticHoraSalida" style="width: 330px"
                            value="<?php if (isset($actualizarTickets->ticHoraSalida)) {
                                echo $actualizarTickets->ticHoraSalida;
                            } ?>">
                    </td>
                </tr>
                <tr>
                    <td>Valor Final:</td>
                    <td>
                            <input type="number" name="ticValorFinal" placeholder="ticValorFinal" style="width: 330px"
                            value="<?php if (isset($actualizarTickets->ticValorFinal)) {
                                echo $actualizarTickets->ticValorFinal;
                            } ?>">
                    </td>
                </tr>
                <tr>
                    <td>Empleado:</td>
                    <td>
                            <select name="Empleados_empId" id="empId" style="width: 338px">
                                <?php for ($i=0; $i < $empleadosCantidad; $i++) { 
                                ?>
                                    <option value="<?php echo $listarEmpleados[$i]->empId; ?>" 
                                    <?php if (isset($listarEmpleados[$i]->empId) && isset($actualizarTickets->Empleados_empId) && $listarEmpleados[$i]->empId == $actualizarTickets->Empleados_empId) {
                                        echo " selected";
                                    } ?>
                                    >

                                    <?php echo $listarEmpleados[$i]->empId.' - '.$listarEmpleados[$i]->empPrimerNombre.' '.$listarEmpleados[$i]->empPrimerApellido; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                    </td>
                </tr>
                <td>Tipo Tarifa:</td>
                    <td>
                            <select name="Tarifas_tarId" id="tarValorTarifa" style="width: 338px">
                                <?php for ($i=0; $i < $tarifaCantidad; $i++) { 
                                ?>
                                    <option value="<?php echo $listarTarifa[$i]->tarId; ?>" 
                                    <?php if (isset($listarTarifa[$i]->tarId) && isset($actualizarTickets->Tarifas_tarId) && $listarTarifa[$i]->tarId == $actualizarTickets->Tarifas_tarId) {
                                        echo "selected";
                                    } ?>
                                    >

                                    <?php echo $listarTarifa[$i]->tarTipoVehiculo.' - '.$listarTarifa[$i] ->tarValorTarifa.' pesos minuto'; ?></option>
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