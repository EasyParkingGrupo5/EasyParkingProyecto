<?php

include_once "../../modelos/ConstantesConexion.php";
include_once "../../modelos/ConBdMysql.php";
include_once "../../modelos/modeloEmpleados/EmpleadosDAO.php";

$sId = array(5);

$empleado = new EmpleadosDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);

$empleadoSeleccionado = $empleado -> seleccionarID($sId);

echo "<pre>";
print_r($empleadoSeleccionado);
echo "<pre>";

?>