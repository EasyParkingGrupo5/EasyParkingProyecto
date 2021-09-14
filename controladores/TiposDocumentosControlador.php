<?php

include_once PATH . 'modelos/modeloTipos_Documentos/Tipos_DocumentosDAO.php';

class TiposDocumentosControlador{
    private $datos;
    
    public function __construct($datos){
        $this->datos = $datos;
        $this->tiposDocumentosControlador();
    }

    public function tiposDocumentosControlador(){
        switch ($this -> datos['ruta']) {
            case 'listarTiposDocumentos':
                $this -> listarTiposDocumentos();;
                break;
            case 'actualizarTipoDocumento':
                $this -> actualizarTipoDocumento();
                break;
            case 'confirmarActualizarTipoDocumento':
                $this -> confirmarActualizarTipoDocumento();
                break;
            case 'cancelarActualizarTipoDocumento':
                $this -> cancelarActualizarTipoDocumento();
                break;
            case 'eliminarTipoDocumento':
                $this -> eliminarTipoDocumento();
                break;
            case 'insertarTipoDocumento':
                $this -> insertarTipoDocumento();
                break;
            case 'confirmarInsertarTipoDocumento':
                $this -> confirmarInsertarTipoDocumento();
                break;
            case 'listarTiposDocumentosInactivos':
                $this -> listarTiposDocumentosInactivos();
                break;
            case 'habilitarTipoDocumento':
                $this -> habilitarTipoDocumento();
                break;
        }
    }

    public function listarTiposDocumentos(){
        $gestarTiposDocumentos = new TiposDocumentosDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);
        $listarTiposDocumentos = $gestarTiposDocumentos -> seleccionarTodos(1);

        session_start();

        $_SESSION['listarTiposDocumentos'] = $listarTiposDocumentos;

        header("location:vistas/vistaAdminEmpleados/vistaAdminTipoDocumento/vistaAdminTipoDocumento.php?contenido=vistas/vistasTiposDocumentos/listarDTRegistrosTiposDocumentos.php");

    }

    public function actualizarTipoDocumento(){
        $gestarTiposDocumentos = new TiposDocumentosDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);
        $actualizarTipoDocumento = $gestarTiposDocumentos -> seleccionarID(array($this -> datos['idAct']));
        
        $actualizarDatosTipoDocumento = $actualizarTipoDocumento['registroEncontrado'][0];

        session_start();

        $_SESSION['actualizarTipoDocumento'] = $actualizarDatosTipoDocumento;

        header("location:vistas/vistaAdminEmpleados/vistaAdminTipoDocumento/vistaAdminTipoDocumento.php?contenido=vistas/vistasTiposDocumentos/vistaActualizarTipoDocumento.php");
    }

    public function confirmarActualizarTipoDocumento(){
        $gestarTiposDocumentos = new TiposDocumentosDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);
        $confirmarTipoDocumento = $gestarTiposDocumentos -> actualizar(array($this -> datos));

        session_start();

        $_SESSION['mensaje'] = 'Registro Actualizado';
        header("location:Controlador.php?ruta=listarTiposDocumentos");
    }

    public function cancelarActualizarTipoDocumento(){
        header("location:Controlador.php?ruta=listarTiposDocumentos");
    }

    public function eliminarTipoDocumento(){
        $gestarTiposDocumentos = new TiposDocumentosDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);
        $eliminarDocumento = $gestarTiposDocumentos -> eliminarLogico(array($this -> datos['idAct']));

        session_start();

        $_SESSION['mensaje'] = 'Registro Eliminado';

        header('location:Controlador.php?ruta=listarTiposDocumentos');
    }

    public function insertarTipoDocumento(){
        header('location:vistas/vistaAdminEmpleados/vistaAdminTipoDocumento/vistaAdminTipoDocumento.php?contenido=vistas/vistasTiposDocumentos/vistaInsertarTipoDocumento.php');
    }

    public function confirmarInsertarTipoDocumento(){
        $gestarTiposDocumentos = new TiposDocumentosDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);
        $buscarTipoDocumento = $gestarTiposDocumentos -> seleccionarID($this -> datos['tipDocId']);

        if(!$buscarTipoDocumento['exitoSeleccionId']){
            $insertarTipoDocumento = $gestarTiposDocumentos -> insertar($this->datos);

            $resultadoInsercion = $insertarTipoDocumento['resultado'];

            session_start();
            $_SESSION['mensaje'] = "Se ha insertado con el id " . $resultadoInsercion;
             
            header("location:Controlador.php?ruta=listarTiposDocumentos");
        }else{
            session_start();
            $_SESSION['tipDocSigla'] = $this->datos['tipDocSigla'];
            $_SESSION['tipDocNombre_documento'] = $this->datos['tipDocNombre_documento'];			
            
            $_SESSION['mensaje'] = "El tipo de documento que trata de insertar ya existe en el sistema";

            header("location:vistas/vistaAdminEmpleados/vistaAdminTipoDocumento/vistaAdminTipoDocumento.php?ruta=insertarTipoDocumento");
        }
    }

    public function listarTiposDocumentosInactivos(){
        $gestarTiposDocumentos = new TiposDocumentosDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);
        $listarTiposDocumentos = $gestarTiposDocumentos -> seleccionarTodos(0);

        session_start();

        $_SESSION['listarTiposDocumentos'] = $listarTiposDocumentos;

        header("location:vistas/vistaAdminEmpleados/vistaAdminTipoDocumento/vistaAdminTipoDocumento.php?contenido=vistas/vistasTiposDocumentos/listarDTInactivosTiposDocumentos.php");

    }

    public function habilitarTipoDocumento(){
        $gestarTiposDocumentos = new TiposDocumentosDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);
        $eliminarDocumento = $gestarTiposDocumentos -> habilitar(array($this -> datos['idAct']));

        session_start();

        $_SESSION['mensaje'] = 'Registro Habilitado';

        header('location:Controlador.php?ruta=listarTiposDocumentosInactivos');
    }
    
}

?>