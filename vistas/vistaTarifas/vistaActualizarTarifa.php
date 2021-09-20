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
    <link rel="stylesheet" href="../../css/vistas/vistaAdminTarifas/vistaActualizarTarifa.css">
</head>
<body>
<h2 id="text-1">Gestion de Tarifas</h2>
     <h3 id="text-2">Actualizar Tarifa</h3>
<div class="formActualizarTarifa">
        <form role="form" action="../../Controlador.php" method="post" autocomplete="off">
            <div class="contenedor-input">
            <h6>Id:</h6> 
                        <input class="input-100" placeholder="Id" name="tarId" type="text" patter="" required="requires" autofocus readonly="readonly" value="<?php 
                        if (isset($actualizarDatosTarifa->tarId )) {
                            echo $actualizarDatosTarifa->tarId ;} 
                        ?>">
                  <h6>Tipo de Vehiculo:</h6> 
                        <input class="input-100" placeholder="Tipo Vehiculo" name="tarTipoVehiculo" type="text" patter="" required="requires" value="<?php 
                        if(isset($actualizarDatosTarifa->tarTipoVehiculo)){echo($actualizarDatosTarifa->tarTipoVehiculo);} 
                        ?>">
                    

                   <h6>Precio por minuto:</h6>
                        <input class="input-100" placeholder="Precio minuto" name="tarValorTarifa" type="number" patter="" required="requires" value="<?php
                         if(isset($actualizarDatosTarifa->	tarValorTarifa)){echo($actualizarDatosTarifa->	tarValorTarifa);} 
                         ?>">
                        
                        <button class="btnCancelar" type="submit" name="ruta" value="cancelarActualizarTarifa">Cancelar</button>

                        <button class="btnActualizar" type="submit" name="ruta" value="confirmarActualizarTarifa">Confirmar</button>
                        </div>
                    </form> 
</div>
</body>
</html>
