<?php

use PHPUnit\Framework\TestCase;
require_once 'modelos/modeloLibros/LibrosDAO.php';
require_once 'modelos/ConstantesConexion.php';


final class LibrosDAOTest extends TestCase{

    public function testSeleccionarTodos(){
        $libros = new LibroDAO (SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);
        $listadoCompleto = $libros->seleccionarTodos(1);
        $array = json_decode(json_encode($listadoCompleto), true);


        $this->assertEquals($listadoCompleto,$listadoCompleto);
    }

    public function testSeleccionarID(){

        $libros = new LibroDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);
        $sId = array(129);
        $buscarId = $libros -> seleccionarID($sId);
        $array = json_decode(json_encode($buscarId), true);
        $esperado['registroEncontrado'][0]['isbn'] = '129';
        $esperado['registroEncontrado'][0]['titulo'] = '24-TALLER DE FRUTAS Y HORTALIZAS';
        $esperado['registroEncontrado'][0]['autor'] = 'F.A.O';
        $esperado['registroEncontrado'][0]['precio'] = '39000';
        $esperado['registroEncontrado'][0]['estado'] = '1';
        $esperado['registroEncontrado'][0]['categoriaLibro_catLibId'] = '2';
        $esperado['exitoSeleccionId'] = true;
        
        $this -> assertEquals($esperado,$array);
        
    }

    public function testInsertar(){
        $libros = new LibroDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);
        $registro['isbn'] = 1;
        $registro['titulo'] = 'TPS 2252819';
        $registro['autor'] = 'Camilo Boada';
        $registro['precio'] = 100000;
        $registro['categoriaLibro_catLibId'] = 1;

        $esperado['Inserto'] = 1;
        $esperado['resultado'] = $registro['isbn'];

        $this -> assertEquals($esperado, $libros -> insertar($registro));
    }

    public function testActualizar(){
        $libros = new LibroDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);
        $registro[0]['autor'] = 'Jhon Sanchez';
        $registro[0]['titulo'] = 'Gorgona';
        $registro[0]['precio'] = '4';
        $registro[0]['categoriaLibro_catLibId'] = '1';
        $registro[0]['isbn'] = 1;

        $esperado['actualizacion'] = 1;
        $esperado['mensaje'] = 'Actualización realizada.';

        $this -> assertEquals($esperado, $libros -> actualizar($registro));
    }

    public function testEliminar(){
        $sId = array(1);

        $esperado['eliminado'] = true;
        $esperado['registroEliminado'] = $sId;

        $libros = new LibroDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);

        $this -> assertEquals($esperado, $libros -> eliminar($sId));
    }

    public function testHabilitar(){
        $sId = array(1);

        $esperado['actualizacion'] = true;
        $esperado['mensaje'] = 'Registro Activado';

        $libros = new LibroDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);

        $this -> assertEquals($esperado, $libros -> habilitar($sId));
    }

    public function testEliminarLogico(){
        $sId = array(1);

        $esperado['actualizacion'] = true;
        $esperado['mensaje'] = 'Registro Desactivado';

        $libros = new LibroDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);

        $this -> assertEquals($esperado, $libros -> eliminarLogico($sId));
    }
}

?>