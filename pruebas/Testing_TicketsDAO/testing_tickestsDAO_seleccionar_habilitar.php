<?php

include_once "../../modelos/ConBdMysql.php";
include_once "../../modelos/ConstantesConexion.php";
include_once "../../modelos/modeloTickets/TicketsDAO.php";

$sId = array(1);
$tickets = new  TicketsDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);
$habilitarId = $tickets -> habilitar($sId);

echo "<pre>";
print_r($habilitarId);
echo "</pre>";

?>