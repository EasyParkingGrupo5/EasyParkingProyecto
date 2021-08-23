<?php

include_once "../../modelos/ConBdMysql.php";
include_once "../../modelos/ConstantesConexion.php";
include_once "../../modelos/modeloUsuario_s_roles/Usuario_s_rolesDAO.php";

$sId=array(3,1);

$Usuario_s_rolDAO= new UsuarioRolesDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);


$elimLo = $Usuario_s_rolDAO ->eliminarLogico($sId);

echo "<pre>";
print_r($elimLo);
echo "</pre>";

?>