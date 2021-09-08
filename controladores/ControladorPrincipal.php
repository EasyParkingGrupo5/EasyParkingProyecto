 <?php

include_once PATH . 'controladores/LibrosControlador.php';
include_once PATH . 'controladores/rolesControlador.php';
include_once PATH . 'controladores/usuario_sControlador.php';
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
            case 'listarTickets':
                $this -> listarTickets();
                break;
            case 'actualizarTickets':
                $this -> actualizarTickets();
                break;
            case 'eliminarTickets':
                $this -> eliminarTickets();
                break;
            case 'confirmarActualizarTickets':
                $this -> confirmarActualizarTickets();
                break;
            case 'cancelarActualizarTickets':
                $this -> cancelarActualizarTickets();
                break;
            case 'listarTicketsInactivos':
                $this -> listarTicketsInactivos();
                break;
            case 'mostrarInsertarticket':
                $this -> mostrarInsertarticket();
                break;
            case 'habilitarTickets':
                $this -> habilitarTickets();
                break;
            case 'listarVehiculos':
                $this -> listarVehiculos();
                break;
            case 'actualizarVehiculos':
                $this -> actualizarVehiculos();
                break;
            case 'confirmarActualizarVehiculos':
                $this -> confirmarActualizarVehiculos();
                break;
            case 'cancelarActualizarVehiculos':
                $this -> cancelarActualizarVehiculos();
                break;
            case 'listarReportes':
                $this -> listarReportes();
                break;
            case 'actualizarReportes':
                $this -> actualizarReportes();
                break;
            case 'eliminarReportes':
                $this -> eliminarReportes();
                break;
            case 'confirmarActualizarReportes':
                $this -> confirmarActualizarReportes();
                break;
            case 'cancelarActualizarReportes':
                $this -> cancelarActualizarReportes();
                break;
            case 'listarReportesInactivos':
                $this -> listarReportesInactivos();
                break;
            case 'mostrarInsertarReportes':
                $this -> mostrarInsertarReportes();
                break;
            case 'habilitarReportes':
                $this -> habilitarReportes();
                break;
            case 'confirmarInsertarReportes':
                $this -> confirmarInsertarReportes();
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
    public function listarTickets(){
        $ticketsControlador = new TicketsControlador($this -> datos);
    }
    public function actualizarTickets(){
        $ticketsControlador = new TicketsControlador($this -> datos);
    }
    public function eliminarTickets(){
        $ticketsControlador = new TicketsControlador($this -> datos);
    }
    public function confirmarActualizarTickets(){
        $ticketsControlador = new TicketsControlador($this -> datos);
    }
    public function cancelarActualizarTickets(){
        $ticketsControlador = new TicketsControlador($this -> datos);
    }
    public function listarTicketsInactivos(){
        $ticketsControlador = new TicketsControlador($this -> datos);
    }
    public function mostrarInsertarticket(){
        $ticketsControlador = new TicketsControlador($this -> datos);
    }
    
    public function habilitarTickets(){
        $ticketsControlador = new TicketsControlador($this -> datos);
    }
    
    public function listarVehiculos(){
        $vehiculosControlador = new VehiculosControlador($this -> datos);
    }
    public function actualizarVehiculos(){
        $vehiculosControlador = new VehiculosControlador($this -> datos);
    }
    public function confirmarActualizarVehiculos(){
        $vehiculosControlador = new VehiculosControlador($this -> datos);
    }
    public function cancelarActualizarVehiculos(){
        $vehiculosControlador = new VehiculosControlador($this -> datos);
    }
    
    public function listarReportes(){
        $reportesControlador = new ReportesControlador($this -> datos);
    }
    public function actualizarReportes(){
        $reportesControlador = new ReportesControlador($this -> datos);
    }
    public function confirmarActualizarReportes(){
        $reportesControlador = new ReportesControlador($this -> datos);
    }

    public function cancelarActualizarReportes(){
        $reportesControlador = new ReportesControlador($this -> datos);
    }
    public function listarReportesInactivos(){
        $reportesControlador = new ReportesControlador($this -> datos);
    }
    public function mostrarInsertarReportes(){
        $reportesControlador = new ReportesControlador($this -> datos);
    }
    
    public function habilitarReportes(){
        $reportesControlador = new ReportesControlador($this -> datos);
    }
    public function eliminarReportes(){
        $reportesControlador = new ReportesControlador($this -> datos);
    }
    public function confirmarInsertarReportes(){
        $reportesControlador = new ReportesControlador($this -> datos);
    }
}


?>