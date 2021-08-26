 <?php

include_once PATH . 'controladores/LibrosControlador.php';
include_once PATH . 'controladores/rolesControlador.php';
include_once PATH . 'controladores/usuario_sControlador.php';
include_once PATH . 'controladores/TiposDocumentosControlador.php';
include_once PATH . 'controladores/usuario_sRolesControlador.php';

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
            case 'listarUsuarios_SRoles':
                $this -> listarUsuarios_SRoles();
                 break;
            case 'actualizarUsuarios_SRoles':
                $this -> actualizarUsuarios_SRoles();
                break;
            case 'confirmarActualizarUsuarios_SRoles':
                $this -> confirmarActualizarUsuarios_SRoles();
                break;
            case 'cancelarActualizarUsuarios_SRoles':
                $this -> cancelarActualizarUsuarios_SRoles();
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

    public function listarRoles(){
        $rolesControlador = new RolesControlador($this -> datos);
    }

    public function actualizarRol(){
        $rolesControlador = new RolesControlador($this -> datos);
    }

    public function confirmarActualizarRol(){
        $rolesControlador = new RolesControlador($this -> datos);
    }

    public function cancelarActualizarRol(){
        $rolesControlador = new RolesControlador($this -> datos);
    }


    public function listarUsuarios(){
        $usuariosControlador = new Usuario_sControlador($this -> datos);
    }

    public function actualizarUsuarios(){
        $rolesControlador = new Usuario_sControlador($this -> datos);
    }

    public function confirmarActualizarUsuarios(){
        $rolesControlador = new Usuario_sControlador($this -> datos);
    }

    public function cancelarActualizarUsuarios(){
        $rolesControlador = new Usuario_sControlador($this -> datos);
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

    public function listarUsuarios_SRoles(){
        $Usuarios_SRolesControlador = new Usuarios_SRolesControlador($this -> datos);
    }

    public function actualizarUsuarios_SRoles(){
        $Usuarios_SRolesControlador = new Usuarios_SRolesControlador($this -> datos);
    }

    public function confirmarActualizarUsuarios_SRoles(){
        $Usuarios_SRolesControlador = new Usuarios_SRolesControlador($this -> datos);
    }

    public function cancelarActualizarUsuarios_SRoles(){
        $Usuarios_SRolesControlador = new Usuarios_SRolesControlador($this -> datos);
    }

}

?>