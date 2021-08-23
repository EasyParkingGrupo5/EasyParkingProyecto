<?php

include_once "../../modelos/ConBdMysql.php";
include_once "../../modelos/ConstantesConexion.php";
include_once "../../modelos/modeloUsuario_s_roles/Usuario_s_rolesDAO.php";

$sId=array(3,0);

$Usuario_s_rolDAO= new UsuarioRolesDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);


$habili = $Usuario_s_rolDAO ->habilitar($sId);

echo "<pre>";
print_r($habili);
echo "</pre>";

?>