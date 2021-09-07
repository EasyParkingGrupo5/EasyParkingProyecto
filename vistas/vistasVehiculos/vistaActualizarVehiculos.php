<?php


if (isset($_SESSION['actualizarDatosVehiculos'])) {
    $actualizarVehiculos = $_SESSION['actualizarDatosVehiculos'];
}

if (isset($_SESSION['listarTickets'])) {
    $listarTickets = $_SESSION['listarTickets'];
    $categoriasCantidadTickeds = count($listarTickets);
}

if (isset($_SESSION['listarEmpleados'])) {
    $listarEmpleados = $_SESSION['listarEmpleados'];
    $categoriasCantidadEmpleados = count($listarEmpleados);
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
                            <select name="vehMarca" id="vehMarca" >
                                    <option value="MASDA">MASDA</option>
                                    <option value="Bmw">Bmw</option>
                                    <option value="Renault">Renault</option>
                                    <option value="Chevrolet">Chevrolet</option>
                            </select>
                    </td>
                </tr>
                <tr>
                <td class="letras">Empleado:</td>
                    <td>
                            <select name="Empleados_empId" id="Empleados_empId">
                                <?php for ($i=0; $i < $categoriasCantidadEmpleados; $i++) { 
                                ?>
                                    <option value="<?php echo $categoriasCantidadEmpleados[$i]->empId; ?>" 
                                    <?php if (isset($listarEmpleados[$i]->empId) && isset($actualizarVehiculos->Empleados_empId) && $listarEmpleados[$i]->empId == $actualizarVehiculos->Empleados_empId) {
                                        echo "selected";
                                    } ?>
                                    >

                                    <?php echo $listarEmpleados[$i]->empId."."." ". $listarEmpleados[$i]->empPrimerNombre." ". $listarEmpleados[$i]->empPrimerApellido; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                    </td>
                </tr>
                <tr>
                <td class="letras">Ticket:</td>
                    <td>
                            <select name="categoriaLibro_catLibId" id="categoriaLibro_catLibId">
                                <?php for ($i=0; $i < $categoriasCantidadTickeds; $i++) { 
                                ?>
                                    <option value="<?php echo $listarTickets[$i]->ticId; ?>" 
                                    <?php if (isset($listarTickets[$i]->ticId) && isset($actualizarVehiculos->Tickets_ticId) && $listarTickets[$i]->ticId == $actualizarVehiculos->Tickets_ticId) {
                                        echo "selected";
                                    } ?>
                                    >

                                    <?php echo $listarTickets[$i]->ticId."."." ".$listarTickets[$i]->ticNumero; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                    </td>
                </tr>

                <tr>
                    <td>
                        <br>
                        <button type="submit" name="ruta" value="cancelarActualizarVehiculo" >Cancelar</button>
                    </td>
                    <td>
                        <br>
                        <button type="submit" name="ruta" value="confirmarActualizarVehiculo">Confirmar</button>
                    </td>
                </tr>
            </table>
        </form>
        </center>   
    </fieldset>
</div>