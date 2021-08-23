<?php

include_once "../../modelos/ConBdMysql.php";
include_once "../../modelos/ConstantesConexion.php";
include_once "../../modelos/modeloUsuario_s/Usuario_sDAO.php";

$registro['usuId']=11;
$registro['usuLogin']='camilo';
$registro['usuPassword']='edthsth';
$registro['usuUsuSesion']='camilo';
$registro['usuEstado']=1;
$registro['usuRemember_token']='arstgrsg';
$registro['usu_created_at']='2000-12-02 01:23';
$registro['usu_updated_at']='2000-12-02 01:23';

$Usuario_sDAO= new Usuario_sDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);


$insert = $Usuario_sDAO ->insertar($registro);

echo "<pre>";
print_r($insert);
echo "</pre>";

?>