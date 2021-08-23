<?php

include_once "../../modelos/ConBdMysql.php";
include_once "../../modelos/ConstantesConexion.php";
include_once "../../modelos/modeloUsuario_s_roles/Usuario_s_rolesDAO.php";

$registro['id_usuario_s']=3;
$registro['id_rol']=2;

$Usuario_s_rolDAO= new UsuarioRolesDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);

$actuali = $Usuario_s_rolDAO ->actualizar($registro);

echo "<pre>";
print_r($actuali);
echo "</pre>";

?>