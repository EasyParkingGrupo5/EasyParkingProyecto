<?php

include_once PATH . 'controladores/LibrosControlador.php';
include_once PATH . 'controladores/TiposDocumentosControlador.php';

class ControladorPrincipal{

    private $datos = array();
    
    public function __construct(){

        if (!empty($_POST) && isset($_POST['ruta'])) {
            $this -> datos = $_POST;
        }
        if (!empty($_GET) && isset($_GET['ruta'])) {
            $this -> datos = $_GET;
        }

        $this -> control();
    }

    public function control(){
        switch ($this->datos['ruta']) {
            case 'listarLibros':
                $this -> listarLibros();
                break;
            case 'actualizarLibro':
                $this -> actualizarLibro();
                break;
            case 'confirmarActualizarLibro':
                $this -> confirmarActualizarLibro();
                break;
            case 'listarTiposDocumentos':
                $this -> listarTiposDocumentos();
                break;
            case 'actualizarTipoDocumento':
                $this -> actualizarTipoDocumento();
                break;
            case 'confirmarActualizarTipoDocumento':
                $this -> confirmarActualizarTipoDocumento();
                break;
            case 'cancelarActualizarLibro':
                $this -> cancelarActualizarLibro();
                break;
            case 'cancelarActualizarTipoDocumento':
                $this -> cancelarActualizarTipoDocumento();
                break;
        }
    }

    public function listarLibros(){
        $librosControlador = new LibrosControlador($this ->datos);
    }

    public function actualizarLibro(){
        $librosControlador = new LibrosControlador($this -> datos);
    }

    public function confirmarActualizarLibro(){
        $librosControlador = new LibrosControlador($this -> datos);
    }

    public function cancelarActualizarLibro(){
        $librosControlador = new LibrosControlador($this -> datos);
    }

    public function listarTiposDocumentos(){
        $tiposDocumentos = new TiposDocumentosControlador($this -> datos);
    }

    public function actualizarTipoDocumento(){
        $tiposDocumentos = new TiposDocumentosControlador($this -> datos);
    }

    public function confirmarActualizarTipoDocumento(){
        $tiposDocumentos = new TiposDocumentosControlador($this -> datos);
    }

    public function cancelarActualizarTipoDocumento(){
        $tiposDocumentos = new TiposDocumentosControlador($this -> datos);
    }


}

?>