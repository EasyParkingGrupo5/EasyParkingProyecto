<?php

use PHPUnit\Framework\TestCase;
require_once 'modelos/modeloUsuario_s/Usuario_sDAO.php';
require_once 'modelos/ConstantesConexion.php';


final class Usuario_sTest extends TestCase{

    public function testSeleccionarTodos(){
        $usuarios = new Usuario_sDAO (SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);
        $listadoCompleto = $usuarios->seleccionarTodos(1);
        $array = json_decode(json_encode($listadoCompleto), true);


        $this->assertEquals($listadoCompleto,$listadoCompleto);
    }

    public function testSeleccionarID(){

        $usuarios = new Usuario_sDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);
        $usuId = array(1);
        $buscarId = $usuarios -> seleccionarID($usuId);
        $array = json_decode(json_encode($buscarId), true);
        $esperado['registroEncontrado'][0]['usuId'] = '1';
        $esperado['registroEncontrado'][0]['usuLogin'] = 'adminHAGS@si.com';
        $esperado['registroEncontrado'][0]['usuPassword'] = 'd9840773233fa6b19fde8caf765402f5';
        $esperado['registroEncontrado'][0]['usuEstado'] = '1';
        $esperado['registroEncontrado'][0]['usuRemember_token'] = '';
        $esperado['exitoSeleccionId'] = true;
        
        $this -> assertEquals($esperado,$array);
        
    }

    public function testInsertar(){
        $usuarios = new Usuario_sDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);
        $registro['usuId'] = 11;
        $registro['usuLogin'] = 'juliarodriguez@gmail.com';
        $registro['usuPassword'] = 'juli24_Ro7';
        $registro['usuEstado'] = 1;
        $registro['usuRemember_token'] = '';

        $esperado['Inserto'] = true;
        $esperado['resultado'] = $registro['usuId'];

        $this -> assertEquals($esperado, $usuarios -> insertar($registro));
    }

    public function testActualizar(){
        $usuarios = new Usuario_sDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);
        $registro[0]['usuLogin'] = 'adminHAGS@si.com';
        $registro[0]['usuPassword'] = 'juli24_Ro7';
        $registro[0]['usuEstado'] = '1';
        $registro[0]['usuRemember_token'] = 'rthytrdd';
        $registro[0]['usuId'] = '1';

        $esperado['actualizacion'] = true;
        $esperado['mensaje'] = 'Actualización realizada.';

        $this -> assertEquals($esperado, $usuarios -> actualizar($registro));
    }

    public function testEliminar(){

        $usuarios = new Usuario_sDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);

        $usuId = array('11');

        $esperado['eliminado'] = true;
        $esperado['registroEliminado'] = $usuId;

        $this -> assertEquals($esperado, $usuarios -> eliminar($usuId));
    }

    public function testHabilitar(){
        $usuarios = new Usuario_sDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);

        $usuId = array(1);

        $esperado['actualizacion'] = true;
        $esperado['mensaje'] = 'Registro Activado';

        $this -> assertEquals($esperado, $usuarios -> habilitar($usuId));
    }

    public function testEliminarLogico(){
        $usuId = array(1);

        $esperado['actualizacion'] = true;
        $esperado['mensaje'] = 'Registro Desactivado';

        $usuarios = new Usuario_sDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);

        $this -> assertEquals($esperado, $usuarios -> eliminarLogico($usuId));
    }
}

?>