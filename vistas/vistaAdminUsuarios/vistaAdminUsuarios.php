<?php
include_once '../../modelos/ConstantesConexion.php';
include_once PATH . 'controladores/ManejoSesiones/BloqueDeSeguridad.php';

$seguridad= new BloqueDeSeguridad();
$seguridad->seguridad("../../index.php");

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
<?php if($_SESSION['rolesEnSesion'][0] == 1){?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/vistas/vistaAdminUsuarios/vistaAdminUsuarios.css">
    <script src="https://kit.fontawesome.com/570e942042.js" crossorigin="anonymous"></script> 
    <title>EasyParking</title>
</head>
<body>
<h3>Usuario: <?php echo  $_SESSION['nombre']." ".$_SESSION['apellido']?>   <a href="../../Controlador.php?ruta=cerrarSesion" onclick="return confirm('¿Está seguro de cerrar sesión?')" style="color:#FF0000">  Salir</a></h3>
<a href="../../principal.php">
<i class="fas fa-chevron-circle-left" id="btnVolver"><h6>Volver</h6></i>
</a>
            <h1>Administración de Usuarios</h1>
    <header>
    
        <a href="./vistasRoles/vistaAdminRoles.php">
        <div class="contenedor" id="uno">
        <i class="far fa-address-book" id="icoRoles"></i>
        <p class="texto">Administración de Roles</p>
        </div>
        </a>
        <a href="./vistasUsuarios/vistaAdminUsuarios.php">
        <div class="contenedor" id="dos">
        <i class="fas fa-users-cog" id="icoUsuarios"></i>
        <p class="texto">Administración de Usuarios</p>
        </div>
        </a>
        <a href="./vistasUsuarioRol/vistaAdminUsuarioRol.php">
        <div class="contenedor" id="tres">
        <i class="fas fa-user-edit" id="icoUsuRol"></i>
        <p class="texto">Administración de Usuarios Roles</p>
        </div>
        </a>
        </header>
</body>
</html>
<?php
}else{
    session_start();

    $_SESSION['mensaje'] = 'Acceso denegado';

    header('location:../../principal.php');

 }
    ?>