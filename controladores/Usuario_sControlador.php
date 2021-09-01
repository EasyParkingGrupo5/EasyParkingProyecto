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
		
        
        $buscarRol = new Usuario_sDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);

        $rolHallado = $buscarRol->seleccionarId(array($this->datos['rolId']));

        if (!$rolHallado['exitoSeleccionId']) {
            $insertarRol = new Usuario_sDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);	
            $insertoRol = $insertarRol->insertar($this->datos);  

            $resultadoInsercionRol = $insertoRol['resultado'];  

            session_start();
           $_SESSION['mensaje'] = "Se ha insertado " . $this->datos['rolId'];
            
            header("location:Controlador.php?ruta=listarUsuarios");
            
        }else{
        
            session_start();
            $_SESSION['rolId'] = $this->datos['rolId'];
            $_SESSION['rolNombre'] = $this->datos['rolNombre'];
            $_SESSION['rolDescripcion'] = $this->datos['rolDescripcionautor'];
            $_SESSION['rolEstado'] = $this->datos['rolEstado'];				
            
            $_SESSION['mensaje'] = " El id que trata de insertar ya existe en el sistema ";

            header("location:Controlador.php?ruta=InsertarRoles");					

        }					
}	
}

?>