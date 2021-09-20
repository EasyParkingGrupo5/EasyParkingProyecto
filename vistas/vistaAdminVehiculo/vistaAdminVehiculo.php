<?php
include_once '../../modelos/ConstantesConexion.php';
include_once PATH . 'controladores/ManejoSesiones/BloqueDeSeguridad.php';

$seguridad= new BloqueDeSeguridad();
$seguridad->seguridad("../../index.php");


if (isset($_SESSION['mensaje'])){
    $mensaje = $_SESSION['mensaje'];
    echo "<script languaje='javascript'>alert('$mensaje')</script>";
    unset($_SESSION['mensaje']);
}
?>
<?php if($_SESSION['rolesEnSesion'][0] == 1 || $_SESSION['rolesEnSesion'][0] == 2){?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/vistas/vistaAdminVehiculos/vistaAdminVehiculos.css">
    <script src="https://kit.fontawesome.com/570e942042.js" crossorigin="anonymous"></script> 
    <title>EasyParking</title>
</head>
<body>
<h3>Usuario: <?php echo  $_SESSION['nombre']." ".$_SESSION['apellido']?>   <a href="../../Controlador.php?ruta=cerrarSesion" onclick="return confirm('¿Está seguro de cerrar sesión?')" style="color:#FF0000">  Salir</a></h3>
<a href="../../principal.php">
<i class="fas fa-chevron-circle-left" id="btnVolver"><h6 id="txtVolver">Volver</h6></i>
</a>
        <h1>Administración de Vehículos</h1>
    <header>
        <a href="../../Controlador.php?ruta=listarVehiculos">
        <div class="contenedor" id="uno">
        <i class="fas fa-clipboard-list" id="icoListar"></i>
        <p class="texto">Listar Vehículos</p>
        </div>
        </a>
    </header>

        <?php
            if(isset($_GET['contenido'])){
                include(PATH.$_GET['contenido']);

            }
        ?>


</body>
</html>
<?php
}else{
    session_start();

    $_SESSION['mensaje'] = 'Acceso denegado';

    header('location:../../principal.php');

 }
?>