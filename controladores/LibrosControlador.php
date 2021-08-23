<?php

include_once PATH . 'modelos/modeloLibros/LibrosDAO.php';

class LibrosControlador{

    private $datos;
    
    public function __construct($datos){
        $this->datos = $datos;
        $this->librosControlador();
    }
    
    public function librosControlador(){
        switch ($this->datos['ruta']) {
            case 'listarLibros':
                $this->listarLibros();
                break;
            case 'actualizarLibros':
                $this->actualizarLibros();
                break;
        }
    }
    public function listarLibros(){
        $gestarLibros = new LibroDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);
        $registroLibros = $gestarLibros -> seleccionarTodos();
    
        session_start();
    
        $_SESSION['listaDeLibros'] = $registroLibros;
    
        header("location:principal.php?contenido=vistas/vistasLibros/listarDTRegistrosLibros.php");
    }

    public  function actualizarLibros(){
        
    }
    
}

?>
