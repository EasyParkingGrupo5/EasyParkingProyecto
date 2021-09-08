<?php

include_once PATH . 'modelos/modeloTickets/TicketsDAO.php';
include_once PATH . 'modelos/modeloEmpleados/EmpleadosDAO.php';
include_once PATH . 'modelos/modeloVehiculos/VehiculosDAO.php';
include_once PATH . 'modelos/modeloTarifas/TarifasDAO.php';


class TicketsControlador{

    private $datos;
    
    public function __construct($datos){
        $this->datos = $datos;
        $this->ticketsControlador();
    }
    
    public function ticketsControlador(){
        switch ($this->datos['ruta']) {
            case 'listarTickets':
                $this->listarTickets();
                break;
            case 'actualizarTickets':
                $this->actualizarTickets();
                break;
            case 'confirmarActualizarTickets': 
                 $this->confirmarActualizarTickets();
                break;
            case 'cancelarActualizarTickets':
                 $this -> cancelarActualizarTickets();
                break;
            case 'agregarTickets':
                $this -> agregarTickets();
                break;
            case 'confirmarInsertarTickets':
                $this -> confirmarInsertarTickets();
                break;
            case 'eliminarTickets':
                $this -> eliminarTickets();
                break;
            case 'listarTicketsInactivos':
                 $this -> listarTicketsInactivos();
                break;
            case 'habilitarTickets':
                $this -> habilitarTickets();
                 break;
            case 'mostrarInsertarticket':
                $this -> mostrarInsertarticket();
                break;
            
            
        }
    }
    public function listarTickets(){
        $gestarTickets = new TicketsDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);
        $registroTickets = $gestarTickets -> seleccionarTodos(1);
    
        session_start();
    
        $_SESSION['listaDeTickets'] = $registroTickets;
    
        header("location:principal.php?contenido=vistas/vistasTickets/listarDTRegistrosTickets.php");
    }

    public  function actualizarTickets(){
        $gestarTickets = new TicketsDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);
        $actualizarTickets = $gestarTickets -> seleccionarID(array($this->datos['idAct']));

        $actualizarDatosTickets = $actualizarTickets['registroEncontrado'][0];

        $gestarEmpleados = new EmpleadosDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);
        $listarEmpleados = $gestarEmpleados -> seleccionarTodos(1);

        $gestarTarifas = new TarifasDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);
        $listarValorTarifa = $gestarTarifas -> seleccionarTodos (1);

        
        session_start();

        $_SESSION['actualizarTickets'] = $actualizarDatosTickets;
        $_SESSION['listarEmpleados'] = $listarEmpleados;
        $_SESSION['listarTarifa'] = $listarValorTarifa;
       
        header("location:principal.php?contenido=vistas/vistasTickets/vistaActualizarTickets.php");
        
    }
    public function confirmarActualizarTickets(){
        $gestarTickets = new TicketsDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);
        $confirmarActualizarTickets = $gestarTickets -> actualizar(array($this->datos));

        session_start();

        $_SESSION['mensaje'] = "Registro Actualizado";
        header("location:Controlador.php?ruta=listarTickets");
    }
    public function confirmarInsertarTickets(){
        $gestarTickets = new TicketsDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);
        $buscarTickets = $gestarTickets -> seleccionarID(array($this->datos['ticId']));

        if(!$buscarTickets['exitoSeleccionId']){
            $insertarTickets = new TicketsDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);
            $insertoTickets = $insertarTickets -> insertar($this -> datos);

            session_start();

            $_SESSION['mensaje'] = 'Fue insertado con exito con el código '.$insertoTickets['resultado'];
            header("location:Controlador.php?ruta=listarTickets");
        }else{
            session_start();
                $_SESSION['ticId'] = $this->datos['ticId'];
                $_SESSION['ticNumero'] = $this->datos['ticNumero'];
                $_SESSION['ticFecha'] = $this->datos['autticFechaor'];
                $_SESSION['ticHoraIngreso'] = $this->datos['ticHoraIngreso'];
                $_SESSION['ticHoraSalida'] = $this->datos['ticHoraSalida'];
                $_SESSION['ticValorFinal'] = $this->datos['ticValorFinal'];
                $_SESSION['Empleados_empId'] = $this->datos['Empleados_empId'];
                $_SESSION['tarTipoVehiculo'] = $this->datos['tarTipoVehiculo'];					
					
                $_SESSION['mensaje'] = "El código " . $this->datos['ticId'] . " ya existe en el sistema.";

                header("location:Controlador.php?ruta=agregarTickets");
        }
    }
    public function mostrarInsertarticket(){

        $gestarEmpleados = new EmpleadosDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);
        $listarEmpleados = $gestarEmpleados -> seleccionarTodos(1);
        
        $gestarTarifas = new TarifasDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);
        $listarValorTarifa = $gestarTarifas -> seleccionarTodos (1);

        session_start();

        
        $_SESSION['listarEmpleados'] = $listarEmpleados;
        $_SESSION['listarValorTarifa'] = $listarValorTarifa;

        header('location:principal.php?contenido=vistas/vistasTickets/vistaInsertarTickets.php');
    }


    public function cancelarActualizarTickets(){
        
        header("location:Controlador.php?ruta=listarTickets");
    }

    public function agregarTickets(){
        $gestarEmpleados = new EmpleadosDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);
        $listarEmpleados = $gestarEmpleados -> seleccionarTodos();

        session_start();

        $_SESSION['listarEmpleados'] = $listarEmpleados;

        header('location:principal.php?contenido=vistas/vistasTickets/vistaInsertarTickets.php');
    }
    
        public function eliminarTickets(){
            $gestarTickets = new TicketsDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);
            $inhabilitarTickets = $gestarTickets -> eliminarLogico(array($this -> datos['idAct']));

            session_start();

            $_SESSION['mensaje'] = "Registro Eliminado";
            header("location:Controlador.php?ruta=listarTickets");


        }

        public function listarTicketsInactivos(){
            $gestarTickets = new TicketsDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);
            $listarInactivos = $gestarTickets -> seleccionarTodos(0);

            session_start();
    
            $_SESSION['listaDeTickets'] = $listarInactivos;
    
            header("location:principal.php?contenido=vistas/vistasTickets/listarDTRegistrosInactivos.php");
        }

        public function habilitarTickets(){
            $gestarTickets = new TicketsDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);
            $inhabilitarTickets = $gestarTickets -> habilitar(array($this -> datos['idAct']));

            session_start();

            $_SESSION['mensaje'] = "Registro Habilitado";
            header("location:Controlador.php?ruta=listarTicketsInactivos");
        }
    }

?>

  