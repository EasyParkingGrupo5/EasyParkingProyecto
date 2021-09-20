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
            case 'confirmarActualizarUsuarioRol':
                 $this -> confirmarActualizarUsuarioRol();
                break;
            case 'actualizarUsuarioRol':
                $this->ActualizarUsuarioRol();
                break;
        }
    }
    public function listarUsuarios_SRoles(){
        $gestarUsuarios = new UsuarioRolesDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);
        $registroUsuarios = $gestarUsuarios -> seleccionarTodos();
    
        session_start();
    
        $_SESSION['listaDeUsuarios_Roles'] = $registroUsuarios;
    
        header("location:vistas/vistaAdminUsuarios/vistasUsuarioRol/vistaAdminUsuarioRol.php?contenido=vistas/vistasUsuarios_S_Roles/listarRegistroUsuarios_S_Roles.php");
    }

    public  function actualizarUsuarios_SRoles(){

        $gestarUsuarios = new UsuarioRolesDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);
        $actualizarUsuarios = $gestarUsuarios -> seleccionarID(array($this->datos['usuId']));

        $actualizarDatosUsuarios = $actualizarUsuarios['registroEncontrado'][0];

        session_start();
        $_SESSION['actualizarDatosUsuarios_Roles']=$actualizarDatosUsuarios;

        header("location:principal.php?contenido=vistas/vistasUsuarios_S/vistaActualizarUsuarios_s.php");
        
    }

    public function confirmarActualizarUsuarioRol(){

        $gestarUsuarios = new UsuarioRolesDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);
        $actualizarUsuarios = $gestarUsuarios -> actualizar(array($this->datos));

        session_start();
            $_SESSION['mensaje'] = "Actualización realizada.";
            header("location:Controlador.php?ruta=listarUsuarios_SRoles");	

    }

    public  function actualizarUsuarioRol(){

        $gestarUsuariosRoles = new UsuarioRolesDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);
        $actualizarUsuariosRoles = $gestarUsuariosRoles -> seleccionarID(array($this->datos['usuId']));

        $actualizarDatosUsuariosRoles = $actualizarUsuariosRoles['registroEncontrado'][0];

        $gestarRol = new RolDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);
        $listarRol = $gestarRol -> seleccionarTodos(1);

        $gestarUsuarios = new Usuario_sDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);
        $listarUsuarios = $gestarUsuarios -> seleccionarTodos(1);

        session_start();
        $_SESSION['actualizarDatosUsuarios_Roles']=$actualizarDatosUsuariosRoles;
        $_SESSION['listarUsuarios']=$listarUsuarios;
        $_SESSION['listarRol']=$listarRol;

        header("location:vistas/vistaAdminUsuarios/vistasUsuarioRol/vistaAdminUsuarioRol.php?contenido=vistas/vistasUsuarios_S_Roles/vistaActualizarUsuarioRoles.php");
        
    }
    
}

?>