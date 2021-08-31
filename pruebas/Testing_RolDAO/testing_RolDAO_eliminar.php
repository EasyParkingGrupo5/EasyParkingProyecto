<?php

include_once "../../modelos/ConBdMysql.php";
include_once "../../modelos/ConstantesConexion.php";
include_once "../../modelos/modeloRol/RolDAO.php";

$sId=array(1);

$rol= new RolDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);


$elimin = $rol ->eliminar($sId);

echo "<pre>";
print_r($elimin);
echo "</pre>";

?>