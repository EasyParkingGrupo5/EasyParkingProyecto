<?php

include_once "../../modelos/ConBdMysql.php";
include_once "../../modelos/ConstantesConexion.php";
include_once "../../modelos/modeloVehiculos/VehiculosDAO.php";

$sId = array(1);
$vehiculos = new VehiculosDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);
$buscarId = $vehiculos -> seleccionarID($sId);

echo "<pre>";
print_r($buscarId);
echo "</pre>";

?>