<?php

include_once "../../modelos/ConBdMysql.php";
include_once "../../modelos/ConstantesConexion.php";
include_once "../../modelos/modeloUsuario_s/Usuario_sDAO.php";

$sId=array(3,1);

$Usuario_sDAO= new Usuario_sDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);


$elim = $Usuario_sDAO ->eliminarLogico($sId);

echo "<pre>";
print_r($elim);
echo "</pre>";

?>