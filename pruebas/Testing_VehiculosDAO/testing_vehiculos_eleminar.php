<?php

include_once "../../modelos/ConBdMysql.php";
include_once "../../modelos/ConstantesConexion.php";
include_once "../../modelos/modeloVehiculos/VehiculosDAO.php";

$sId=array(6);

$vehiculo= new VehiculosDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);


$elim = $vehiculo ->eliminar($sId);

echo "<pre>";
print_r($elim);
echo "</pre>";

?>