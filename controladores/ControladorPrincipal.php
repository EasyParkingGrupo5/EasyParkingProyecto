 <?php

include_once PATH . 'controladores/RegistrarControlador.php';
include_once PATH . 'controladores/rolesControlador.php';
include_once PATH . 'controladores/Usuario_sControlador.php';
include_once PATH . 'controladores/TiposDocumentosControlador.php';
include_once PATH . 'controladores/usuario_sRolesControlador.php';
include_once PATH . 'controladores/TicketsControlador.php';
include_once PATH . 'controladores/VehiculosControlador.php';
include_once PATH . 'controladores/ReportesControlador.php';
include_once PATH . 'controladores/EmpleadosControlador.php';



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
                $this->cancelarActualizarRol();
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
            case 'listarTiposDocumentos':
                $this -> listarTiposDocumentos();
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
            case 'confirmarInsertarTickets':
                $this -> confirmarInsertarTickets();
                break;
            case 'habilitarTickets':
                $this -> habilitarTickets();
                break;
            case 'insertarTicket':
                $this -> insertarTicket();
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
            case 'eliminarReportes':
                $this -> eliminarReportes();
                break;
            case 'confirmarActualizarReportes':
                $this -> confirmarActualizarReportes();
                break;
            case 'listarVehiculosInactivos':
                $this -> listarVehiculosInactivos();
                break;
            case 'habilitarVehiculo':
                $this -> habilitarVehiculo();
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
            case 'listarReportes':
                $this -> listarReportes();
                break;
            case 'actualizarReportes':
                $this -> actualizarReportes();
                break;
            case 'cancelarActualizarReportes':
                $this -> cancelarActualizarReportes();
                break;
            case 'habilitarTipoDocumento':
                $this -> habilitarTipoDocumento();
                break;
            case 'abrirTicket':
                $this -> abrirTicket();
                break;
            case 'buscarPlaca':
                $this -> buscarPlaca();
                break;
            case 'calcularValorFinal':
                $this -> calcularValorFinal();
                break;
            case 'cerrarSesion':
                $this -> cerrarSesion();              
                break;
            case 'calcularCambio':
                $this -> calcularCambio();
                break;
            case 'cerrarTicket':
                $this -> cerrarTicket();
                break;
            case 'vistaReporteFecha':
                $this -> vistaReporteFecha();
                break;
            case 'generarReporteFecha':
                $this -> generarReporteFecha();
                break;
            case 'vistaReportePlaca':
                $this -> vistaReportePlaca();
                break;
            case 'buscarReportePlaca':
                $this -> buscarReportePlaca();
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

    public function listarEmpleados(){
        $empleadosControlador = new EmpleadosControlador($this -> datos);
    }

    public function actualizarEmpleado(){
        $empleadosControlador = new EmpleadosControlador($this -> datos);
    }

    public function cancelarActualizarEmpleado(){
        $empleadosControlador = new EmpleadosControlador($this -> datos);
    }

    public function confirmarActualizarEmpleado(){
        $empleadosControlador = new EmpleadosControlador($this -> datos);
    }

    public function eliminarEmpleado(){
        $empleadosControlador = new EmpleadosControlador($this -> datos);
    }

    public function listarEmpleadosInactivos(){
        $empleadosControlador = new EmpleadosControlador($this -> datos);
    }

    public function habilitarEmpleado(){
        $empleadosControlador = new EmpleadosControlador($this -> datos);
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

    public function eliminarTipoDocumento(){
        $tiposDocumentos = new TiposDocumentosControlador($this -> datos);
    }

    public function insertarTipoDocumento(){
        $tiposDocumentos = new TiposDocumentosControlador($this -> datos);
    }

    public function confirmarInsertarTipoDocumento(){
        $tiposDocumentos = new TiposDocumentosControlador($this -> datos);
    }

    public function listarTiposDocumentosInactivos(){
        $tiposDocumentos = new TiposDocumentosControlador($this -> datos);
    }

    public function habilitarTipoDocumento(){
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

    public function insertarTicket(){
        $ticketsControlador = new TicketsControlador($this -> datos);
    }

    public function confirmarInsertarTickets(){
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
    public function abrirTicket(){
        $ticketsControlador = new TicketsControlador($this -> datos);
    }
    public function buscarPlaca(){
        $vehiculosControlador = new VehiculosControlador($this -> datos);
    }
    public function cerrarSesion(){
        $usuariosControlador = new Usuario_sControlador($this -> datos);
    }
    public function calcularValorFinal(){
        $ticketsControlador = new TicketsControlador($this -> datos);
    }
    public function calcularCambio(){
        $ticketsControlador = new TicketsControlador($this -> datos);
    }

    public function cerrarTicket(){
        $ticketsControlador = new TicketsControlador($this -> datos);
    }

    public function vistaReporteFecha(){
        $reportesControlador = new ReportesControlador($this -> datos);
    }

    public function generarReporteFecha(){
        $reportesControlador = new ReportesControlador($this -> datos);
    }
    public function vistaReportePlaca(){
        $reportesControlador = new ReportesControlador($this -> datos);
    }

    public function buscarReportePlaca(){
        $reportesControlador = new ReportesControlador($this -> datos);
    }
}


?>