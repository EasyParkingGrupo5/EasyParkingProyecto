<?php

include_once "../../modelos/ConBdMysql.php";
include_once "../../modelos/ConstantesConexion.php";
include_once "../../modelos/modeloUsuario_s/Usuario_sDAO.php";

$Usuario_sDAO= new Usuario_sDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);


$Select = $Usuario_sDAO ->seleccionarTodos();

echo "<pre>";
print_r($Select);
echo "</pre>";

?>