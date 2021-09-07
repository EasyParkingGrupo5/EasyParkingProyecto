<?php


if (isset($_SESSION['listarTickets'])) {
    $listarTickets = $_SESSION['listarTickets'];
    $ticketsCantidad = count($listarTickets);
}

if (isset($_SESSION['mensaje'])) {
    $mensaje = $_SESSION['mensaje'];
    echo "<script languaje='javascript'>alert('$mensaje')</script>";
    unset($_SESSION['mensaje']);
}



?>
<style type="text/css">

form{
	width:350px;
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

.botonInsertar{
    margin-left: 70px;
}

.letras{
    justify-content: center;
    text-align: left;
}

</style>
<div>
    <h2 class="titulo">Gestión de Tickets</h2>
    <h3 class ="titulo">Agregar nuevo Tickets</h3>
</div>
<div>
    <fieldset>
        <center>
        <form role="form" action="Controlador.php" method="POST" id="formRegistro" autocomplete="off">
            <table>
                <tr>
                    <td class="letras">Id:</td>
                    <td>
                        <input placeholder="Id" name = "ticId" type="number" required="required" value="<?php if(isset($_SESSION['ticId'])){echo $_SESSION['ticId']; unset($_SESSION['ticId']);}?>">
                    </td>
                </tr>
                <tr>
                    <td class="letras">Numero:</td>
                    <td>
                            <input type="text" name="ticNumero" placeholder="ticNumero"  required="required" value="<?php if(isset($_SESSION['ticNumero'])){echo $_SESSION['ticNumero']; unset($_SESSION['ticNumero']);}?>">
                    </td>
                </tr>
                <tr>
                    <td class="letras">Fecha:</td>
                    <td>
                            <input type="text" name="ticFecha" placeholder="ticFecha"  required="required" value="<?php if(isset($_SESSION['ticFecha'])){echo $_SESSION['ticFecha']; unset($_SESSION['ticFecha']);}?>">
                    </td>
                </tr>
                <tr>
                    <td class="letras">Hora Ingreso:</td>
                    <td>
                            <input type="text" name="ticHoraIngreso" placeholder="ticHoraIngreso"  required="required" value="<?php if(isset($_SESSION['ticHoraIngreso'])){echo $_SESSION['ticHoraIngreso']; unset($_SESSION['ticHoraIngreso']);}?>">
                    </td>
                </tr>
                <tr>
                    <td class="letras">Hora Salida:</td>
                    <td>
                            <input type="text" name="ticHoraSalida" placeholder="ticHoraSalida"  required="required" value="<?php if(isset($_SESSION['ticHoraSalida'])){echo $_SESSION['ticHoraSalida']; unset($_SESSION['ticHoraSalida']);}?>">
                    </td>
                </tr>
                <tr>
                    <td class="letras">Valor Valor Final:</td>
                    <td>
                            <input type="number" name="ticValorFinal" placeholder="ticValorFinal"  required="required" value="<?php if(isset($_SESSION['ticValorFinal'])){echo $_SESSION['ticValorFinal']; unset($_SESSION['ticValorFinal']);}?>">
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
                <tr>
                   
                    <td>
                        <br>
                        <button class="botonCancelar" type="submit" name="ruta" value="listarLibros" formnovalidate>Cancelar</button>
                    </td>
                    <td>
                        <br>
                        <button class="botonInsertar" type="submit" name="ruta" value="confirmarInsertarLibro">Insertar Libro</button>
                    </td>
                </tr>
            </table>
        </form><br>
        </center>   
    </fieldset>
</div>
