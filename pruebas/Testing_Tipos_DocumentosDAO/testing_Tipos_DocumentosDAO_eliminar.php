<?php

include_once "../../modelos/ConBdMysql.php";
include_once "../../modelos/ConstantesConexion.php";
include_once "../../modelos/modeloTipos_Documentos/Tipos_DocumentosDAO.php";

$sId = array(4);

$tipoDocumento = new TiposDocumentosDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);

$eliminar = $tipoDocumento -> eliminar($sId);

echo "<pre>";
print_r($eliminar);
echo "</pre>";

?>