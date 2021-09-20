<?php

include_once PATH . 'modelos/modeloTarifas/TarifasDAO.php';

class TarifasControlador{

    private $datos;
    
    public function __construct($datos){
        $this->datos = $datos;
        $this->tarifasControlador();
    }

    public function tarifasControlador(){
        switch ($this -> datos['ruta']) {
            case 'listarTarifas':
                $this -> listarTarifas();
                break;
            case 'vistaActualizarTarifa':
                $this -> vistaActualizarTarifa();
                break;
            case 'cancelarActualizarTarifa':
                $this -> cancelarActualizarTarifa();
                break;
            case 'confirmarActualizarTarifa':
                $this -> confirmarActualizarTarifa();
                break;
            case 'eliminarTarifa':
                $this -> eliminarTarifa();
                break;
            case 'vistaInsertarTarifa':
                $this -> vistaInsertarTarifa();
                break;
            case 'insertarTarifa':
                $this -> insertarTarifa();
                break;
            case 'listarTarifasInactivas':
                $this -> listarTarifasInactivas();
                break;
            case 'habilitarTarifa':
                $this -> habilitarTarifa();
                break;
        }
    }

    public function listarTarifas(){
        $gestarTarifas = new TarifasDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);
        $registrosTarifas = $gestarTarifas -> seleccionarTodos(1);

        session_start();

        $_SESSION['listadoTarifas'] = $registrosTarifas;

        header('location: vistas/vistaAdminTarifas/vistaAdminTarifas.php?contenido=vistas/vistaTarifas/listarDTTarifas.php');
    }

    public function vistaActualizarTarifa(){
        $gestarTarifas = new TarifasDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);
        $buscarTarifa = $gestarTarifas -> seleccionarID($this -> datos['tarId']);

        $actualizarDatosTarifa = $buscarTarifa['registroEncontrado'][0];

        session_start();

        $_SESSION['actualizarDatosTarifa'] = $actualizarDatosTarifa;

        header('location: vistas/vistaAdminTarifas/vistaAdminTarifas.php?contenido=vistas/vistaTarifas/vistaActualizarTarifa.php');
    }

    public function cancelarActualizarTarifa(){
        header('location: Controlador.php?ruta=listarTarifas');
    }

    public function confirmarActualizarTarifa(){
        $gestarTarifas = new TarifasDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);
        $actualizarTarifa = $gestarTarifas -> actualizar(array($this -> datos));

        session_start();
        
        $_SESSION['mensaje'] = 'Tarifa Actualizada';
        header('location: Controlador.php?ruta=listarTarifas');
    }

    public function eliminarTarifa(){
        $gestarTarifas = new TarifasDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);
        $eliminarTarifa = $gestarTarifas -> eliminarLogico($this -> datos['sId']);

        session_start();

        $_SESSION['mensaje'] = 'Registro Eliminado';
        header('location: Controlador.php?ruta=listarTarifas');
    }

    public function vistaInsertarTarifa(){
        header('location: vistas/vistaAdminTarifas/vistaAdminTarifas.php?contenido=vistas/vistaTarifas/vistaInsertarTarifa.php');
    }

    public function insertarTarifa(){
        $gestarTarifas = new TarifasDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);
	
        $insertoTarifa = $gestarTarifas->insertar($this->datos);  

        $resultadoInsercionTarifa = $insertoTarifa['resultado'];  

        session_start();
        $_SESSION['mensaje'] = "Se ha insertado con éxito con el id " . $resultadoInsercionTarifa;
            
        header("location:Controlador.php?ruta=listarTarifas");
    }

    public function listarTarifasInactivas(){
        $gestarTarifas = new TarifasDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);
        $registrosTarifas = $gestarTarifas -> seleccionarTodos(0);

        session_start();

        $_SESSION['listadoTarifas'] = $registrosTarifas;

        header('location: vistas/vistaAdminTarifas/vistaAdminTarifas.php?contenido=vistas/vistaTarifas/listarDTTarifasInactivas.php');
    }
    public function habilitarTarifa(){
        $gestarTarifas = new TarifasDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);
        $habilitarTarifa = $gestarTarifas -> habilitar($this -> datos['sId']);

        session_start();

        $_SESSION['mensaje'] = 'Registro Habilitado';
        header('location: Controlador.php?ruta=listarTarifasInactivas');
    }
}

?>