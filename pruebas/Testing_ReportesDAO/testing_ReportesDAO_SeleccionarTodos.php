<?php

include_once "../../modelos/ConBdMysql.php";
include_once "../../modelos/ConstantesConexion.php";
include_once "../../modelos/modeloReportes/ReportesDAO.php";

$reportes = new ReportesDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);

$listadoCompleto = $reportes->seleccionarTodos();

echo "<pre>";
print_r($listadoCompleto);
echo "</pre>";

?>