<?php

include_once "../../modelos/ConstantesConexion.php";
include_once "../../modelos/ConBdMysql.php";
include_once "../../modelos/modeloUsuario_s/Usuario_sDAO.php";

$registro['usuId']=10;
$registro['usuLogin']='camilo';
$registro['usuPassword']='edthsth';

$Usuario_sDAO= new Usuario_sDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);


$actuali = $Usuario_sDAO->actualizar($registro);

echo "<pre>";
print_r($actuali);
echo "</pre>";

?>