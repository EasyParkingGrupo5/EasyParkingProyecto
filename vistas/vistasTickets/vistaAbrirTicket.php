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
    <link rel="stylesheet" href="../../css/vistas/vistaAdminTickets/vistaAbrirTicket.css">
</head>
<body>
    <form class="formAbrirTicket" role="form" action="../../Controlador.php" method="post" autocomplete="off">
        <h6>Buscar placa: </h6>
        <input class="input-100" type="text" name="placa" pattern="[a-zA-Z]{3}[0-9]{2}[a-zA-Z0-9]">
        <button class="btnBuscar" type="submit" name="ruta" value="buscarPlaca">Aceptar</button>
    </form>
</body>
</html>