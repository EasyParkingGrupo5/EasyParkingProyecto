<?php

include_once "../../modelos/ConBdMysql.php";
include_once "../../modelos/ConstantesConexion.php";
include_once "../../modelos/modeloVehiculos/VehiculosDAO.php";

$registro['vehId']=6;
$registro['vehNumero_Placa']="ABD364";
$registro['vehColor']="Verde";
$registro['vehMarca']="Toyota";
$registro['vehEstado']=1;
$registro['vehUsuSesion']=NULL;
$registro['vehCreated_At']="2021-03-08 02:02:36";
$registro['vehUpdate_At']="2021-09-14 03:20:32";
$registro['Empleados_empId']=3;
$registro['Tickets_ticId']=4;



$vehiculo = new VehiculosDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);

$insertarVehiculo = $vehiculo -> insertar($registro);

echo "<pre>";
print_r($insertarVehiculo);
echo "</pre>";

?>