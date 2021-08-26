 <?php

include_once PATH . 'controladores/LibrosControlador.php';
<<<<<<< HEAD
include_once PATH . 'controladores/rolesControlador.php';
include_once PATH . 'controladores/usuario_SControlador.php';
=======
include_once PATH . 'controladores/TiposDocumentosControlador.php';
>>>>>>> 4dde86c7e7386e2390d6b9bd7ff15a72b2c9eff6

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
<<<<<<< HEAD
            case 'listarRoles':
                $this -> listarRoles();
                break;
            case 'actualizarRol':
                $this -> actualizarRol();
                break;
            case 'confirmarActualizarRol':
                $this -> confirmarActualizarRol();
                break;
            case 'cancelarActualizarRol':
                $this -> cancelarActualizarRol();
                break;
            case 'listarUsuarios':
                $this -> listarUsuarios();
                break;
             case 'actualizarUsuarios':
                $this -> actualizarUsuarios();
                 break;
            case 'confirmarActualizarUsuarios':
                $this -> confirmarActualizarUsuarios();
                break;
            case 'cancelarActualizarUsuarios':
                 $this -> cancelarActualizarUsuarios();
                 break;
=======
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
>>>>>>> 4dde86c7e7386e2390d6b9bd7ff15a72b2c9eff6
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

<<<<<<< HEAD
    public function listarRoles(){
        $rolesControlador = new rolesControlador($this -> datos);
    }

    public function actualizarRol(){
        $rolesControlador = new rolesControlador($this -> datos);
    }

    public function confirmarActualizarRol(){
        $rolesControlador = new rolesControlador($this -> datos);
    }

    public function cancelarActualizarRol(){
        $rolesControlador = new rolesControlador($this -> datos);
    }


    public function listarUsuarios(){
        $usuariosControlador = new usuario_sControlador($this -> datos);
    }

    public function actualizarUsuarios(){
        $rolesControlador = new usuario_sControlador($this -> datos);
    }

    public function confirmarActualizarUsuarios(){
        $rolesControlador = new usuario_sControlador($this -> datos);
    }

    public function cancelarActualizarUsuarios(){
        $rolesControlador = new usuario_sControlador($this -> datos);
    }



=======
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


>>>>>>> 4dde86c7e7386e2390d6b9bd7ff15a72b2c9eff6
}

?>