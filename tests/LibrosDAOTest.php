<?php

use PHPUnit\Framework\TestCase;
require_once 'modelos/modeloLibros/LibrosDAO.php';
require_once 'modelos/ConstantesConexion.php';

final class LibrosDAOTest extends TestCase{



    public function testSeleccionarTodos(){
        $libros = new LibroDAO (SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);
        $id = array(128);
        $listadoCompleto = $libros->seleccionarID($id); 

        $this->assertObjectHasAttribute(Object,$listadoCompleto);
    }
}

?>