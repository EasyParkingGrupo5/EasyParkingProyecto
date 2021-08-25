<?php

include_once PATH . 'modelos/modeloTickets/TicketsDAO.php';

class TicketsControlador{

    private $datos;
    
    public function __construct($datos){
        $this->datos = $datos;
        $this->TicketsControlador();
    }
    
    public function TicketsControlador(){
        switch ($this->datos['ruta']) {
            case 'listarTickets':
                $this->listarTickets();
                break;
            case 'actualizarTickets':
                $this->actualizarTickets();
                break;
        }
    }
    public function listarTickets(){
        $gestarTickets = new TicketsDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);
        $registroTickets = $gestarTickets -> seleccionarTodos();
    
        session_start();
    
        $_SESSION['listaDeTickets'] = $registroTickets;
    
        header("location:principal.php?contenido=vistas/vistasTickets/listarDTRegistrosTickets.php");
    }

    public  function actualizarTickets(){
        
    }
    
}

?>