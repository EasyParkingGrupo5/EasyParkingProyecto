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
            case 'insertarTicket':
                $this -> insertarTicket();
                break;
            case 'abrirTicket':
                $this -> abrirTicket();
                break;
            case 'calcularValorFinal':
                $this -> calcularValorFinal();
                break;
            case 'calcularCambio':
                $this -> calcularCambio();
                break;
            case 'cerrarTicket':
                $this -> cerrarTicket();
                break;
            
        }
    }
    public function listarTickets(){
        $gestarTickets = new TicketsDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);
        $registroTickets = $gestarTickets -> seleccionarTodos(1);
    
        session_start();
    
        $_SESSION['listaDeTickets'] = $registroTickets;
    
        header("location:vistas/vistaAdminTickets/vistaAdminTickets.php?contenido=vistas/vistasTickets/listarTicketsAbiertos.php");
    }

    public  function actualizarTickets(){
        $gestarTickets = new TicketsDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);
        $actualizarTickets = $gestarTickets -> seleccionarID(array($this->datos['idAct']));

        $actualizarDatosTickets = $actualizarTickets['registroEncontrado'][0];

        $gestarTarifas = new TarifasDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);
        $listarValorTarifa = $gestarTarifas -> seleccionarTodos (1);

        $gestarVehiculos = new VehiculosDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);
        $listarVehiculos = $gestarVehiculos -> seleccionarTodos (1);

        
        session_start();

        $_SESSION['actualizarTickets'] = $actualizarDatosTickets;
        $_SESSION['listarTarifa'] = $listarValorTarifa;
        $_SESSION['listarVehiculos'] = $listarVehiculos;
       
        header("location:vistas/vistaAdminTickets/vistaAdminTickets.php?contenido=vistas/vistasTickets/vistaCerrarTicket.php");
        
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
    
        public function cerrarTicket(){
            $gestarTickets = new TicketsDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);
            $inhabilitarTickets = $gestarTickets -> eliminarLogico(array($this -> datos['ticNumero']));

            session_start();

            $_SESSION['mensaje'] = "Ticket cerrado";
            unset($_SESSION['valorTotal']);
            unset($_SESSION['horaFinal']);
            unset($_SESSION['valorRecibido']);
            unset($_SESSION['totalCambio1']);
            header("location:vistas/vistaAdminTickets/vistaAdminTickets.php");


        }

        public function listarTicketsInactivos(){
            $gestarTickets = new TicketsDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);
            $listarInactivos = $gestarTickets -> seleccionarTodos(0);

            session_start();
    
            $_SESSION['listaDeTickets'] = $listarInactivos;
    
            header("location:vistas/vistaAdminTickets/vistaAdminTickets.php?contenido=vistas/vistasTickets/listarTicketsAbiertos.php");
        }

        public function habilitarTickets(){
            $gestarTickets = new TicketsDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);
            $inhabilitarTickets = $gestarTickets -> habilitar(array($this -> datos['idAct']));

            session_start();

            $_SESSION['mensaje'] = "Registro Habilitado";
            header("location:Controlador.php?ruta=listarTicketsInactivos");
        }

    public function insertarTicket(){
        $gestarVehiculo = new VehiculosDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);
        $buscarPlaca = $gestarVehiculo->seleccionarPlaca(array($this->datos['vehNumero_Placa']));

        if(1==$buscarPlaca['exitoSeleccionPlaca']){
            $gestarTickets = new TicketsDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);
            $this -> datos['Vehiculos_vehId'] = $buscarPlaca['registroEncontrado'][0]-> vehId;
            session_start();
            $this -> datos['Empleados_empId'] = $_SESSION['rolesEnSesion'][0];
            $gestarTickets ->insertar($this -> datos);
        }else{
            session_start();
            $this -> datos['Empleados_empId'] = $_SESSION['rolesEnSesion'][0];
            $insertarVehiculoNuevo = $gestarVehiculo->insertar($this->datos);
            $this -> datos['Vehiculos_vehId'] = $insertarVehiculoNuevo['resultado'];
            $gestarTickets = new TicketsDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);
            $gestarTickets ->insertar($this -> datos);
        }
        
        $_SESSION['mensaje'] = 'Ticket agregado.';

        header('location:vistas/vistaAdminTickets/vistaAdminTickets.php');
    }

    public function abrirTicket(){
        header('location:vistas/vistaAdminTickets/vistaAdminTickets.php?contenido=vistas/vistasTickets/vistaAbrirTicket.php');
    }

    public function calcularValorFinal(){
        $gestarTickets = new TicketsDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);
        $insertarValorFinal = $gestarTickets -> actualizarValorFinal(array($this->datos));

        $ticketActualizado = $gestarTickets -> seleccionarID(array($this->datos['ticNumero']));

        $gestarTarifas = new TarifasDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);
        $buscarTarifa = $gestarTarifas -> seleccionarID(array($ticketActualizado['registroEncontrado'][0]->Tarifas_tarId));
        $valorTarifa = $buscarTarifa['registroEncontrado'][0] ->tarValorTarifa;

        $tiempoIngreso = strtotime($ticketActualizado['registroEncontrado'][0] -> ticHoraIngreso);
        $horaIngreso = date('H', $tiempoIngreso);
        $minutosIngreso = date('i', $tiempoIngreso);

        $tiempoSalida = strtotime($ticketActualizado['registroEncontrado'][0] -> ticHoraSalida);
        $horaSalida = date('H', $tiempoSalida);
        $minutosSalida = date('i', $tiempoSalida);

        if($minutosIngreso < $minutosSalida){

            $difHoras = abs($horaIngreso - $horaSalida);
            $difMinutos = abs($minutosIngreso - $minutosSalida);

            $horasMinutos = $difHoras*60;

            $totalMinutos = $horasMinutos + $difMinutos;

        }else if($minutosIngreso == $minutosSalida){
            $difHoras = abs($horaIngreso - $horaSalida);
            $difMinutos = 0;

            $horasMinutos = $difHoras*60;

            $totalMinutos = $horasMinutos + $difMinutos;

        }else{
            $difHoras = abs($horaIngreso - $horaSalida) - 1;
            $difMinutos = abs(abs($minutosIngreso - $minutosSalida) - 60);

            $horasMinutos = $difHoras*60;

            $totalMinutos = $horasMinutos + $difMinutos;
        }

        $totalTicket = $valorTarifa * $totalMinutos;
        $totalTicket = round($totalTicket / 100) * 100;

        $this ->datos['ticValorFinal'] = $totalTicket;

        $hola = $gestarTickets -> actualizarValorTotal(array($this -> datos));

        $totalTicket = number_format($totalTicket, 2, '.', ',');

        session_start();

        $_SESSION['valorTotal'] = $totalTicket;
        $_SESSION['horaFinal'] = $ticketActualizado['registroEncontrado'][0] -> ticHoraSalida;

        header('location:vistas/vistaAdminTickets/vistaAdminTickets.php?contenido=vistas/vistasTickets/vistaCerrarTicket.php');

    }

    public function calcularCambio(){
        $gestarTickets = new TicketsDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);
        $seleccionarTicket = $gestarTickets -> seleccionarID(array($this->datos['ticNumero']));

        $valorFinal = $seleccionarTicket['registroEncontrado'][0] -> ticValorFinal;

        $valorRecibido = $this -> datos['valorRecibido'];

        echo $valorFinal.' - '.$valorRecibido;

        if($valorRecibido >= $valorFinal){
            $cambioTotal = $valorRecibido - $valorFinal;
            $cambioFinal = number_format($cambioTotal, 2, '.', ',');
            session_start();
            $_SESSION['totalCambio1'] = $cambioFinal;
            $_SESSION['valorRecibido'] = $this -> datos['valorRecibido'];
        }else{
            session_start();
            $_SESSION['mensaje'] = 'El valor recibido debe ser mayor al total a pagar.';
        }

        header('location:vistas/vistaAdminTickets/vistaAdminTickets.php?contenido=vistas/vistasTickets/vistaCerrarTicket.php');
    }

}


?>

  