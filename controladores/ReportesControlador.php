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
        $gestarReportes = new ReportesDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);
        $actualizarReportes = $gestarReportes -> seleccionarID(array($this->datos['idAct']));

        $actualizarDatosReportes = $actualizarReportes['registroEncontrado'][0];

        $gestarEmpleados = new EmpleadosDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);
        $listarEmpleados = $gestarEmpleados -> seleccionarTodos();
        session_start();

        $_SESSION['actualizarReportes'] = $actualizarDatosReportes;
        $_SESSION['listarEmpleados'] = $listarEmpleados;

        header("location:principal.php?contenido=vistas/vistasReportes/vistaActualizarReportes.php");
    }

    public function confirmarActualizarReportes(){
        $gestarReportes = new LibroDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);
        $confirmarActualizarReportes = $gestarReportes -> actualizar(array($this->datos));

        session_start();

        $_SESSION['mensaje'] = "Registro Actualizado";
        header("location:Controlador.php?ruta=listarReportes");
    }

    public function cancelarActualizarReportes(){
        
        header("location:Controlador.php?ruta=listarReportes");
    }

    public function agregarReportes(){
        $gestarEmpleados = new EmpleadosoDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);
        $listarEmpleados = $gestarEmpleados -> seleccionarTodos();

        session_start();

        $_SESSION['listarCategorias'] = $listarCategorias;

        header('location:principal.php?contenido=vistas/vistasLibros/vistaInsertarLibro.php');
    }

    public function confirmarInsertarReportes(){
        $gestarReportes = new ReportesDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);
        $buscarReportes = $gestarReportes -> seleccionarID(array($this->datos['isbn']));

        if(!$buscarLibro['exitoSeleccionId']){
            $insertarReportes = new ReportesDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);
            $insertoReportes = $insertarReportes -> insertar($this -> datos);

            session_start();

            $_SESSION['mensaje'] = 'Fue insertado con exito con el código '.$insertoLibro['resultado'];
            header("location:Controlador.php?ruta=listarLibros");
        }else{
            session_start();
                $_SESSION['repId'] = $this->datos['repId'];
                $_SESSION['repNumero'] = $this->datos['repNumero'];
                $_SESSION['repFecha'] = $this->datos['repFecha'];
                $_SESSION['empId'] = $this->datos['empId'];
                $_SESSION['vehId'] = $this->datos['vehId'];					
					
                $_SESSION['mensaje'] = "El código " . $this->datos['repId'] . " ya existe en el sistema.";

                header("location:Controlador.php?ruta=agregarLibro");
        }

        }
        
        public function eliminarReportes(){
            $gestarReportes = new ReportesDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);
            $inhabilitarReportes = $gestarReportes -> eliminarLogico(array($this -> datos['idAct']));

            session_start();

            $_SESSION['mensaje'] = "Registro Eliminado";
            header("location:Controlador.php?ruta=listarLibros");


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
    }

?>

