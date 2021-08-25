<?php

include_once PATH . 'modelos/modeloVehículos/VehículosDAO.php';

class VehículosControlador{

    private $datos;
    
    public function __construct($datos){
        $this->datos = $datos;
        $this->VehículosControlador();
    }
    
    public function VehículosControlador(){
        switch ($this->datos['ruta']) {
            case 'listarVehículos':
                $this->listarVehículos();
                break;
            case 'actualizarVehículos':
                $this->actualizarVehículos();
                break;
        }
    }
    public function listarVehículos(){
        $gestarVehículos = new VehículosDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);
        $registroVehículos = $gestarVehículos -> seleccionarTodos();
    
        session_start();
    
        $_SESSION['listaDeVehículos'] = $registroVehículos;
    
        header("location:principal.php?contenido=vistas/vistasVehículos/listarDTRegistrosVehículos.php");
    }

    public  function actualizarVehículos(){
        
    }
    
}

?>