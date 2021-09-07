<?php

if (isset($_SESSION['listarTickets'])) {
    $listarTickets = $_SESSION['listarTickets'];
    $categoriasCantidadTickeds = count($listarTickets);
}

if (isset($_SESSION['listarEmpleados'])) {
    $listarEmpleados = $_SESSION['listarEmpleados'];
    $categoriasCantidadEmpleados = count($listarEmpleados);
}



?>
<div class="panel-heading">
     <h2 class="panel-title">Gestion de Vehiculo</h2>
     <h3 class="panel-title">Insertar Vehiculo</h3>
</div>
<div>
    <fieldset>
        <center>
        <form role="form" action="Controlador.php" method="post" id="formInsertarVehiculo">
            <table>
                <tr>
                    <td>Id:</td>
                    <td>
                        <input class="form-control" placeholder="Id" autocomplete="off" name="vehId" type="number" patter=""  value="<?php 
                        if(isset($_SESSION['vehId'])){echo($_SESSION['vehId']);} 
                        ?>">
                    </td>
                </tr>
                <tr>
                    <td>Numero de placa:</td>
                    <td>
                        <input class="form-control" placeholder="Numero de placa" autocomplete="off" name="vehNumero_Placa" type="text" patter=""  value="<?php 
                        if(isset($_SESSION['vehNumero_Placa'])){echo($_SESSION['vehNumero_Placa']);} 
                        ?>">
                    </td>
                </tr>
                <tr>
                    <td>Color:</td>
                    <td>
                        <input class="form-control" placeholder="Color" name="vehColor" type="text" patter=""  autocomplete="off" value="<?php 
                        if(isset($_SESSION['vehColor'])){echo($_SESSION['vehColor']);} 
                        ?>">
                    </td>
                </tr>
                <tr>
                <tr>
                    <td>Estado:</td>
                    <td>
                        <input class="form-control" placeholder="Estado" name="vehColor" value="1" type="number" patter=""  min="1" max="1" autocomplete="off" value="<?php 
                        if(isset($_SESSION['vehEstado'])){echo($_SESSION['vehEstado']);} 
                        ?>">
                    </td>
                </tr>
                <tr>
                    <td>Marca:</td>
                    <td>
                        <input class="form-control" placeholder="Marca" name="vehMarca" type="text" patter="" autocomplete="off"  value="<?php
                         if(isset($_SESSION['vehMarca'])){echo($_SESSION['vehMarca']);} 
                         ?>">
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
                    <td>
                        <button type="submit" name="ruta" value="listarVehiculos">Cancelar</button>
                    </td>
                    <td>
                        <button type="submit" name="ruta" value="insertarVehiculo">Confirmar</button>
                    </td>
                </tr>
            </table>
        </form>
</center>
    </fieldset>
</div>