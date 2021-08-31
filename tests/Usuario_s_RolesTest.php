<?php

use PHPUnit\Framework\TestCase;
require_once 'modelos/modeloUsuario_s_roles/Usuario_s_rolesDAO.php';
require_once 'modelos/ConstantesConexion.php';


final class UsuarioRolesTest extends TestCase{

    public function testSeleccionarTodos(){
        $usuarios_roles = new UsuarioRolesDAO (SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);
        $listadoCompleto = $usuarios_roles->seleccionarTodos(1);
        $array = json_decode(json_encode($listadoCompleto), true);


        $this->assertEquals($listadoCompleto,$listadoCompleto);
    }

    public function testSeleccionarID(){

        $usuarios_roles = new UsuarioRolesDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);
        $id_usuario_s = array(1);
        $buscarId = $usuarios -> seleccionarID($id_usuario_s);
        $array = json_decode(json_encode($buscarId), true);
        $esperado['registroEncontrado'][0]['id_usuario_s'] = '3';
        $esperado['registroEncontrado'][0]['id_rol'] = '2';
        $esperado['registroEncontrado'][0]['estado'] = '1';
        $esperado['exitoSeleccionId'] = true;
        
        $this -> assertEquals($esperado,$array);
        
    }

    public function testInsertar(){
        $usuarios_roles = new UsuarioRolesDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);
        $registro['id_usuario_s'] = 11;
        $registro['id_rol'] = 1;
        $registro['estado'] = 1;

        $esperado['Inserto'] = true;
        $esperado['resultado'] = $registro['id_usuario_s'];

        $this -> assertEquals($esperado, $usuarios_roles -> insertar($registro));
    }

    public function testActualizar(){
        $usuarios_roles = new UsuarioRolesDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);
        $registro[0]['id_usuario_s'] = '3';
        $registro[0]['id_rol'] = '1';
        $registro[0]['estado'] = '1';

        $esperado['actualizacion'] = true;
        $esperado['mensaje'] = 'Actualización realizada.';

        $this -> assertEquals($esperado, $usuarios_roles -> actualizar($registro));
    }

    public function testEliminar(){

        $usuarios_roles = new UsuarioRolesDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);

        $id_usuario_s = array('11');

        $esperado['eliminado'] = true;
        $esperado['registroEliminado'] = $usuId;

        $this -> assertEquals($esperado, $usuarios_roles -> eliminar($id_usuario_s));
    }

    public function testHabilitar(){
        $usuarios_roles = new UsuarioRolesDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);

        $id_usuario_s = array(3);

        $esperado['actualizacion'] = true;
        $esperado['mensaje'] = 'Registro Activado';

        $this -> assertEquals($esperado, $usuarios_roles -> habilitar($id_usuario_s));
    }

    public function testEliminarLogico(){
        $id_usuario_s = array(3);

        $esperado['actualizacion'] = true;
        $esperado['mensaje'] = 'Registro Desactivado';

        $usuarios_roles = new UsuarioRolesDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);

        $this -> assertEquals($esperado, $usuarios_roles -> eliminarLogico($id_usuario_s));
    }
}

?>