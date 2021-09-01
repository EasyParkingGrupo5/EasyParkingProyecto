<?php
include_once './modelos/ConstantesConexion.php';
include_once PATH . 'controladores/ControladorPrincipal.php';

print_r($_GET);

$control = new ControladorPrincipal();

?>

