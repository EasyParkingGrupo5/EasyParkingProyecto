<?php

include_once "../../modelos/ConstantesConexion.php";
include_once "../../modelos/ConBdMysql.php";
include_once "../../modelos/modeloTipos_Documentos/Tipos_DocumentosDAO.php";

$sId = array(2);

$tipoDocumento = new TiposDocumentosDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);

$seleccionar = $tipoDocumento -> seleccionarID($sId);

echo "<pre>";
print_r($seleccionar);
echo "</pre>";

?>