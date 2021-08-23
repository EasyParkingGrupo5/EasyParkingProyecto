<?php

include_once "../../modelos/ConBdMysql.php";
include_once "../../modelos/ConstantesConexion.php";
include_once "../../modelos/modeloUsuario_s_roles/Usuario_s_rolesDAO.php";

$Usuario_s_rolDAO= new UsuarioRolesDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);


$Select = $Usuario_s_rolDAO ->seleccionarTodos();

echo "<pre>";
print_r($Select);
echo "</pre>";

?>