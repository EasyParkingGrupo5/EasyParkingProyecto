<?php
include_once '../../modelos/ConstantesConexion.php';

if (isset($_SESSION['mensaje'])) {
    $mensaje = $_SESSION['mensaje'];
    echo "<script languaje='javascript'>alert('$mensaje')</script>";
    unset($_SESSION['mensaje']);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/vistas/vistaAdminReportes/vistaReportePlaca.css">
</head>
<body>
    <h1>Generar Reporte por Placa</h1>
    <form class="formBuscarPlaca" role="form" action="../../Controlador.php" method="post" autocomplete="off">
        <h6>Ingrese la placa: </h6>
        <input class="input-100" type="text" name="placa" pattern="[a-zA-Z]{3}[0-9]{2}[a-zA-Z0-9]">
        <button class="btnBuscar" type="submit" name="ruta" value="buscarReportePlaca">Generar Reporte</button>
    </form>
    <?php
            if(isset($_GET['contenido1'])){
                include(PATH.$_GET['contenido1']);
        }
    ?>
</body>
</html>