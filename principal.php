<?php

include_once 'modelos/ConstantesConexion.php';
include_once PATH . 'controladores/ManejoSesiones/BloqueDeSeguridad.php';

$seguridad= new BloqueDeSeguridad();
$seguridad->seguridad("index.php");



if (isset($_SESSION['mensaje']) && isset($_SESSION['nombre']) && isset($_SESSION['apellido'])) {
    $mensaje = $_SESSION['mensaje'];
    $nombre = $_SESSION['nombre'];
    $apellido = $_SESSION['apellido'];
    echo "<script languaje='javascript'>alert('$mensaje '+'$nombre '+'$apellido')</script>";
    unset($_SESSION['mensaje']);
}else if (isset($_SESSION['mensaje'])){
    $mensaje = $_SESSION['mensaje'];
    echo "<script languaje='javascript'>alert('$mensaje')</script>";
    unset($_SESSION['mensaje']);
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/principal/principal.css">
    <script src="https://kit.fontawesome.com/570e942042.js" crossorigin="anonymous"></script> 
    <title>EasyParking</title>
</head>
<body>
<h3>Usuario: <?php echo  $_SESSION['nombre']." ".$_SESSION['apellido']?>   <a href="./Controlador.php?ruta=cerrarSesion" onclick="return confirm('¿Está seguro de cerrar sesión?')" style="color:#FF0000">  Salir</a></h3>
            <h1>Interfaz Principal</h1>
    <header>
    
        <a href="./vistas/vistaAdminUsuarios/vistaAdminUsuarios.php">
        <div class="contenedor" id="uno">
        <i class="fas fa-users" id = "icousuario"></i>
        <p class="texto">Administración de Usuarios</p>
        </div>
        </a>
        <a href="./vistas/vistaAdminEmpleados/vistaAdminEmpleados.php">
        <div class="contenedor" id="dos">
        <i class="fas fa-user-tie" id="icoempleados"></i>
        <p class="texto">Administración de Empleados</p>
        </div>
        </a>
        <a href="./vistas/vistaAdminTickets/vistaAdminTickets.php">
        <div class="contenedor" id="tres">
        <i class="fas fa-ticket-alt" id="icotickets"></i>
        <p class="texto">Administración de Tickets</p>
        </div>
        </a>
        <div class="contenedor" id="cuatro">
        <i class="fas fa-car" id="icoempleados"></i>
        <p class="texto">Administración de Vehículos</p>
        </div>
        <a href="./vistas/vistaAdminReportes/vistaAdminReportes.php">
        <div class="contenedor" id="cinco">
        <i class="fas fa-chart-bar" id="icoempleados"></i>
        <p class="texto">Administración de Reportes</p>
        </div>
        </a>
        <div class="contenedor" id="seis">
        <i class="fas fa-money-bill-wave" id="icotickets"></i>
        <p class="texto">Administración de Tarifas</p>
        </div>

        </header>

        <h2 class="manual-link"><a href="./manualUsuarios" target="_blank" style="color:white">Manuel de Usuario</a></h2>

</body>
</html>