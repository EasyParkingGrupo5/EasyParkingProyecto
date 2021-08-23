
<?php

include_once "../../modelos/ConBdMysql.php";
include_once "../../modelos/ConstantesConexion.php";
include_once "../../modelos/modeloTickets/TicketsDAO.php";

$sId=array(6);

$tickets= new TicketsDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);


$elim = $tickets ->eliminar($sId);

echo "<pre>";
print_r($elim);
echo "</pre>";

?>