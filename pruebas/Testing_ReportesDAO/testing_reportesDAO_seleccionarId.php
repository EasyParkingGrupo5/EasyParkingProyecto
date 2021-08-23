<?php

include_once "../../modelos/ConBdMysql.php";
include_once "../../modelos/ConstantesConexion.php";
include_once "../../modelos/modeloReportes/ReportesDAO.php";

$sId = array(2);
$reportes = new ReportesDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);
$buscarId = $reportes -> seleccionarID($sId);

echo "<pre>";
print_r($buscarId);
echo "</pre>";

?>