<?php

include_once PATH . 'modelos/modeloVehiculos/VehiculosDAO.php';
include_once PATH . 'modelos/modeloEmpleados/EmpleadosDAO.php';
include_once PATH . '/modelos/modeloTickets/TicketsDAO.php';
include_once PATH . '/modelos/modeloTarifas/TarifasDAO.php';

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
        $gestarVehiculos = new VehiculosDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);
        $actualizarVehiculos = $gestarVehiculos -> seleccionarID(array($this->datos['idAct']));

        $actualizarDatosVehiculos = $actualizarVehiculos['registroEncontrado'][0];

        $gestarEmpleados = new EmpleadosDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);
        $listarEmpleados = $gestarEmpleados -> seleccionarTodos();

        $gestarTickets = new TicketsDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);
        $listarTickets = $gestarTickets -> seleccionarTodos();

        $gestarTarifas = new TarifasDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);
        $listarTarifas = $gestarTarifas -> seleccionarTodos();



        session_start();

        $_SESSION['actualizarVehiculos'] = $actualizarDatosVehiculos;
        $_SESSION['listarEmpleados'] = $listarEmpleados;
        $_SESSION['listarTickets'] = $listarTickets;
        $_SESSION['listarTarifas'] = $listarTarifas;


        header("location:principal.php?contenido=vistas/vistasVehiculos/vistaActualizarVehiculos.php");
        
    }
    
public function confirmarActualizarVehiculos(){
    $gestarVehiculos = new VehiculosDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);
    $confirmarActualizarVehiculos = $gestarVehiculos -> actualizar(array($this->datos));

    session_start();

    $_SESSION['mensaje'] = "Registro Actualizado";
    header("location:Controlador.php?ruta=listarVehiculos");
}

public function cancelarActualizarVehiculos(){
    
    header("location:Controlador.php?ruta=listarVehiculos");
}

public function agregarVehiculos(){
    $gestarEmpleados = new EmpleadosDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);
    $listarEmpleados = $gestarEmpleados -> seleccionarTodos();

    session_start();

    $_SESSION['listarEmpleados'] = $listarEmpleados;

    header('location:principal.php?contenido=vistas/vistasVehiculos/vistaInsertarVehiculos.php');
}

public function confirmarInsertarVehiculos(){
    $gestarVehiculos = new VehiculosDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);
    $buscarVehiculos = $gestarVehiculos -> seleccionarID(array($this->datos['isbn']));

    if(!$buscarVehiculos['exitoSeleccionId']){
        $insertarVehiculos = new VehiculosDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);
        $insertoVehiculos = $insertarVehiculos -> insertar($this -> datos);

        session_start();

        $_SESSION['mensaje'] = 'Fue insertado con exito con el código '.$insertoVehiculos['resultado'];
        header("location:Controlador.php?ruta=listarVehiculos");
    }else{
        session_start();
            $_SESSION['vehId'] = $this->datos['vehId'];
            $_SESSION['vehNumero_Placa'] = $this->datos['vehNumero_Placa'];
            $_SESSION['vehColor'] = $this->datos['vehColor'];
            $_SESSION['vehColor'] = $this->datos['vehColor'];
            $_SESSION['vehMarca'] = $this->datos['vehMarca'];
            $_SESSION['empId'] = $this->datos['empId'];
            $_SESSION['ticNumero'] = $this->datos['ticNumero'];					
                
            $_SESSION['mensaje'] = "El código " . $this->datos['vehId'] . " ya existe en el sistema.";

            header("location:Controlador.php?ruta=agregarVehiculos");
    }

    }
    
    public function eliminarVehiculos(){
        $gestarVehiculos = new VehiculosDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);
        $inhabilitarVehiculos = $gestarVehiculos -> eliminarLogico(array($this -> datos['idAct']));

        session_start();

        $_SESSION['mensaje'] = "Registro Eliminado";
        header("location:Controlador.php?ruta=listarVehiculos");


    }

    public function listarVehiculosInactivos(){
        $gestarVehiculos = new VehiculosDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);
        $listarInactivos = $gestarVehiculos -> seleccionarTodos(0);

        session_start();

        $_SESSION['listaDeVehiculos'] = $listarInactivos;

        header("location:principal.php?contenido=vistas/vistasVehiculos/listarDTRegistrosInactivos.php");
    }

    public function habilitarVehiculos(){
        $gestarVehiculos = new VehiculosDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);
        $inhabilitarVehiculos = $gestarVehiculos -> habilitar(array($this -> datos['idAct']));

        session_start();

        $_SESSION['mensaje'] = "Registro Habilitado";
        header("location:Controlador.php?ruta=listarVehiculosInactivos");
    }
}

?>


