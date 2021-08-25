<?php

include_once PATH . 'modelos/modeloVehiculos/VehiculosDAO.php';

class VehiculosControlador{

    private $datos;
    
    public function __construct($datos){
        $this->datos = $datos;
        $this->VehiculosControlador();
    }
    
    public function VehiculosControlador(){
        switch ($this->datos['ruta']) {
            case 'listarVehiculos':
                $this->listarVehiculos();
                break;
            case 'actualizarVehiculos':
                $this->actualizarVehiculos();
                break;
        }
    }
    public function listarVehiculos(){
        $gestarVehiculos = new VehiculosDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);
        $registroVehiculos = $gestarVehiculos -> seleccionarTodos();
    
        session_start();
    
        $_SESSION['listaDeVehiculos'] = $registroVehiculos;
    
        header("location:principal.php?contenido=vistas/vistasVehiculos/listarDTRegistrosVehiculos.php");
    }

    public  function actualizarVehiculos(){
        
    }
    
}

?>