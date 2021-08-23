<?php

include_once "../../modelos/ConBdMysql.php";
include_once "../../modelos/ConstantesConexion.php";
include_once "../../modelos/modeloTarifas/TarifasDAO.php";

$sId = array(3);

$tarifa = new TarifasDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);

$seleccionarId = $tarifa -> seleccionarID($sId);

echo "<pre>";
print_r($seleccionarId);
echo "<pre>";

?>