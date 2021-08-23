<?php

include_once "../../modelos/ConBdMysql.php";
include_once "../../modelos/ConstantesConexion.php";
include_once "../../modelos/modeloUsuario_s_roles/Usuario_s_rolesDAO.php";

$sId=array(3);

$Usuario_s_rolDAO= new UsuarioRolesDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);


$SelectId = $Usuario_s_rolDAO ->seleccionarID($sId);

echo "<pre>";
print_r($SelectId);
echo "</pre>";

?>