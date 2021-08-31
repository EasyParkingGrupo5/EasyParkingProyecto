<?php

include_once '../../modelos/ConstantesConexion.php';
include_once '../../modelos/ConBdMysql.php';
include_once '../../modelos/modeloLibros/LibrosDAO.php';

$sId = array(129);
$libro = new LibroDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);
$buscarId = $libro -> seleccionarID($sId);
$array = json_decode(json_encode($buscarId), true);

echo "<pre>";
print_r($array);
echo "</pre>";

?>