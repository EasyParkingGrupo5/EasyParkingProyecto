<?php

include_once "../../modelos/ConBdMysql.php";
include_once "../../modelos/ConstantesConexion.php";
include_once "../../modelos/modeloVehiculos/VehiculosDAO.php";

$registro['vehId']=1;
$registro['vehNumero_Placa']="ASB207";
$registro['vehColor']="Amarillo";
$registro['vehMarca']="Mazda";
$registro['vehEstado']=1;

$vehiculos = new VehiculosDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);

$actualizarvehiculos = $vehiculos -> actualizar($registro);

echo "<pre>";
print_r($actualizarvehiculos);
echo "</pre>";

?>