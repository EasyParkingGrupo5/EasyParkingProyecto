<?php

include_once PATH . 'modelos/modeloVehiculos/VehiculosDAO.php';
include_once PATH . 'modelos/modeloTickets/TicketsDAO.php';
include_once PATH . 'modelos/modeloEmpleados/EmpleadosDAO.php';

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
            case 'buscarPlaca':
                $this -> buscarPlaca();
                break;
            
        }
    }
    public function listarVehiculos(){
        $gestarVehiculos = new VehiculosDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);
        $registroVehiculos = $gestarVehiculos -> seleccionarTodos(1);
    
        session_start();
    
        $_SESSION['listaDeVehiculos'] = $registroVehiculos;
    
        header("location:vistas/vistaAdminVehiculo/vistaAdminVehiculo.php?contenido=vistas/vistasVehiculos/listarDTRegistrosVehiculos.php");
    }

    public  function actualizarVehiculos(){



        $gestarVehiculos = new VehiculosDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);
        $actualizarVehiculos = $gestarVehiculos -> seleccionarID(array($this->datos['vehId']));

        $actualizarDatosVehiculos = $actualizarVehiculos['registroEncontrado'][0];


        session_start();
        $_SESSION['actualizarDatosVehiculos']=$actualizarDatosVehiculos;

        header("location:vistas/vistaAdminVehiculo/vistaAdminVehiculo.php?contenido=vistas/vistasVehiculos/vistaActualizarVehiculos.php");
        
    }

    public function confirmarActualizarVehiculo(){

        //print_r($this->datos);

        //exit();

        $gestarVehiculos = new VehiculosDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);
        $actualizarVehiculos = $gestarVehiculos -> actualizar(array($this->datos));

        session_start();
            header("location:Controlador.php?ruta=listarVehiculos");	

    }

    public function mostrarInsertarVehiculos(){
		
        header("Location: principal.php?contenido=vistas/vistasVehiculos/vistaInsertarVehiculo.php");

    }

    public function insertarVehiculo(){

    //print_r($this->datos);

        //exit();
		
        
    $buscarVehiculo = new VehiculosDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);

    $vehiculoHallado = $buscarVehiculo->seleccionarId(array($this->datos['vehId']));

    if (!$vehiculoHallado['exitoSeleccionId']) {
        $insertarVehiculo = new VehiculosDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);	
        $insertoVehiculo = $insertarVehiculo->insertar($this->datos); 
        
        $gestarTickets = new TicketsDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);
        $actualizarTickets = $gestarTickets -> seleccionarTodos(1);

        $gestarEmpleados = new EmpleadosDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);
        $actualizarEmpleados = $gestarEmpleados -> seleccionarTodos(1);

        $resultadoInsercionVehiculo = $insertoVehiculo['vehId'];  

        session_start();
       $_SESSION['mensaje'] = "Se ha insertado " . $this->datos['vehId'];
       $_SESSION['listarTickets']=$actualizarTickets;
        $_SESSION['listarEmpleados']=$actualizarEmpleados;
        $_SESSION['vehiculoHallado']= $vehiculoHallado;
        
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

    public function buscarPlaca(){

        $buscarVehiculo = new VehiculosDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);
    
        $vehiculoHallado = $buscarVehiculo->seleccionarPlaca(array($this->datos['placa']));
    
            if(1==$vehiculoHallado['exitoSeleccionPlaca']){

                session_start();
                
                $_SESSION['mensaje'] = "Placa encontrada";
                $_SESSION['vehNumero_Placa'] = $vehiculoHallado['registroEncontrado'][0]->vehNumero_Placa;
                $_SESSION['vehColor'] = $vehiculoHallado['registroEncontrado'][0]->vehColor;
                $_SESSION['vehMarca'] = $vehiculoHallado['registroEncontrado'][0]->vehMarca;

            }else{

                session_start();
                
                $_SESSION['mensaje'] = "Placa no encontrada";
    
            }

            $gestarTarifas = new TarifasDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);
            $listarTarifas = $gestarTarifas -> seleccionarTodos(1);

            $_SESSION['listarTarifas'] = $listarTarifas;
    
            header('location:vistas/vistaAdminTickets/vistaAdminTickets.php?contenido=vistas/vistasTickets/vistaInsertarTicket.php');
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
    


    public function cancelarActualizarVehiculo(){
    
    header("location:Controlador.php?ruta=listarVehiculos");
    }

    public function confirmarInsertarVehiculos(){
    $gestarVehiculos = new VehiculosDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);
    $buscarVehiculos = $gestarVehiculos -> seleccionarID(array($this->datos['isbn']));

    if(!$buscarVehiculos['exitoSeleccionId']){
        $insertarVehiculos = new VehiculosDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);
        $insertoVehiculos = $insertarVehiculos -> insertar($this -> datos);

        session_start();

        $_SESSION['mensaje'] = 'Fue insertado con exito con el c??digo '.$insertoVehiculos['resultado'];
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
                
            $_SESSION['mensaje'] = "El c??digo " . $this->datos['vehId'] . " ya existe en el sistema.";

            header("location:Controlador.php?ruta=agregarVehiculos");
    }

   }



}

?>