<?php

include_once PATH . 'modelos/modeloVehiculos/VehiculosDAO.php';
include_once PATH . 'modelos/modeloTickets/TiccketsDAO.php';

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
            case 'confirmarActualizarVehiculo':
                $this -> confirmarActualizarVehiculo();
                break;
            case 'cancelarActualizarVehiculo':
                $this -> cancelarActualizarVehiculo();
                break;
            case 'mostrarInsertarVehiculos':
                $this -> mostrarInsertarVehiculos();
                break;
            case 'insertarVehiculo':
                $this -> insertarVehiculo();
                break;
            case 'eliminarVehiculos':
                $this -> eliminarVehiculos();
                break;
            case 'listarVehiculosInactivos':
                $this -> listarVehiculosInactivos();
                break;
            case 'habilitarVehiculo':
                $this -> habilitarVehiculo();
                break;
        }
    }
    public function listarVehiculos(){
        $gestarVehiculos = new VehiculosDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);
        $registroVehiculos = $gestarVehiculos -> seleccionarTodos(1);

        $gestarTickets = new TicketsDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);
        $registroTickets = $gestarTickets -> seleccionarTodos(1);
    
        session_start();

        $_SESSION['listaDeTickets'] = $registroTickets;
    
        $_SESSION['listaDeVehiculos'] = $registroVehiculos;
    
        header("location:principal.php?contenido=vistas/vistasVehiculos/listarDTRegistrosVehiculos.php");
    }

    public  function actualizarVehiculos(){

        $gestarVehiculos = new VehiculosDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);
        $actualizarVehiculos = $gestarVehiculos -> seleccionarID(array($this->datos['vehId']));

        $actualizarDatosVehiculos = $actualizarVehiculos['registroEncontrado'][0];

        session_start();
        $_SESSION['actualizarDatosVehiculos']=$actualizarDatosVehiculos;

        header("location:principal.php?contenido=vistas/vistasVehiculos/vistaActualizarVehiculos.php");
        
    }

    public function confirmarActualizarVehiculo(){

        $gestarVehiculos = new VehiculosDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);
        $actualizarVehiculos = $gestarVehiculos -> actualizar(array($this->datos));

        session_start();
            $_SESSION['mensaje'] = "Actualización realizada.";
            header("location:Controlador.php?ruta=listarVehiculos");	

    }

    public function cancelarActualizarVehiculo(){

        session_start();
                $_SESSION['mensaje'] = "Desistió de la actualización";
		        header("location:Controlador.php?ruta=listarVehiculos");	

    }

    public function mostrarInsertarVehiculos(){
		
        header("Location: principal.php?contenido=vistas/vistasVehiculos/vistaInsertarVehiculo.php");

    }

    public function insertarVehiculo(){
		
        
    $buscarVehiculo = new VehiculosDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);

    $vehiculoHallado = $buscarVehiculo->seleccionarId(array($this->datos['vehId']));

    if (!$vehiculoHallado['exitoSeleccionId']) {
        $insertarVehiculo = new VehiculosDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);	
        $insertoVehiculo = $insertarVehiculo->insertar($this->datos);  

        $resultadoInsercionVehiculo = $insertoVehiculo['vehId'];  

        session_start();
       $_SESSION['mensaje'] = "Se ha insertado " . $this->datos['vehId'];
        
        header("location:Controlador.php?ruta=listarVehiculos");
        
    }else{
    
        session_start();
        $_SESSION['vehId'] = $this->datos['vehId'];
        $_SESSION['vehNumero_Placa'] = $this->datos['vehNumero_Placa'];
        $_SESSION['vehColor'] = $this->datos['vehColor'];
        $_SESSION['vehMarca'] = $this->datos['vehMarca'];
        $_SESSION['Empleados_empId'] = $this->datos['Empleados_empId'];
        $_SESSION['Tickets_ticId'] = $this->datos['Tickets_ticId'];			
        
        $_SESSION['mensaje'] = " El id que trata de insertar ya existe en el sistema ";

        header("location:Controlador.php?ruta=InsertarUsuarios");					

    }					
    }
    
    public function eliminarVehiculos(){
        $gestarVehiculos = new VehiculosDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);
        $inhabilitarVehiculos = $gestarVehiculos -> eliminarLogico(array($this -> datos['vehId']));

        session_start();

        $_SESSION['mensaje'] = "Registro Eliminado";
        header("location:Controlador.php?ruta=listarVehiculos");


    }
        
    public function listarVehiculosInactivos(){
        $gestarVehiculos = new VehiculosDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);
        $listarInactivos = $gestarVehiculos -> seleccionarTodos(0);

        session_start();

        $_SESSION['listaDeVehiculos'] = $listarInactivos;

        header("location:principal.php?contenido=vistas/vistasVehiculos/listarVehiculosInactivos.php");
    }

    public function habilitarVehiculo(){
        $gestarVehiculos = new VehiculosDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);
        $inhabilitarVehiculos = $gestarVehiculos -> habilitar(array($this -> datos['vehId']));

        session_start();

        $_SESSION['mensaje'] = "Registro Habilitado";
        header("location:Controlador.php?ruta=listarVehiculosInactivos");
    }
    
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


