<?php

include_once "../../modelos/ConBdMysql.php";
include_once "../../modelos/ConstantesConexion.php";
include_once "../../modelos/modeloReportes/ReportesDAO.php";

$registro['repId']=1;
$registro['repNumero']="F367";
$registro['repFecha']="2021-04-08 12:25:06.000000";
$registro['repEstado']=1;

$reportes = new ReportesDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);

$actualizarreportes = $reportes -> actualizar($registro);

echo "<pre>";
print_r($actualizarreportes);
echo "</pre>";

?>