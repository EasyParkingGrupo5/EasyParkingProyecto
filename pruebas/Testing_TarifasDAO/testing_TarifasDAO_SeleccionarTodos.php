<?php

include_once "../../modelos/ConBdMysql.php";
include_once "../../modelos/ConstantesConexion.php";
include_once "../../modelos/modeloTarifas/TarifasDAO.php";

$tarifas = new TarifasDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);

$listadoCompleto = $tarifas->seleccionarTodos();

echo "<pre>";
print_r($listadoCompleto);
echo "</pre>";

?>