<?php

include_once "../../modelos/ConBdMysql.php";
include_once "../../modelos/ConstantesConexion.php";
include_once "../../modelos/modeloRol/RolDAO.php";

$sId=array(1);

$rol= new RolDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);


$SelectId = $rol ->seleccionarID($sId);

echo "<pre>";
print_r($SelectId);
echo "</pre>";

?>