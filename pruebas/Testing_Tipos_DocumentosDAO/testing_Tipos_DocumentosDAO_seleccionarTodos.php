<?php

 include_once "../../modelos/ConBdMysql.php";
 include_once "../../modelos/ConstantesConexion.php";
 include_once "../../modelos/modeloTipos_Documentos/Tipos_DocumentosDAO.php";

 $tiposDocumentos = new TiposDocumentosDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);

 $listadoCompleto = $tiposDocumentos->seleccionarTodos();

 echo "<pre>";
 print_r($listadoCompleto);
 echo "</pre>";

?>