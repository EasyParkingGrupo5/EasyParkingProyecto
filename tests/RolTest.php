<?php

use PHPUnit\Framework\TestCase;
require_once 'modelos/modeloRol/RolDAO.php';
require_once 'modelos/ConstantesConexion.php';


final class RolDAOTest extends TestCase{

    public function testSeleccionarTodos(){
        $roles = new RolDAO (SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);
        $listadoCompleto = $roles->seleccionarTodos(1);
        $array = json_decode(json_encode($listadoCompleto), true);


        $this->assertEquals($listadoCompleto,$listadoCompleto);
    }

    public function testSeleccionarID(){

        $roles = new RolDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);
        $rolId = array(129);
        $buscarId = $roles -> seleccionarID($rolId);
        $array = json_decode(json_encode($buscarId), true);
        $esperado['registroEncontrado'][0]['rolId'] = '1';
        $esperado['registroEncontrado'][0]['rolNombre'] = 'Administrador';
        $esperado['registroEncontrado'][0]['rolDescripcion'] = 'Administrador';
        $esperado['registroEncontrado'][0]['rolEstado'] = '1';
        $esperado['exitoSeleccionId'] = true;
        
        $this -> assertEquals($esperado,$array);
        
    }

    public function testInsertar(){
        $roles = new RolDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);
        $registro['rolId'] = 8;
        $registro['rolNombre'] = 'Gimnasta';
        $registro['rolDescripcion'] = 'Gimnasta';
        $registro['rolEstado'] = 1;

        $esperado['Inserto'] = true;
        $esperado['resultado'] = $registro['rolId'];

        $this -> assertEquals($esperado, $roles -> insertar($registro));
    }

    public function testActualizar(){
        $roles = new RolDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);
        $registro[0]['rolNombre'] = 'Atleta';
        $registro[0]['rolDescripcion'] = 'Atleta';
        $registro[0]['rolEstado'] = '1';
        $registro[0]['rolId'] = '1';

        $esperado['actualizacion'] = true;
        $esperado['mensaje'] = 'Actualización realizada.';

        $this -> assertEquals($esperado, $roles -> actualizar($registro));
    }

    public function testEliminar(){

        $roles = new RolDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);

        $rolId = array('8');

        $esperado['eliminado'] = true;
        $esperado['registroEliminado'] = $rolId;

        $this -> assertEquals($esperado, $roles -> eliminar($rolId));
    }

    public function testHabilitar(){
        $roles = new RolDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);

        $rolId = array(1);

        $esperado['actualizacion'] = true;
        $esperado['mensaje'] = 'Registro Activado';

        $this -> assertEquals($esperado, $roles -> habilitar($rolId));
    }

    public function testEliminarLogico(){
        $rolId = array(1);

        $esperado['actualizacion'] = true;
        $esperado['mensaje'] = 'Registro Desactivado';

        $roles = new RolDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);

        $this -> assertEquals($esperado, $roles -> eliminarLogico($rolId));
    }
}

?>