<?php
include_once "../../../modelos/ConstantesConexion.php";
include_once PATH . 'controladores/ManejoSesiones/BloqueDeSeguridad.php';

$seguridad= new BloqueDeSeguridad();
$seguridad->seguridad("../../../index.php");


if (isset($_SESSION['nombre']) && isset($_SESSION['apellido'])) {
    $nombre = $_SESSION['nombre'];
    $apellido = $_SESSION['apellido'];
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../css/vistas/vistaAdminEmpleados/vistaAdminTipoDocumento.css">
    <script src="https://kit.fontawesome.com/570e942042.js" crossorigin="anonymous"></script> 
    <title>EasyParking</title>
</head>
<body>
<h3>Usuario: <?php echo  $_SESSION['nombre']." ".$_SESSION['apellido']?>   <a href="../../../Controlador.php?ruta=cerrarSesion" onclick="return confirm('¿Está seguro de cerrar sesión?')" style="color:#FF0000">  Salir</a></h3>
<a href="../vistaAdminEmpleados.php">
<i class="fas fa-chevron-circle-left" id="btnVolver"><h6 id="txtVolver">Volver</h6></i>
</a>
            <h1>Administración de Tipos de Documento</h1>
    <header>
    
        <a href="../../../Controlador.php?ruta=listarTiposDocumentos">
        <div class="contenedor" id="uno">
        <i class="fas fa-clipboard-list" id="icoListar"></i>
        <p class="texto">Listar Tipos de Documento</p>
        </div>
        </a>
        <a href="../../../Controlador.php?ruta=insertarTipoDocumento">
        <div class="contenedor" id="dos">
        <i class="fas fa-tools" id="icoInsertar"></i>
        <p class="texto">Insertar Nuevo Tipo de Documento</p>
        </div>
        </a>
        <a href="../../../Controlador.php?ruta=listarTiposDocumentosInactivos">
        <div class="contenedor" id="tres">
        <i class="fas fa-trash-alt" id="icoInactivos"></i>
        <p class="texto1">Listar Tipos de Documentos Inactivos</p>
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