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
        }
    }

    public function listarTiposDocumentos(){
        $gestarTiposDocumentos = new TiposDocumentosDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);
        $listarTiposDocumentos = $gestarTiposDocumentos -> seleccionarTodos();

        session_start();

        $_SESSION['listarTiposDocumentos'] = $listarTiposDocumentos;

        header("location:principal.php?contenido=vistas/vistasTiposDocumentos/listarDTRegistrosTiposDocumentos.php");

    }

    public function actualizarTipoDocumento(){
        $gestarTiposDocumentos = new TiposDocumentosDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);
        $actualizarTipoDocumento = $gestarTiposDocumentos -> seleccionarID(array($this -> datos['idAct']));
        
        $actualizarDatosTipoDocumento = $actualizarTipoDocumento['registroEncontrado'][0];

        session_start();

        $_SESSION['actualizarTipoDocumento'] = $actualizarDatosTipoDocumento;

        header("location:principal.php?contenido=vistas/vistasTiposDocumentos/vistaActualizarTipoDocumento.php");
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
    
}

?>