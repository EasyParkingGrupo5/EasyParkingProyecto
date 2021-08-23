<?php

include_once "../../modelos/ConBdMysql.php";
include_once "../../modelos/ConstantesConexion.php";
include_once "../../modelos/modeloTarifas/TarifasDAO.php";

$registro['tarTipoVehiculo']='Camion';
$registro['tarValorTarifa']=150;
$registro['tarEstado']=1;

$tarifa = new TarifasDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);

$insertarTarifa = $tarifa -> insertar($registro);

echo "<pre>";
print_r($insertarTarifa);
echo "<pre>";

?>