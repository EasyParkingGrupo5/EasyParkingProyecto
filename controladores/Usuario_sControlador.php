<?php

include_once PATH . 'modelos/modeloUsuario_s/Usuario_sDAO.php';

class Usuario_sControlador{

    private $datos;
    
    public function __construct($datos){
        $this->datos = $datos;
        $this->usuario_sControlador();
    }
    
    public function Usuario_sControlador(){
        switch ($this->datos['ruta']) {
            case 'listarUsuarios':
                $this->listarUsuarios();
                break;
            case 'actualizarUsuarios':
                $this->actualizarUsuarios();
                break;
            case 'confirmarActualizarUsuarios':
                 $this -> confirmarActualizarUsuarios();
                break;
            case 'cancelarActualizarUsuarios':
                 $this -> cancelarActualizarUsuarios();
                 break;
        }
    }
    public function listarUsuarios(){
        $gestarUsuarios = new Usuario_sDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);
        $registroUsuarios = $gestarUsuarios -> seleccionarTodos();
    
        session_start();
    
        $_SESSION['listaDeUsuarios'] = $registroUsuarios;
    
        header("location:principal.php?contenido=vistas/vistasUsuarios_S/listarRegistroUsuarios_S.php");
    }

    public  function actualizarUsuarios(){

        $gestarUsuarios = new Usuario_sDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);
        $actualizarUsuarios = $gestarUsuarios -> seleccionarID(array($this->datos['usuId']));

        $actualizarDatosUsuarios = $actualizarUsuarios['registroEncontrado'][0];

        session_start();
        $_SESSION['actualizarDatosUsuarios']=$actualizarDatosUsuarios;

        header("location:principal.php?contenido=vistas/vistasUsuarios_S/vistaActualizarUsuarios_S.php");
        
    }

    public function confirmarActualizarUsuarios(){

        $gestarUsuarios = new Usuario_sDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);
        $actualizarUsuarios = $gestarUsuarios -> actualizar(array($this->datos));

        session_start();
            header("location:Controlador.php?ruta=listarUsuarios");	

    }

    public function cancelarActualizarUsuarios(){

        session_start();
		        header("location:Controlador.php?ruta=listarUsuarios");	

    }
    
}

?>