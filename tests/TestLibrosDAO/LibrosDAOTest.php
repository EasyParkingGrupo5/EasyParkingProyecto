<?php

use PHPUnit\Framework\TestCase;
require_once 'modelos/modeloLibros/LibrosDAO.php';
require_once 'modelos/ConstantesConexion.php';


final class LibrosDAOTest extends TestCase{

    public function testSeleccionarTodos(){
        $libros = new LibroDAO (SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);
        $listadoCompleto = $libros->seleccionarTodos(1);

        $this->assertEmpty(!$listadoCompleto);
    }

    public function testSeleccionarID(){

        $libros = new LibroDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);
        $sId = array(129);
        $buscarId = $libros -> seleccionarID($sId);
        $esperado = $buscarId['exitoSeleccionId'];
        
        $this -> assertTrue($esperado);
        
    }

    public function testInsertar(){
        $libros = new LibroDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);
        $registro['isbn'] = 4;
        $registro['titulo'] = 'TPS 2252819';
        $registro['autor'] = 'Camilo Boada';
        $registro['precio'] = 100000;
        $registro['categoriaLibro_catLibId'] = 1;

        $insertar = $libros -> insertar($registro);
        $esperado = $insertar['Inserto'];

        $this -> assertTrue($esperado);
    }

    public function testActualizar(){
        $libros = new LibroDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);
        $registro[0]['autor'] = 'Jhon Sanchez';
        $registro[0]['titulo'] = 'Gorgona';
        $registro[0]['precio'] = '4';
        $registro[0]['categoriaLibro_catLibId'] = '1';
        $registro[0]['isbn'] = '4';

        $esperado['actualizacion'] = true;
        $esperado['mensaje'] = 'Actualización realizada.';

        $this -> assertEquals($esperado, $libros -> actualizar($registro));
    }

    public function testEliminar(){

        $libros = new LibroDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);
        $sId = array(4);
        $eliminar = $libros -> eliminar($sId);
        $esperado = $eliminar['eliminado'];

        $this -> assertTrue($esperado);
    }

    public function testHabilitar(){
        $libros = new LibroDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);
        $sId = array(128);
        $habilitar = $libros -> habilitar($sId);
        $esperado = $habilitar['actualizacion'] = true;

        $this -> assertTrue($esperado);
    }

    public function testEliminarLogico(){
        $libros = new LibroDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);
        $sId = array(128);
        $eliminarLogico = $libros -> eliminarLogico($sId);
        $esperado = $eliminarLogico['actualizacion'] = true;

        $this -> assertTrue($esperado);
    }
}

?>