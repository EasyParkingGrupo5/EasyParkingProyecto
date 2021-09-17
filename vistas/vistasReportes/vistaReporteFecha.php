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
    <link rel="stylesheet" href="../../css/vistas/vistaAdminReportes/vistaReporteFecha.css">
</head>
<body>
    <h1>Generar Reporte por Fecha</h1>
    <form class="formGenerarReporteFecha" action="../../Controlador.php" method="post">
    <div class="contenedor-input">
        <h6>Desde:</h6>
        <input class="input-100" type="date" name="fechaDesde" required>
        <h6>Hasta:</h6>
        <input class="input-100" type="date" name="fechaHasta" required>

    </div>
        <button class="btnInsertarTicket" type="submit" name="ruta" value="generarReporteFecha">Generar Reporte</button>
    </form>
</body>
</html>