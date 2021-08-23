<?php

include_once '../../modelos/ConstantesConexion.php';
include_once '../../modelos/ConBdMysql.php';
include_once '../../modelos/modeloTickets/TicketsDAO.php';

$tickets = new TicketsDAO(SERVIDOR,BASE,USUARIO_DB,CONTRASENIA_DB);
$listadoCompleto = $tickets->seleccionarTodos();

echo "<pre>";
print_r ($listadoCompleto);
echo "</pre>";

?>