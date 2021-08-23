<?php

include_once "../../modelos/ConBdMysql.php";
include_once "../../modelos/ConstantesConexion.php";
include_once "../../modelos/modeloUsuario_s/Usuario_sDAO.php";

$sId=array(3,0);

$Usuario_sDAO= new Usuario_sDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);


$habili = $Usuario_sDAO ->habilitar($sId);

echo "<pre>";
print_r($habili);
echo "</pre>";

?>