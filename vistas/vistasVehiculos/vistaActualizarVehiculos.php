<?php


if (isset($_SESSION['actualizarVehiculos'])) {
    $actualizarLibro = $_SESSION['actualizarVehiculos'];
}
if (isset($_SESSION['listarEmpleados'])) {
    $listarEmpleados = $_SESSION['listarEmpleados'];
    $empleadosCantidad = count($listarEmpleados);
}
if (isset($_SESSION['listarTickets'])) {
    $listarTickets = $_SESSION['listarTickets'];
    $ticketsCantidad = count($listarTickets);
}
if (isset($_SESSION['listarTarifas'])) {
    $listarTarifas = $_SESSION['listarTarifas'];
    $tarifasCantidad = count($listarTarifas);
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
    <h2 class="panel-title">Gestión de Vehiculos</h2>
    <h3 class="panel-title">Actualización de Vehiculos</h3>
</div>
<div>
    <fieldset>
        <center>
        <form role="form" action="Controlador.php" method="POST" id="formRegistro" >
            <table>
                <tr>
                    <td>Id:</td>
                    <td>
                        <input type="form-control" placeholder="Id" name = "vehId" type="number" pattern="" size="50" require="required" autofocus readonly="readonly"
                        value="<?php if (isset($actualizarVehiculos->vehId)) {
                            echo $actualizarVehiculos->vehId;}?>">
                    </td>
                </tr>
                <tr>
                    <td>Numero de Placa:</td>
                    <td>
                            <input type="form-control" type="text" name="vehNumero_Placa" placeholder="vehNumero_Placa"  size="50"
                            value="<?php if (isset($actualizarVehiculos->vehNumero_Placa)) {
                                echo $actualizarVehiculos->vehNumero_Placa;
                            } ?>">
                    </td>
                </tr>
                <tr>
                    <td>Color:</td>
                    <td>
                            <input type="form-control" type="text" name="vehColor" placeholder="vehColor" size="50" 
                            value="<?php if (isset($actualizarVehiculos->vehColor)) {
                                echo $actualizarVehiculos->vehColor;
                            } ?>">
                    </td>
                </tr>
                <tr>
                    <td>Marca:</td>
                    <td>
                            <input type="text" name="vehMarca" placeholder="vehMarca" style="width: 330px"
                            value="<?php if (isset($actualizarVehiculos->vehMarca)) {
                                echo $actualizarVehiculos->vehMarca;
                            } ?>">
                    </td>
                </tr>
                <tr>
                    <td>Empleado:</td>
                    <td>
                            <select name="empId" id="empId" style="width: 338px">
                                <?php for ($i=0; $i < $empleadosCantidad; $i++) { 
                                ?>
                                    <option value="<?php echo $listarEmpleados[$i]->empId; ?>" 
                                    <?php if (isset($listarEmpleados[$i]->empId) && isset($actualizarVehiculos->Empleados_empId) && $listarEmpleados[$i]->empId == $actualizarVehiculos->Empleados_empId) {
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

                <tr>
                    <td>Numero de Ticket:</td>
                    <td>
                            <select name="ticNumero" id="ticNumero" style="width: 338px">
                                <?php for ($i=0; $i < $ticketsCantidad; $i++) { 
                                ?>
                                    <option value="<?php echo $listarTickets[$i]->ticId; ?>" 
                                    <?php if (isset($listarTickets[$i]->ticId) && isset($actualizarTickets->ticNumero) && $listarTickets[$i]->ticId == $actualizarTickets->ticNumero) {
                                        echo "selected";
                                    } ?>
                                    >

                                    <?php echo $listarTickets[$i]->ticId; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                    </td>
                </tr>
                <td>Valor Tarifa:</td>
                    <td>
                            <select name="tarValorTarifa" id="tarValorTarifa" style="width: 338px">
                                <?php for ($i=0; $i < $tarifasCantidad; $i++) { 
                                ?>
                                    <option value="<?php echo $listarTarifas[$i]->tarId; ?>" 
                                    <?php if (isset($listarTarifas[$i]->tarId) && isset($actualizarVehiculos->tarValorTarifa) && $listarValorTarifa[$i]->tarId == $actualizarTarifas->tarValorTarifa) {
                                        echo "selected";
                                    } ?>
                                    >

                                    <?php echo $listarTarifas[$i]->tarValorTarifa; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                    </td>
                </tr>
                <tr>
                   
                    <td>
                        <br>
                        <button type="submit" name="ruta" value="cancelarActualizarVehiculos" >Cancelar</button>
                    </td>
                    <td>
                        <br>
                        &nbsp;&nbsp;||&nbsp;&nbsp;<button type="submit" name="ruta" value="confirmarActualizarVehiculos">Actualización de Vehiculos</button>
                    </td>
                </tr>
            </table>
        </form>
        </center>   
    </fieldset>
</div>