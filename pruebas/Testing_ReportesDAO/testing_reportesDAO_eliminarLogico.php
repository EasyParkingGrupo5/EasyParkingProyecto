<?php

include_once "../../modelos/ConBdMysql.php";
include_once "../../modelos/ConstantesConexion.php";
include_once "../../modelos/modeloReportes/ReportesDAO.php";

$sId = array(1);
$reportes = new ReportesDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);
$eliminarLogicoId = $reportes -> eliminarLogico($sId);

echo "<pre>";
print_r($eliminarLogicoId);
echo "</pre>";

?>