<?php

include_once "../../modelos/ConBdMysql.php";
include_once "../../modelos/ConstantesConexion.php";
include_once "../../modelos/modeloRol/RolDAO.php";

$sId=array(1,0);

$rolh= new RolDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);


$habilit=$rolh->habilitar($sId);

echo "<pre>";
print_r($habilit);
echo "</pre>";

?>