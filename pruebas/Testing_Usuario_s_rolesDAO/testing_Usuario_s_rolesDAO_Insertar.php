<?php

include_once "../../modelos/ConBdMysql.php";
include_once "../../modelos/ConstantesConexion.php";
include_once "../../modelos/modeloUsuario_s_roles/Usuario_s_rolesDAO.php";

$registro['id_usuario_s']=9;
$registro['id_rol']=2;
$registro['estado']=1;
$registro['fechaRolhaUse']='2000-12-02 01:23';
$registro['obsFechaUserRol']='sghdfghg';
$registro['usuRolUsuSesion']='thsdghgfhdfh';
$registro['created_at']='2000-12-02 01:23';
$registro['updated_at']='2000-12-02 01:23';

$Usuario_s_rolDAO= new UsuarioRolesDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);

$insert = $Usuario_s_rolDAO ->insertar($registro);

echo "<pre>";
print_r($insert);
echo "</pre>";

?>