<?php

include_once "../../modelos/ConBdMysql.php";
include_once "../../modelos/ConstantesConexion.php";
include_once "../../modelos/modeloEmpleados/EmpleadosDAO.php";

$sId = array(6);

$empleado = new EmpleadosDAO (SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);

$eliminar = $empleado -> eliminar($sId);

echo "<pre>";
print_r($eliminar);
echo "</pre>";

?>