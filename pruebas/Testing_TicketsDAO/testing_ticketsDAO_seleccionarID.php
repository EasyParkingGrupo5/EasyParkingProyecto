<?php

include_once "../../modelos/ConBdMysql.php";
include_once "../../modelos/ConstantesConexion.php";
include_once "../../modelos/modeloTickets/TicketsDAO.php";

$sId = array(2);
$tickets = new TicketsDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);
$buscarId = $tickets -> seleccionarID($sId);

echo "<pre>";
print_r($buscarId);
echo "</pre>";

?>