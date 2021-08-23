<?php

include_once "../../modelos/ConBdMysql.php";
include_once "../../modelos/ConstantesConexion.php";
include_once "../../modelos/modeloUsuario_s/Usuario_sDAO.php";

$sId=array(11);

$Usuario_sDAO= new Usuario_sDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);


$elimLo = $Usuario_sDAO ->eliminar($sId);

echo "<pre>";
print_r($elimLo);
echo "</pre>";

?>