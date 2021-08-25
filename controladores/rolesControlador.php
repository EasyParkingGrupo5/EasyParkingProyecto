<?php

include_once PATH . 'modelos/modeloRol/rolDAO.php';

class rolesControlador{

    private $datos;
    
    public function __construct($datos){
        $this->datos = $datos;
        $this->rolesControlador();
    }
    
    public function rolesControlador(){
        switch ($this->datos['ruta']) {
            case 'listarRoles':
                $this->listarRoles();
                break;
            case 'actualizarRoles':
                $this->actualizarRoles();
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

    public  function actualizarRoles(){
        
    }
    
}

?>