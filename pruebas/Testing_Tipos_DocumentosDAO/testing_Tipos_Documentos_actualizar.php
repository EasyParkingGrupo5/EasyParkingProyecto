<?php

include_once "../../modelos/ConBdMysql.php";
include_once "../../modelos/ConstantesConexion.php";
include_once "../../modelos/modeloTipos_Documentos/Tipos_DocumentosDAO.php";

$registro['tipDocSigla'] = 'R.C';
$registro['tipDocNombre_documento'] = 'Registro Civil';
$registro['tipDocId'] = 4;

$tipoDocumento = new TiposDocumentosDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);

$actualizar = $tipoDocumento -> actualizar($registro);

echo "<pre>";
print_r($actualizar);
echo "</pre>";

?>