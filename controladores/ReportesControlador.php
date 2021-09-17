<?php

include_once PATH . 'modelos/modeloReportes/ReportesDAO.php';
include_once PATH . 'modelos/modeloEmpleados/EmpleadosDAO.php';

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
            case 'confirmarActualizarReportes': 
                $this->confirmarActualizarReportes();
                break;
            case 'cancelarActualizarReportes':
                $this -> cancelarActualizarReportes();
                break;
            case 'mostrarInsertarReportes':
                $this -> mostrarInsertarReportes();
                break;
            case 'confirmarInsertarReportes':
                $this -> confirmarInsertarReportes();
                break;
            case 'eliminarReportes':
                $this -> eliminarReportes();
                break;
            case 'listarReportesInactivos':
                $this -> listarReportesInactivos();
                break;
            case 'habilitarReportes':
                $this -> habilitarReportes();
                break;
            case 'vistaReporteFecha':
                $this -> vistaReporteFecha();
                break;
            case 'generarReporteFecha':
                $this -> generarReporteFecha();
                break;
            case 'vistaReportePlaca':
                $this -> vistaReportePlaca();
                break;
            case 'buscarReportePlaca':
                $this -> buscarReportePlaca();
                break;
        }
    }
    public function listarReportes(){
        $gestarReportes = new ReportesDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);
        $registroReportes = $gestarReportes -> seleccionarTodos(1);
    
        session_start();
    
        $_SESSION['listaDeReportes'] = $registroReportes;
    
        header("location:principal.php?contenido=vistas/vistasReportes/listarDTRegistrosReportes.php");
    }

    public  function actualizarReportes(){
        $gestarReportes = new ReportesDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);
        $actualizarReportes = $gestarReportes -> seleccionarID(array($this->datos['idAct']));

        $actualizarDatosReportes = $actualizarReportes['registroEncontrado'][0];

        $gestarEmpleados = new EmpleadosDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);
        $listarEmpleados = $gestarEmpleados -> seleccionarTodos(1);

        $gestarVehiculos = new VehiculosDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);
        $listarVehiculos = $gestarVehiculos -> seleccionarTodos(1);
        
        
        session_start();

        $_SESSION['actualizarReportes'] = $actualizarDatosReportes;
        $_SESSION['listarEmpleados'] = $listarEmpleados;
        $_SESSION['listarVehiculos'] = $listarVehiculos;
        header("location:principal.php?contenido=vistas/vistasReportes/vistaActualizarReportes.php");
    }

    public function confirmarActualizarReportes(){
        $gestarReportes = new ReportesDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);
        $confirmarActualizarReportes = $gestarReportes -> actualizar(array($this->datos));

        session_start();

        $_SESSION['mensaje'] = "Registro Actualizado";
        header("location:Controlador.php?ruta=listarReportes");
    }
    public function mostrarInsertarReportes(){

        $gestarEmpleados = new EmpleadosDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);
        $listarEmpleados = $gestarEmpleados -> seleccionarTodos(1);
        
        $gestarVehiculos = new VehiculosDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);
        $listarVehiculos = $gestarVehiculos -> seleccionarTodos(1);

        session_start();

        
        $_SESSION['listarEmpleados'] = $listarEmpleados;
        $_SESSION['listarVehiculos'] = $listarVehiculos;

        header('location:principal.php?contenido=vistas/vistasReportes/vistaInsertarReportes.php');
    }

    public function cancelarActualizarReportes(){
        
        header("location:Controlador.php?ruta=listarReportes");
    }


    public function confirmarInsertarReportes(){
        $gestarReportes = new ReportesDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);
        $buscarReportes = $gestarReportes -> seleccionarID(array($this->datos['repId']));

        if(!$buscarReportes['exitoSeleccionId']){
            $insertarReportes = new ReportesDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);
            $insertoReportes = $insertarReportes -> insertar($this -> datos);

            session_start();

            $_SESSION['mensaje'] = 'Fue insertado con exito con el código '.$insertoReportes['resultado'];
            header("location:Controlador.php?ruta=listarReportes");
        }else{
            session_start();
                $_SESSION['repId'] = $this->datos['repId'];
                $_SESSION['repNumero'] = $this->datos['repNumero'];
                $_SESSION['repFecha'] = $this->datos['repFecha'];
                $_SESSION['empId'] = $this->datos['empId'];
                $_SESSION['vehId'] = $this->datos['vehId'];					
					
                $_SESSION['mensaje'] = "El código " . $this->datos['repId'] . " ya existe en el sistema.";

                header("location:Controlador.php?ruta=mostrarInsertarReportes");
        }

        }
        
        public function eliminarReportes(){
            $gestarReportes = new ReportesDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);
            $inhabilitarReportes = $gestarReportes -> eliminarLogico(array($this -> datos['idAct']));

            session_start();

            $_SESSION['mensaje'] = "Registro Eliminado";
            header("location:Controlador.php?ruta=listarReportes");


        }

        public function listarReportesInactivos(){
            $gestarReportes = new ReportesDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);
            $listarInactivos = $gestarReportes -> seleccionarTodos(0);

            session_start();
    
            $_SESSION['listaDeReportes'] = $listarInactivos;
    
            header("location:principal.php?contenido=vistas/vistasReportes/listarDTRegistrosInactivos.php");
        }

        public function habilitarReportes(){
            $gestarReportes = new ReportesDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);
            $inhabilitarReportes = $gestarReportes -> habilitar(array($this -> datos['idAct']));

            session_start();

            $_SESSION['mensaje'] = "Registro Habilitado";
            header("location:Controlador.php?ruta=listarReportesInactivos");
        }

        public function vistaReporteFecha(){
            header('location:vistas/vistaAdminReportes/vistaAdminReportes.php?contenido=vistas/vistasReportes/vistaReporteFecha.php');
        }

        public function generarReporteFecha(){
            $gestarReportes = new ReportesDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);
            $reporteFecha = $gestarReportes -> reportePorFecha($this->datos);

            session_start();

            $_SESSION['listaDeReportes'] = $reporteFecha;

            header('location:vistas/vistaAdminReportes/vistaAdminReportes.php?contenido=vistas/vistasReportes/listarDTRegistrosReportesFecha.php');

        }

        public function vistaReportePlaca(){
            header('location:vistas/vistaAdminReportes/vistaAdminReportes.php?contenido=vistas/vistasReportes/vistaReportePlaca.php');
        }

        public function buscarReportePlaca(){
            $gestarReportes = new ReportesDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);
            $reportePlaca = $gestarReportes -> reportePorPlaca($this->datos);

            if($reportePlaca['exitoSeleccion']){
                session_start();

                $_SESSION['listaDeReportes'] = $reportePlaca['registroEncontrado'];

                header('location:vistas/vistaAdminReportes/vistaAdminReportes.php?contenido=vistas/vistasReportes/listarDTRegistrosReportesPlaca.php');
            }else{
                session_start();
                
                $_SESSION['mensaje'] = 'Placa no encontrada';

                header('location:vistas/vistaAdminReportes/vistaAdminReportes.php?contenido=vistas/vistasReportes/vistaReportePlaca.php');
            }
        }
    }

?>

