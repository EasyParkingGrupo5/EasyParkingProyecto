<?php

include_once "../../modelos/ConBdMysql.php";
include_once "../../modelos/ConstantesConexion.php";
include_once "../../modelos/modeloReportes/ReportesDAO.php";

$sId = array(1);
$reportes = new  ReportesDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);
$habilitarId = $reportes -> habilitar($sId);

echo "<pre>";
print_r($habilitarId);
echo "</pre>";

?>