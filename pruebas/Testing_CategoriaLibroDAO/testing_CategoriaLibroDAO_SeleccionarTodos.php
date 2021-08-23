<?php

include_once "../../modelos/ConBdMysql.php";
include_once "../../modelos/ConstantesConexion.php";
include_once "../../modelos/modeloCategoriaLibro/CategoriaLibroDAO.php";

$categoriaLibro = new CategoriaLibroDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);

$listadoCompleto = $categoriaLibro -> seleccionarTodos();

echo "<pre>";
print_r($listadoCompleto);
echo "</pre>";

?>