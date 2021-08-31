<?php

include_once '../../modelos/ConstantesConexion.php';
include_once PATH . 'modelos/ConBdMysql.php';
include_once '../../modelos/modeloLibros/LibrosDAO.php';

$libros=new LibroDAO(SERVIDOR,BASE,USUARIO_DB,CONTRASENIA_DB);

$listadoCompleto=$libros->seleccionarTodos(1);
$array = json_decode(json_encode($listadoCompleto), true);

echo "<pre>";
print_r($array);
echo "</pre>";

?>