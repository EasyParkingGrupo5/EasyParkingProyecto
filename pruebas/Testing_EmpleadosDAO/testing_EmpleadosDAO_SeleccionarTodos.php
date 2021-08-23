<?php

include_once "../../modelos/ConBdMysql.php";
include_once "../../modelos/ConstantesConexion.php";
include_once "../../modelos/modeloEmpleados/EmpleadosDAO.php";

$empleado = new EmpleadosDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);

$listadoCompleto = $empleado -> seleccionarTodos();

echo "<pre>";
print_r($listadoCompleto);
echo "</pre>";

?>