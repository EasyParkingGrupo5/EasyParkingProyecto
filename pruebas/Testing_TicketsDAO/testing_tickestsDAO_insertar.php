<?php

include_once "../../modelos/ConBdMysql.php";
include_once "../../modelos/ConstantesConexion.php";
include_once "../../modelos/modeloTickets/TicketsDAO.php";

$registro['ticId']=6;
$registro['ticNumero']="A15";
$registro['ticFecha']="2021-02-12 11:45:02.000000";
$registro['ticHoraIngreso']="11:45:02";
$registro['ticHoraSalida']="01:20:32";
$registro['ticValorFinal']=6500;
$registro['ticEstado']=1;
$registro['tic_created_at']="2021-02-12 01:20:32";
$registro['tic_updated_at']="2021-02-12 01:20:32";
$registro['ticUsuSesion']=NULL;
$registro['Empleados_empId']=5;
$registro['Tarifas_tarId']=4;


$tickets = new TicketsDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);

$insertarTickes = $tickets -> insertar($registro);

echo "<pre>";
print_r($insertarTickes);
echo "</pre>";

?>