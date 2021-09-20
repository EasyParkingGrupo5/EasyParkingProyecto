<?php

if (isset($_SESSION['actualizarDatosTarifa'])){
    $actualizarDatosTarifa = $_SESSION['actualizarDatosTarifa'];
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/vistas/vistaAdminTarifas/vistaInsertarTarifa.css">
</head>
<body>
<h2 id="text-1">Gestion de Tarifas</h2>
     <h3 id="text-2">Insertar Nueva Tarifa</h3>
<div class="formActualizarTarifa">
        <form role="form" action="../../Controlador.php" method="post" autocomplete="off">
            <div class="contenedor-input">
                  <h6>Tipo de Vehiculo:</h6> 
                        <input class="input-100" placeholder="Tipo Vehiculo" name="tarTipoVehiculo" type="text" patter="" required="requires">
                    

                   <h6>Precio por minuto:</h6>
                        <input class="input-100" placeholder="Precio minuto" name="tarValorTarifa" type="number" patter="" required="requires">

                        <button class="btnActualizar" type="submit" name="ruta" value="insertarTarifa">Insertar</button>
                        </div>
                    </form> 
</div>
</body>
</html>
