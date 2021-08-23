<?php

include_once "../../modelos/ConBdMysql.php";
include_once "../../modelos/ConstantesConexion.php";
include_once "../../modelos/modeloEmpleados/EmpleadosDAO.php";

$sId = array(1);

$empleado = new EmpleadosDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);

$eliminarLogico = $empleado -> eliminarLogico($sId);

echo "<pre>";
print_r($eliminarLogico);
echo "</pre>";

?>