<?php


if (isset($_SESSION['listarReportes'])) {
    $listarReportes = $_SESSION['listarReportes'];
    $reportesCantidad = count($listarReportes);
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
    <h2 class="titulo">Gestión de Reportes</h2>
    <h3 class ="titulo">Agregar nuevo Reportes</h3>
</div>
<div>
    <fieldset>
        <center>
        <form role="form" action="Controlador.php" method="POST" id="formRegistro" autocomplete="off">
            <table>
                <tr>
                    <td class="letras">Id:</td>
                    <td>
                        <input placeholder="Id" name = "repId" type="number" required="required" value="<?php if(isset($_SESSION['repId'])){echo $_SESSION['repId']; unset($_SESSION['repId']);}?>">
                    </td>
                </tr>
                <tr>
                    <td class="letras">Numero:</td>
                    <td>
                            <input type="text" name="repNumero" placeholder="repNumero"  required="required" value="<?php if(isset($_SESSION['repNumero'])){echo $_SESSION['repNumero']; unset($_SESSION['repNumero']);}?>">
                    </td>
                </tr>
                <tr>
                    <td class="letras">Fecha:</td>
                    <td>
                            <input type="text" name="repFecha" placeholder="repFecha"  required="required" value="<?php if(isset($_SESSION['repFecha'])){echo $_SESSION['repFecha']; unset($_SESSION['repFecha']);}?>">
                    </td>
                </tr>
                <tr>
                    <td>Empleado:</td>
                    <td>
                            <select name="Empleados_empId" id="empId" style="width: 338px">
                                <?php for ($i=0; $i < $empleadosCantidad; $i++) { 
                                ?>
                                    <option value="<?php echo $listarEmpleados[$i]->empId; ?>" 
                                    <?php if (isset($listarEmpleados[$i]->empId) && isset($actualizarReportes->Empleados_empId) && $listarEmpleados[$i]->empId == $actualizarTickets->Empleados_empId) {
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
                <td>Vehiculos:</td>
                    <td>
                            <select name="Vehiculos_vehId" id="vehTipoVehiculos" style="width: 338px">
                                <?php for ($i=0; $i < $tarifaCantidad; $i++) { 
                                ?>
                                    <option value="<?php echo $listarVehiculos[$i]->tarId; ?>" 
                                    <?php if (isset($listarVehiculos[$i]->vehId) && isset($actualizarReportes->Vehiculos_vehId) && $listarVehiculos[$i]->vehId == $actualizarVehiculos->Vehiculos_vehId) {
                                        echo "selected";
                                    } ?>
                                    >

                                    <?php echo $listarVehiculos[$i]->Vehiculos_vehId.' - '.$listarVehiculos[$i] ->vehTipoVehiculos.' pesos minuto'; ?></option>
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
