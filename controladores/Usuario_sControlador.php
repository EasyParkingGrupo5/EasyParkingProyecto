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
            case 'mostrarInsertarUsuarios':
                $this -> mostrarInsertarUsuarios();
                break;
            case 'insertarUsuario':
                $this -> insertarUsuario();
                break;
            case 'eliminarUsuario':
                $this -> eliminarUsuario();
                break;
            case 'listarUsuariosInactivos':
                $this -> listarUsuariosInactivos();
                break;
            case 'habilitarUsuario':
                $this -> habilitarUsuario();
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
    
    public function mostrarInsertarUsuarios(){
		
        header("Location: principal.php?contenido=vistas/vistasUsuarios_S/vistaIngresarUsuario_S.php");

}
    
    public function insertarUsuario(){
		
        
        $buscarUsuario = new Usuario_sDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);

        $usuarioHallado = $buscarUsuario->seleccionarId(array($this->datos['usuId']));

        if (!$usuarioHallado['exitoSeleccionId']) {
            $insertarUsuario = new Usuario_sDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);	
            $insertoUsuario = $insertarUsuario->insertar($this->datos);  

            $resultadoInsercionUsuario = $insertoUsuario['resultado'];  

            session_start();
           $_SESSION['mensaje'] = "Se ha insertado " . $this->datos['usuId'];
            
            header("location:Controlador.php?ruta=listarUsuarios");
            
        }else{
        
            session_start();
            $_SESSION['usuId'] = $this->datos['usuId'];
            $_SESSION['usuLogin'] = $this->datos['usuLogin'];
            $_SESSION['usuPassword'] = $this->datos['usuPassword'];			
            
            $_SESSION['mensaje'] = " El id que trata de insertar ya existe en el sistema ";

            header("location:Controlador.php?ruta=InsertarUsuarios");					

        }					
    }	
    public function eliminarUsuario(){
        $gestarUsuarios = new Usuario_sDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);
        $inhabilitarUsuarios = $gestarUsuarios -> eliminarLogico(array($this -> datos['usuId']));

        session_start();

        $_SESSION['mensaje'] = "Registro Eliminado";
        header("location:Controlador.php?ruta=listarUsuarios");


    }
        
    public function listarUsuariosInactivos(){
        $gestarUsuarios = new Usuario_sDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);
        $listarInactivos = $gestarUsuarios -> seleccionarTodos(0);

        session_start();

        $_SESSION['listaDeUsuarios'] = $listarInactivos;

        header("location:principal.php?contenido=vistas/vistasUsuarios_S/listarUsuariosInactivos.php");
    }

    public function habilitarUsuario(){
        $gestarRoles = new Usuario_sDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);
        $inhabilitarRol = $gestarRoles -> habilitar(array($this -> datos['usuId']));

        session_start();

        $_SESSION['mensaje'] = "Registro Habilitado";
        header("location:Controlador.php?ruta=listarRolesInactivos");
    }
}

?>