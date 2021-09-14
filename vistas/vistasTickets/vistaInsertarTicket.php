<?php

if (isset($_SESSION['mensaje'])) {
    $mensaje = $_SESSION['mensaje'];
    echo "<script languaje='javascript'>alert('$mensaje')</script>";
    unset($_SESSION['mensaje']);
}

if (isset($_SESSION['listarTarifas'])){
    $listarTarifas = $_SESSION['listarTarifas'];
    $cantidadTarifas = count($listarTarifas);
}

/*echo "<pre>";
print_r($_SESSION);
echo "</pre>";*/

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/timepicker.js/latest/timepicker.min.js"></script>
    <link rel="stylesheet" href="../../css/vistas/vistaAdminTickets/vistaInsertarTicket.css">
</head>
<body>
    <form class="formInsertarTicket" action="../../Controlador.php" method="post">
        <h6>Placa:</h6>
        <input class="input-100" type="text" name="vehNumero_Placa" <?php
        if (isset($_SESSION['vehNumero_Placa'])) {
            echo " readonly";
        }
        ?> value="<?php
        if (isset($_SESSION['vehNumero_Placa'])) {
            $vehNumero_Placa = $_SESSION['vehNumero_Placa'];
            echo $vehNumero_Placa;
            unset($_SESSION['vehNumero_Placa']);
            echo "";
        }
        ?>">
        <h6>Marca:</h6>
        <input class="input-100" type="text" name="vehMarca"  <?php
        if (isset($_SESSION['vehMarca'])) {
            echo " readonly";
        }
        ?> value="<?php
        if (isset($_SESSION['vehMarca'])) {
            $vehMarca = $_SESSION['vehMarca'];
            echo $vehMarca;
            unset($_SESSION['vehMarca']);
        }
        ?>">
        <h6>Color:</h6>
        <input class="input-100" type="text" name="vehColor"  <?php
        if (isset($_SESSION['vehColor'])) {
            echo " readonly";
        }
        ?> value="<?php
        if (isset($_SESSION['vehColor'])) {
            $vehColor = $_SESSION['vehColor'];
            echo $vehColor;
            unset($_SESSION['vehColor']);
        }
        ?>">
        <h6>Tarifa:</h6>
        <select class="select-48" name="Tarifas_tarId" id="Tipos_Documentos_tipDocId">
            <?php for($i=0; $i < $cantidadTarifas; $i++){
                ?><option value="<?php echo $listarTarifas[$i]->tarId?>"
                >    
                    <?php echo $listarTarifas[$i]->tarTipoVehiculo.' - $'.$listarTarifas[$i]->tarValorTarifa.' pesos minuto'?></option>
                <?php 
                            
                }                            
            ?>
        </select>
        <h6>Fecha:</h6>
        <input class="input-100" type="date" name="ticFecha" id="">
        <h6>Hora Ingreso:</h6>
        <input class="input-100" type="time" name="ticHoraIngreso" />

        <button class="btnInsertarTicket" type="submit" name="ruta" value="insertarTicket">Insertar</button>
    </form>
</body>
</html>