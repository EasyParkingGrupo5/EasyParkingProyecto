
<?php

include_once "../../modelos/ConBdMysql.php";
include_once "../../modelos/ConstantesConexion.php";
include_once "../../modelos/modeloReportes/ReportesDAO.php";

$sId=array(6);

$reportes= new ReportesDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);


$elim = $reportes ->eliminar($sId);

echo "<pre>";
print_r($elim);
echo "</pre>";

?>