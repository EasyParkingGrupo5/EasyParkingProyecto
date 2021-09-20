<?php



if (isset($_SESSION['actualizarDatosVehiculos'])) {
    $actualizarVehiculos = $_SESSION['actualizarDatosVehiculos'];
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/vistas/vistaAdminVehiculos/vistaActualizarVehiculo.css">
</head>
<body>
    <h2 id="text-1">Gestión de Vehiculos</h2>
    <h3 id="text-2">Actualización de Vehiculos</h3>
<div class="formActualizarVehiculo">
        <form role="form" action="../../Controlador.php" method="POST" id="formVehiculos" >
        <div class="contenedor-input">
                <h6>Id:</h6>
                        <input class="input-100" type="text" placeholder="Id" name = "vehId" type="number" pattern="" size="50" require="required" autofocus readonly="readonly"
                        value="<?php if (isset($actualizarVehiculos->vehId)) {
                            echo $actualizarVehiculos->vehId;}?>">
                <h6>Numero de Placa:</h6>
                            <input class="input-100" type="text" type="text" name="vehNumero_Placa" placeholder="vehNumero_Placa"  size="50"
                            value="<?php if (isset($actualizarVehiculos->vehNumero_Placa)) {
                                echo $actualizarVehiculos->vehNumero_Placa;
                            } ?>">
                <h6>Color:</h6>
                            <input class="input-100" type="text" type="text" name="vehColor" placeholder="vehColor" size="50" 
                            value="<?php if (isset($actualizarVehiculos->vehColor)) {
                                echo $actualizarVehiculos->vehColor;
                            } ?>">
                <h6>Marca:</h6>
                        <input class="input-100" type="text"  name = "vehMarca" size="50" require="required"
                        value="<?php if (isset($actualizarVehiculos->vehMarca)) {
                            echo $actualizarVehiculos->vehMarca;}?>">
                        <button class="btnCancelar" type="submit" name="ruta" value="listarVehiculos" >Cancelar</button>
                        <button class="btnActualizar" type="submit" name="ruta" value="confirmarActualizarVehiculo">Confirmar</button>
            </div>
        </form> 
</div>
</body>
</html>

