<?php

include_once "../../modelos/ConBdMysql.php";
include_once "../../modelos/ConstantesConexion.php";
include_once "../../modelos/modeloVehiculos/VehiculosDAO.php";

$vehiculos = new VehiculosDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);

$listadoCompleto = $vehiculos->seleccionarTodos();

echo "<pre>";
print_r($listadoCompleto);
echo "</pre>";

?>