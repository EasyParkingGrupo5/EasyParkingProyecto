<?php

include_once "../../modelos/ConBdMysql.php";
include_once "../../modelos/ConstantesConexion.php";
include_once "../../modelos/modeloTarifas/TarifasDAO.php";

$sId = array(5);

$tarifa = new TarifasDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);

$eliminarTarifa = $tarifa -> eliminar($sId);

echo "<pre>";
print_r($eliminarTarifa);
echo "</pre>";

?>