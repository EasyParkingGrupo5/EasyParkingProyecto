<?php

include_once "../../modelos/ConstantesConexion.php";
include_once "../../modelos/ConBdMysql.php";
include_once "../../modelos/modeloEmpleados/EmpleadosDAO.php";

$registro['empNumeroDocumento'] = 1234;
$registro['empPrimerNombre'] = 'Camilo';
$registro['empSegundoNombre'] = 'Andres';
$registro['empPrimerApellido'] = 'Boada';
$registro['empSegundoApellido'] = 'Merchan';
$registro['empTelefono'] = 12345;
$registro['empTipoSangre'] = 'O';
$registro['empRh'] = 'POSITIVO';
$registro['empId'] = 7;
$registro['Tipos_Documentos_tipDocId'] = 1;

$empleado = new EmpleadosDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);

$actualizar = $empleado -> actualizar($registro);

echo"<pre>";
print_r($actualizar);
echo"</pre>";

?>