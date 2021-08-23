<?php

include_once "../../modelos/ConBdMysql.php";
include_once "../../modelos/ConstantesConexion.php";
include_once "../../modelos/modeloUsuario_s_roles/Usuario_s_rolesDAO.php";

$sId=array(9);

$Usuario_s_rolDAO= new UsuarioRolesDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);


$elim = $Usuario_s_rolDAO ->eliminar($sId);

echo "<pre>";
print_r($elim);
echo "</pre>";

?>