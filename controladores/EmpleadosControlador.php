<?php

include_once PATH . 'modelos/modeloEmpleados/EmpleadosDAO.php';

class EmpleadosControlador{

    private $datos;
    
    public function __construct($datos){
        $this->datos = $datos;
        $this->empleadosControlador();
    }
    
    public function empleadosControlador(){
        switch ($this->datos['ruta']) {
            case 'listarEmpleados':
                $this->listarEmpleados();
                break;
            case 'actualizarEmpleado':
                $this -> actualizarEmpleado();
                break;
            case 'cancelarActualizarEmpleado':
                $this -> cancelarActualizarEmpleado();
                break;
            case 'confirmarActualizarEmpleado':
                $this -> confirmarActualizarEmpleado();
                break;
            case 'eliminarEmpleado':
                $this -> eliminarEmpleado();
                break;
            case 'listarEmpleadosInactivos':
                $this -> listarEmpleadosInactivos();
                break;
            case 'habilitarEmpleado':
                $this -> habilitarEmpleado();
                break;

        }
    }

    public function listarEmpleados(){
        $gestarEmpleados = new EmpleadosDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);
        $registroEmpleados = $gestarEmpleados -> seleccionarTodos(1);
    
        session_start();
    
        $_SESSION['listaDeEmpleados'] = $registroEmpleados;
    
        header("location:vistas/vistaAdminEmpleados/vistaAdminEmpleados/vistaAdminEmpleados.php?contenido=vistas/vistasEmpleados/listarDTEmpleados.php");
    }

    public function actualizarEmpleado(){
        $gestarEmpleados = new EmpleadosDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);
        $registroEmpleado = $gestarEmpleados -> seleccionarID(array($this->datos['sId']));

        $actualizarDatosEmpleado = $registroEmpleado['registroEncontrado'][0];

        $gestarTiposDocumentos = new TiposDocumentosDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);
        $registoDocumentos = $gestarTiposDocumentos -> seleccionarTodos(1);

        session_start();

        $_SESSION['registroEmpleado'] = $actualizarDatosEmpleado;
        $_SESSION['registoDocumentos'] = $registoDocumentos;


        header("location:vistas/vistaAdminEmpleados/vistaAdminEmpleados/vistaAdminEmpleados.php?contenido=vistas/vistasEmpleados/vistaActualizarEmpleado.php");
    }

    public function cancelarActualizarEmpleado(){
        header("location:Controlador.php?ruta=listarEmpleados");
    }

    public function confirmarActualizarEmpleado(){
        $gestarEmpleados = new EmpleadosDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);
        $actualizarEmpleado = $gestarEmpleados -> actualizar(array($this->datos));

        session_start();
        $_SESSION['mensaje'] = "Actualización realizada.";
        header("location:Controlador.php?ruta=listarEmpleados");
    }

    public function eliminarEmpleado(){
        $gestarEmpleados = new EmpleadosDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);
        $eliminarEmpleado = $gestarEmpleados -> eliminarLogico(array($this -> datos['sId']));

        session_start();

        $_SESSION['mensaje'] = "Registro Eliminado";
        header("location:Controlador.php?ruta=listarEmpleados");
    }

    public function listarEmpleadosInactivos(){
        $gestarEmpleados = new EmpleadosDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);
        $registroEmpleados = $gestarEmpleados -> seleccionarTodos(0);
    
        session_start();
    
        $_SESSION['listaDeEmpleados'] = $registroEmpleados;
    
        header("location:vistas/vistaAdminEmpleados/vistaAdminEmpleados/vistaAdminEmpleados.php?contenido=vistas/vistasEmpleados/listarDTEmpleadosInactivos.php");
    }

    public function habilitarEmpleado(){
        $gestarEmpleados = new EmpleadosDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);
        $eliminarEmpleado = $gestarEmpleados -> habilitar(array($this -> datos['sId']));

        session_start();

        $_SESSION['mensaje'] = "Registro Habilitado";
        header("location:Controlador.php?ruta=listarEmpleadosInactivos");
    }
}
?>