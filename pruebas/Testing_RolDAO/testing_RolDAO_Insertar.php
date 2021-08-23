<?php

include_once "../../modelos/ConBdMysql.php";
include_once "../../modelos/ConstantesConexion.php";
include_once "../../modelos/modeloRol/RolDAO.php";

$registro['rolId']=6;
$registro['rolNombre']='camilo';
$registro['rolDescripcion']='edthsth';
$registro['rolEstado']=1;
$registro['rolUsuSesion']='null';
$registro['rol_created_at']='2000-12-02 01:23';
$registro['rol_updated_at']='2000-12-02 01:23';

$rolh= new RolDao(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);

$insercion= $rolh->insertar($registro);

echo "<pre>";
print_r($insercion);
echo "</pre>";

?>