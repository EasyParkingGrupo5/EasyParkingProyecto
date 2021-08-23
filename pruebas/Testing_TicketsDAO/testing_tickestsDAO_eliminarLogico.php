<?php

include_once "../../modelos/ConBdMysql.php";
include_once "../../modelos/ConstantesConexion.php";
include_once "../../modelos/modeloTickets/TicketsDAO.php";

$sId = array(1);
$tickets = new ticketsDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);
$eliminarLogicoId = $tickets -> eliminarLogico($sId);

echo "<pre>";
print_r($eliminarLogicoId);
echo "</pre>";

?>