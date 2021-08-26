<?php

session_start();

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hola bebe</title>
    <style type="text/css"> 
        #principal{
            width: 80%;
            border: black 3px solid;
            margin-left: auto;
            margin-right: auto;
        }
        .gestion{
            width: 80%;
            border: black 3px solid;
            margin-left: auto;
            margin-right: auto;
        }
        #contenido{
            width: 80%;
            border: black 3px solid;
            margin-left: auto;
            margin-right: auto;
        }
    </style>
</head>
<body>
    <div id="principal">Interfaz
        <div class="gestion">Menú Operaciones de Tabla Libros
            <br/>
            <a href="./Controlador.php?ruta=listarLibros">Listar Libros</a>
            <br/>
            <a>Agregar</a>
        </div>
        <div class="gestion">Menú Operaciones de Tabla Rol
            <br>
            <a href="./Controlador.php?ruta=listarRoles">Listar Roles</a>
            <br>
            <a >Agregar</a>
        </div>
        <div class="gestion">Menú Operaciones de Tabla Usuario_s
            <br>
            <a href="./Controlador.php?ruta=listarUsuarios">Listar Usuarios</a>
            <br>
            <a>Agregar</a>
        </div>
        <div class="gestion">Menú Operaciones de Tabla Usuario_s_roles
            <br>
            <a href="./Controlador.php?ruta=listarUsuarios_SRoles">Listar roles del usuario </a>
            <br>
            <a>Agregar</a>
        </div>
        <div class="gestion">Menú de Operaciones de Tabla Tickets
            <br>
            <a>Listar Tickets</a>
            <br>
            <a>Agregar Ticket</a>
        </div>
        <div class="gestion">Menú de Operaciones de Tabla Vehículos
            <br>
            <a>Listar Vehículos</a>
            <br>
            <a>Agregar Vehiculo</a>
        </div>
        <div class="gestion">Menú de Operaciones de Tabla Reportes
            <br>
            <a>Listar Reportes</a>
            <br>
            <a>Agregar Reporte</a>
        </div>
        <div class="gestion">Menú de Operaciones de Tabla Empleados
            <br>
            <a>Listar Empleados</a>
            <br>
            <a>Agregar Empleado</a>
        </div>
        <div class="gestion">Menú de Operaciones de Tabla Tipos de Documentos
            <br>
            <a href="./Controlador.php?ruta=listarTiposDocumentos">Listar Tipos de Documentos</a>
            <br>
            <a>Agregar Tipo de Documento</a>
        </div>
        <div class="gestion">Menú de Operaciones de Tabla Tarifas
            <br>
            <a>Listar Tarifas</a>
            <br>
            <a>Agregar Tarifa</a>
        </div>
        <div id="contenido">
            <?php
            if(isset($_GET['contenido'])){
                include($_GET['contenido']);
            }

            ?>
        </div>
    </div>
</body>
</html>