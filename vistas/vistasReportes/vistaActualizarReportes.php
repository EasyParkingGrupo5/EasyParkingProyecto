<?php


if (isset($_SESSION['actualizarReportes'])) {
    $actualizarReportes = $_SESSION['actualizarReportes'];
}
if (isset($_SESSION['listarEmpleados'])) {
    $listarEmpleados = $_SESSION['listarEmpleados'];
    $empleadosCantidad = count($listarEmpleados);
}
if (isset($_SESSION['listarVehiculos'])) {
    $listarVehiculos = $_SESSION['listarVehiculos'];
    $vehiculosCantidad = count($listarVehiculos);
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
                    <td>Empleado:</td>
                    <td>
                            <select name="Empleados_empId" id="empId" style="width: 338px">
                                <?php for ($i=0; $i < $empleadosCantidad; $i++) { 
                                ?>
                                    <option value="<?php echo $listarEmpleados[$i]->empId; ?>" 
                                    <?php if (isset($listarEmpleados[$i]->empId) && isset($actualizarReportes->Empleados_empId) && $listarEmpleados[$i]->empId == $actualizarReportes->Empleados_empId) {
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
                    <td>vehiculos:</td>
                    <td>
                            <select name="Vehiculos_vehId" id="vehId " style="width: 338px">
                                <?php for ($i=0; $i < $vehiculosCantidad; $i++) { 
                                ?>
                                    <option value="<?php echo $listarVehiculos[$i]->vehId; ?>" 
                                    <?php if (isset($listarVehiculos[$i]->vehId) && isset($actualizarReportes->	Vehiculos_vehId) && $listarVehiculos[$i]->vehId == $actualizarReportes->Vehiculos_vehId) {
                                        echo "selected";
                                    } ?>
                                    >

                                    <?php echo $listarVehiculos[$i]->vehId.' - '.$listarVehiculos[$i]->vehNumero_Placa; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                    </td>
                </tr>
                <tr>
                   
                    <td>
                        <br>
                        <button type="submit" name="ruta" value="cancelarActualizarReportes" >Cancelar</button>
                    </td>
                    <td>
                        <br>
                        &nbsp;&nbsp;||&nbsp;&nbsp;<button type="submit" name="ruta" value="confirmarActualizarReportes">Actualización de Reportes</button>
                    </td>
                </tr>
            </table>
        </form>
        </center>   
    </fieldset>
</div>
