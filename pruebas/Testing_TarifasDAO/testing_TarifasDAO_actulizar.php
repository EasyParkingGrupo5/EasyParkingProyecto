<?php

include_once "../../modelos/ConBdMysql.php";
include_once "../../modelos/ConstantesConexion.php";
include_once "../../modelos/modeloTarifas/TarifasDAO.php";

$actualizar['tarTipoVehiculo']='Mono Patin';
$actualizar['tarValorTarifa']=10;
$actualizar['tarId']=5;

$tarifa = new TarifasDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);

$actualizarTarifa = $tarifa -> actualizar($actualizar);

echo "<pre>";
print_r($actualizarTarifa);
echo "</pre>";

?>