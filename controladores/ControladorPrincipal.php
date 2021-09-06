 <?php

include_once PATH . 'controladores/RegistrarControlador.php';
include_once PATH . 'controladores/LibrosControlador.php';
include_once PATH . 'controladores/rolesControlador.php';
include_once PATH . 'controladores/Usuario_sControlador.php';
include_once PATH . 'controladores/TiposDocumentosControlador.php';
include_once PATH . 'controladores/usuario_sRolesControlador.php';
include_once PATH . 'controladores/TicketsControlador.php';
include_once PATH . 'controladores/VehículosControlador.php';
include_once PATH . 'controladores/ReportesControlador.php';



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
            case 'registrar':
                $this -> registrar();
                break;
            case 'gestionDeRegistro':
                $this -> gestionDeRegistro();
                break;
            case 'gestionDeAcceso':
                $this -> gestionDeAcceso();
                break;
            case 'listarLibros':
                $this -> listarLibros();
                break;
            case 'actualizarLibro':
                $this -> actualizarLibro();
                break;
            case 'confirmarActualizarLibro':
                $this -> confirmarActualizarLibro();
                break;
            case 'agregarLibro':
                $this -> agregarLibro();
                break;
            case 'confirmarInsertarLibro':
                $this -> confirmarInsertarLibro();
                break;
            case 'eliminarLibro':
                $this -> eliminarLibro();
                break;
            case 'listarLibrosInactivos':
                $this -> listarLibrosInactivos();
                break;
            case 'habilitarLibro':
                $this -> habilitarLibro();
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
            case 'mostrarInsertarRoles':
                $this -> mostrarInsertarRoles();
                break;
            case 'insertarRol':
                $this -> insertarRol();
                break;
            case 'eliminarRol':
                $this -> eliminarRol();
                break;
            case 'listarRolesInactivos':
                $this -> listarRolesInactivos();
                break;
            case 'habilitarRol':
                $this -> habilitarRol();
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
            case 'mostrarInsertarUsuarios':
                $this -> mostrarInsertarUsuarios();
                break;
            case 'insertarUsuario':
                $this -> iInsertarUsuario();
                break;
            case 'eliminarUsuario':
                $this -> eliminarUsuario();
                break;
            case 'listarUsuariosInactivos':
                $this -> listarUsuariosInactivos();
                break;
            case 'habilitarUsuario':
                $this -> habilitarUsuario();
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
            case 'listarTickets':
                $this -> listarTickets();
                break;
            case 'listarVehiculos':
                $this -> listarVehiculos();
                break;
            case 'actualizarVehiculos':
                $this -> actualizarVehiculos();
                break;
            case 'cancelarActualizarVehiculo':
                $this -> cancelarActualizarVehiculo();
                break;
            case 'confirmarActualizarVehiculo':
                $this -> actualizarVehiculos();
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
        }
    }

    public function registrar(){
        $registrar = new RegistrarControlador($this -> datos);
    }

    public function gestionDeRegistro(){
        $usuariosControlador = new Usuario_sControlador($this -> datos);
    }

    public function gestionDeAcceso(){
        $usuariosControlador = new Usuario_sControlador($this -> datos);
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

    public function agregarLibro(){
        $librosControlador = new LibrosControlador($this -> datos);
    }

    public function confirmarInsertarLibro(){
        $librosControlador = new LibrosControlador($this -> datos);
    }

    public function eliminarLibro(){
        $librosControlador = new LibrosControlador($this -> datos);
    }

    public function listarLibrosInactivos(){
        $librosControlador = new LibrosControlador($this -> datos);
    }

    public function habilitarLibro(){
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

    public function mostrarInsertarRoles(){
        $rolesControlador = new RolesControlador($this -> datos);
    }

    public function insertarRol(){
        $rolesControlador = new RolesControlador($this -> datos);
    }

    public function eliminarRol(){
        $rolesControlador = new RolesControlador($this -> datos);
    }

    public function listarRolesInactivos(){
        $rolesControlador = new RolesControlador($this -> datos);
    }

    public function habilitarRol(){
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

    public function mostrarInsertarUsuarios(){
        $rolesControlador = new Usuario_sControlador($this -> datos);
    }

    public function insertarUsuario(){
        $rolesControlador = new Usuario_sControlador($this -> datos);
    }

    public function eliminarUsuario(){
        $librosControlador = new Usuario_sControlador($this -> datos);
    }

    public function listarUsuariosInactivos(){
        $librosControlador = new Usuario_sControlador($this -> datos);
    }

    public function habilitarUsuario(){
        $librosControlador = new Usuario_sControlador($this -> datos);
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

    
    public function listarTickets(){
        $ticketsControlador = new TicketsControlador($this -> datos);
    }
    
    public function listarVehiculos(){
        $vehiculosControlador = new VehiculosControlador($this -> datos);
    }

    public function actualizarVehiculos(){
        $vehiculosControlador = new VehiculosControlador($this -> datos);
    }

    public function confirmarActualizarVehiculo(){
        $vehiculosControlador = new VehiculosControlador($this -> datos);
    }

    public function cancelarActualizarVehiculo(){
        $vehiculosControlador = new VehiculosControlador($this -> datos);
    }

    public function mostrarInsertarVehiculos(){
        $vehiculosControlador = new VehiculosControlador($this -> datos);
    }

    public function insertarVehiculo(){
        $vehiculosControlador = new VehiculosControlador($this -> datos);
    }

    public function eliminarVehiculos(){
        $vehiculosControlador = new VehiculosControlador($this -> datos);
    }

    public function listarVehiculosInactivos(){
        $vehiculosControlador = new VehiculosControlador($this -> datos);
    }

    public function habilitarVehiculo(){
        $vehiculosControlador = new VehiculosControlador($this -> datos);
    }
    
    public function listarReportes(){
        $reportesControlador = new ReportesControlador($this -> datos);
    }
}

?>