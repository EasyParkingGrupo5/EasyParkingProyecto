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

if (isset($_SESSION['nombre']) && isset($_SESSION['apellido'])) {
    $nombre = $_SESSION['nombre'];
    $apellido = $_SESSION['apellido'];
}
?>
<?php if($_SESSION['rolesEnSesion'][0] == 1){?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/vistas/vistaAdminTarifas/vistaAdminTarifas.css">
    <script src="https://kit.fontawesome.com/570e942042.js" crossorigin="anonymous"></script> 
    <title>EasyParking</title>
</head>
<body>
<h3>Usuario: <?php echo  $_SESSION['nombre']." ".$_SESSION['apellido']?>   <a href="../../../Controlador.php?ruta=cerrarSesion" onclick="return confirm('¿Está seguro de cerrar sesión?')" style="color:#FF0000">  Salir</a></h3>
<a href="../../principal.php">
<i class="fas fa-chevron-circle-left" id="btnVolver"><h6 id="txtVolver">Volver</h6></i>
</a>
            <h1>Administración de Tarifas</h1>
    <header>
    
        <a href="../../Controlador.php?ruta=listarTarifas">
        <div class="contenedor" id="uno">
        <i class="fas fa-clipboard-list" id="icoListar"></i>
        <p class="texto">Listar Tarifas</p>
        </div>
        </a>
        <a href="../../Controlador.php?ruta=vistaInsertarTarifa">
        <div class="contenedor" id="dos">
        <i class="fas fa-tools" id="icoInsertar"></i>
        <p class="texto">Insertar Nueva Tarifa</p>
        </div>
        </a>
        <a href="../../Controlador.php?ruta=listarTarifasInactivas">
        <div class="contenedor" id="tres">
        <i class="fas fa-trash-alt" id="icoInactivos"></i>
        <p class="texto">Listar Tarifas <br> Inactivas</p>
        </div>
        </a>
        </header>
        <div id="">
            <?php
            if(isset($_GET['contenido'])){
                include(PATH.$_GET['contenido']);
            }

            ?>
        </div>
</body>
</html>
<?php
}else{
    session_start();

    $_SESSION['mensaje'] = 'Acceso denegado';

    header('location:../../principal.php');

 }
?>