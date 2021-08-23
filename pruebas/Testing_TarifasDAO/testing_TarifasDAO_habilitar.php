<?php

include_once "../../modelos/ConBdMysql.php";
include_once "../../modelos/ConstantesConexion.php";
include_once "../../modelos/modeloTarifas/TarifasDAO.php";

$sId = array(1);

$tarifa = new TarifasDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);

$habilitarTarifa = $tarifa -> habilitar($sId);

echo "<pre>";
print_r($habilitarTarifa);
echo "</pre>";

?>