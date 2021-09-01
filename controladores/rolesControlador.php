<?php

include_once PATH . 'modelos/modeloRol/rolDAO.php';

class RolesControlador{

    private $datos;
    
    public function __construct($datos){
        $this->datos = $datos;
        $this->rolesControlador();
    }
    
    public function RolesControlador(){
        switch ($this->datos['ruta']) {
            case 'listarRoles':
                $this->listarRoles();
                break;
            case 'actualizarRol':
                $this->actualizarRol();
                break;
            case 'confirmarActualizarRol':
                 $this -> confirmarActualizarRol();
                break;
            case 'cancelarActualizarRol':
                 $this -> cancelarActualizarRol();
                 break;
            case 'mostrarInsertarRoles':
                $this -> mostrarInsertarRoles();
                break;
            case 'insertarRol':
                $this -> insertarRol();
                break;
        }
    }
    public function listarRoles(){
        $gestarRoles = new RolDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);
        $registroRoles = $gestarRoles -> seleccionarTodos();
    
        session_start();
    
        $_SESSION['listaDeRoles'] = $registroRoles;
    
        header("location:principal.php?contenido=vistas/vistasRoles/listarRegistroRoles.php");
    }

    public  function actualizarRol(){

        $gestarRoles = new RolDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);
        $actualizarRoles = $gestarRoles -> seleccionarID(array($this->datos['rolId']));

        $actualizarDatosRoles = $actualizarRoles['registroEncontrado'][0];

        session_start();
        $_SESSION['actualizarDatosRoles']=$actualizarDatosRoles;

        header("location:principal.php?contenido=vistas/vistasRoles/vistaActualizarRol.php");
        
    }

    public function confirmarActualizarRol(){

        $gestarRoles = new RolDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);
        $actualizarRoles = $gestarRoles -> actualizar(array($this->datos));

        session_start();
            $_SESSION['mensaje'] = "Actualización realizada.";
            header("location:Controlador.php?ruta=listarRoles");	

    }

    public function cancelarActualizarRol(){

        session_start();
                $_SESSION['mensaje'] = "Desistió de la actualización";
		        header("location:Controlador.php?ruta=listarRoles");	

    }

    public function mostrarInsertarRoles(){
		
        header("Location: principal.php?contenido=vistas/vistasRoles/vistaIngresarRol.php");

}
    
    public function insertarRol(){
		
        
        $buscarRol = new RolDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);

        $rolHallado = $buscarRol->seleccionarId(array($this->datos['rolId']));

        if (!$rolHallado['exitoSeleccionId']) {
            $insertarRol = new RolDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);	
            $insertoRol = $insertarRol->insertar($this->datos);  

            $resultadoInsercionRol = $insertoRol['resultado'];  

            session_start();
           $_SESSION['mensaje'] = "Se ha insertado " . $this->datos['rolId'];
            
            header("location:Controlador.php?ruta=listarRoles");
            
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