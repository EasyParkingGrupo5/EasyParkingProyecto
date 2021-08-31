<?php

include_once "../../modelos/ConBdMysql.php";
include_once "../../modelos/ConstantesConexion.php";
include_once "../../modelos/modeloRol/RolDAO.php";

$registro['rolId']=1;
$registro['rolDescripcion']='Administrador';
$registro['rolNombre']='Administrador';

$rolh= new RolDao(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);

$actuali= $rolh->actualizar($registro);

echo "<pre>";
print_r($actuali);
echo "</pre>";

?>