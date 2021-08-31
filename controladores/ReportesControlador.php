<?php

include_once PATH . 'modelos/modeloReportes/ReportesDAO.php';

class ReportesControlador{

    private $datos;
    
    public function __construct($datos){
        $this->datos = $datos;
        $this->ReportesControlador();
    }
    
    public function ReportesControlador(){
        switch ($this->datos['ruta']) {
            case 'listarReportes':
                $this->listarReportes();
                break;
            case 'actualizarReportes':
                $this->actualizarReportes();
                break;
        }
    }
    public function listarReportes(){
        $gestarReportes = new ReportesDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);
        $registroReportes = $gestarReportes -> seleccionarTodos();
    
        session_start();
    
        $_SESSION['listaDeReportes'] = $registroReportes;
    
        header("location:principal.php?contenido=vistas/vistasReportes/listarDTRegistrosReportes.php");
    }

    public  function actualizarReportes(){
        
    }
    
}
