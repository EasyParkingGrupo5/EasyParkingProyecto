<?php

include_once PATH . 'controladores/LibrosControlador.php';
include_once PATH . 'controladores/TicketsControlador.php';
include_once PATH . 'controladores/VehículosControlador.php';


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
            case 'actualizarLibros':
                $this -> actualizarLibros();
                break;
            case 'listarTickets':
                $this -> listarTickets();
                break;
                case 'listarVehiculos':
                $this -> listarVehiculos();
                break;
        }
    }

    public function listarLibros(){
        $librosControlador = new LibrosControlador($this ->datos);
    }

    public function actualizarLibros(){
        $librosControlador = new LibrosControlador($this -> datos);
    }
    
    public function listarTickets(){
        $ticketsControlador = new TicketsControlador($this -> datos);
    }
    
    public function listarVehiculos(){
        $vehiculosControlador = new VehiculosControlador($this -> datos);
    }
    
}

?>