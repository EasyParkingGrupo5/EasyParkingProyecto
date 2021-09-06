<?php


if (isset($_SESSION['actualizarDatosVehiculos'])) {
    $actualizarVehiculos = $_SESSION['actualizarDatosVehiculos'];
}



?>

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
                        <select name="vehMarca" id="vehMarca">
                            <option value="<?php for ($i=0; $i < $actualizarVehiculos; $i++){
 
                                 $marca = $actualizarVehiculos[i]->vehMarca;

                                 return $marca;

                                }?>"><?php echo $marca; ?>  </option>
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
