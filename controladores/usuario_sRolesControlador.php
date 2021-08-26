<?php

include_once PATH . 'modelos/modeloUsuario_s_roles/Usuario_s_rolesDAO.php';

class Usuarios_SRolesControlador{

    private $datos;
    
    public function __construct($datos){
        $this->datos = $datos;
        $this->Usuarios_SRolesControlador();
    }
    
    public function Usuarios_SRolesControlador(){
        switch ($this->datos['ruta']) {
            case 'listarUsuarios_SRoles':
                $this->listarUsuarios_SRoles();
                break;
            case 'actualizarUsuarios_SRoles':
                $this->actualizarUsuarios_SRoles();
                break;
            case 'confirmarActualizarUsuarios':
                 $this -> confirmarActualizarUsuarios_SRoles();
                break;
            case 'cancelarActualizarUsuarios':
                 $this -> cancelarActualizarUsuarios_SRoles();
                 break;
        }
    }
    public function listarUsuarios_SRoles(){
        $gestarUsuarios = new UsuarioRolesDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);
        $registroUsuarios = $gestarUsuarios -> seleccionarTodos();
    
        session_start();
    
        $_SESSION['listaDeUsuarios'] = $registroUsuarios;
    
        header("location:principal.php?contenido=vistas/vistasUsuarios_S/listarRegistroUsuarios_s.php");
    }

    public  function actualizarUsuarios_SRoles(){

        $gestarUsuarios = new UsuarioRolesDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);
        $actualizarUsuarios = $gestarUsuarios -> seleccionarID(array($this->datos['usuId']));

        $actualizarDatosUsuarios = $actualizarUsuarios['registroEncontrado'][0];

        session_start();
        $_SESSION['actualizarDatosUsuarios']=$actualizarDatosUsuarios;

        header("location:principal.php?contenido=vistas/vistasUsuarios_S/vistaActualizarUsuarios_s.php");
        
    }

    public function confirmarActualizarUsuarios_SRoles(){

        $gestarUsuarios = new UsuarioRolesDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);
        $actualizarUsuarios = $gestarUsuarios -> actualizar(array($this->datos));

        session_start();
            $_SESSION['mensaje'] = "Actualización realizada.";
            header("location:Controlador.php?ruta=listarUsuarios");	

    }

    public function cancelarActualizarUsuarios_SRoles(){

        session_start();
                $_SESSION['mensaje'] = "Desistió de la actualización";
		        header("location:Controlador.php?ruta=listarUsuarios");	

    }
    
}

?>