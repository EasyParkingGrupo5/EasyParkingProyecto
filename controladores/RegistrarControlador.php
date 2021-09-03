<?php

include_once PATH . 'modelos/modeloTipos_Documentos/Tipos_DocumentosDAO.php';

class RegistrarControlador{

    private $datos;
    
    public function __construct($datos){
        $this->datos = $datos;
        $this->librosControlador();
    }

    public function librosControlador(){
        switch ($this->datos['ruta']) {
            case 'registrar':
                $this -> registrar();
                break;
        }
    }

    public function registrar(){
        $tiposDocumentos = new TiposDocumentosDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);
        $listadoDocumentos = $tiposDocumentos -> seleccionarTodos(1);

        session_start();

        $_SESSION['listarTiposDocumentos'] = $listadoDocumentos;

        header("location:registro.php");
    }
}

?>