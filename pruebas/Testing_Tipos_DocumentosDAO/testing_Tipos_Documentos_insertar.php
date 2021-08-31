<?php

include_once "../../modelos/ConBdMysql.php";
include_once "../../modelos/ConstantesConexion.php";
include_once "../../modelos/modeloTipos_Documentos/Tipos_DocumentosDAO.php";

$registro['tipDocSigla'] = 'C.I' ;
$registro['tipDocNombre_documento'] = 'Cédula de extranjeria';
$registro['tipDocEstado'] = 1;

$tipoDocumento = new TiposDocumentosDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);

$insertar = $tipoDocumento -> insertar($registro);

echo "<pre>";
print_r($insertar);
echo "</pre>";

?>