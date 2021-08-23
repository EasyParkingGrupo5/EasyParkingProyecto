<?php

include_once "../../modelos/ConBdMysql.php";
include_once "../../modelos/ConstantesConexion.php";
include_once "../../modelos/modeloVehiculos/VehiculosDAO.php";

$sId = array(2);
$vehiculos = new  VehiculosDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);
$habilitarId = $vehiculos -> habilitar($sId);

echo "<pre>";
print_r($habilitarId);
echo "</pre>";

?>