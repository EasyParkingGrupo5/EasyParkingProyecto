<?php

include_once "../../modelos/ConBdMysql.php";
include_once "../../modelos/ConstantesConexion.php";
include_once "../../modelos/modeloUsuario_s/Usuario_sDAO.php";

$sId= array(1);

$Usuario_sDAO= new Usuario_sDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);

$SelectId = $Usuario_sDAO ->seleccionarID($sId);

echo "<pre>";
print_r($SelectId);
echo "</pre>";

?>