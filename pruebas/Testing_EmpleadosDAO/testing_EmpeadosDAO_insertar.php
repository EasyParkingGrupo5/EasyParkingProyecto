<?php

include_once "../../modelos/ConBdMysql.php";
include_once "../../modelos/ConstantesConexion.php";
include_once "../../modelos/modeloEmpleados/EmpleadosDAO.php";

$registro['empNumeroDocumento'] = 1010004241;
$registro['empPrimerNombre'] = 'Deinny';
$registro['empSegundoNombre'] = null;
$registro['empPrimerApellido'] = 'Boada';
$registro['empSegundoApellido'] = 'Merchan';
$registro['empTelefono'] = 2095910;
$registro['empTipoSangre'] = 'A';
$registro['empRh'] = 'NEGATIVO';
$registro['usuario_s_usuId'] = 1;
$registro['Tipos_Documentos_tipDocId'] = 3;

$empleado = new EmpleadosDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);

$insertar = $empleado -> insertar($registro);

echo "<pre>";
print_r($insertar);
echo "</pre>";

?>