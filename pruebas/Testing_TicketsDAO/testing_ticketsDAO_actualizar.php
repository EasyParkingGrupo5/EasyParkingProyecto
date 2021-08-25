<?php

include_once "../../modelos/ConBdMysql.php";
include_once "../../modelos/ConstantesConexion.php";
include_once "../../modelos/modeloTickets/TicketsDAO.php";

$registro['ticId']=5;
$registro['Numero']="C26";
$registro['Fecha']="2021-06-14 12:45:03.000000";
$registro['HoraIngreso']="12:45:03";
$registro['HoraSalida']="02:05:07";
$registro['ValorFinal']=8500;

$tickets = new TicketsDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);

$actualizarTickets = $tickets -> actualizar($registro);

echo "<pre>";
print_r($actualizartickets);
echo "</pre>";

?>