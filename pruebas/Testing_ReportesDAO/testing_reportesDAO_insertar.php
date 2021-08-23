<?php

include_once "../../modelos/ConBdMysql.php";
include_once "../../modelos/ConstantesConexion.php";
include_once "../../modelos/modeloReportes/ReportesDAO.php";

$registro['repId']=6;
$registro['repNumero']="B615";
$registro['repFecha']="2021-02-12 11:45:02.000000";
$registro['repEstado']=1;
$registro['rep_created_at']="2021-03-29 11:20:03";
$registro['rep_updated_at']=NULL;
$registro['repUsuSesion']="2021-03-29 11:20:03";
$registro['Empleados_empId']=2;
$registro['Vehiculos_vehId']=4;



$reportes = new ReportesDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);

$insertarReportes = $reportes -> insertar($registro);

echo "<pre>";
print_r($insertarReportes);
echo "</pre>";

?>