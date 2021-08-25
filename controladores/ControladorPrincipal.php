 <?php

include_once PATH . 'controladores/LibrosControlador.php';
include_once PATH . 'controladores/rolesControlador.php';

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
            case 'listarRoles':
                $this -> listarRoles();
        }
    }

    public function listarLibros(){
        $librosControlador = new LibrosControlador($this ->datos);
    }

    public function actualizarLibros(){
        $librosControlador = new LibrosControlador($this -> datos);
    }

    public function listarRoles(){
        $rolesControlador = new rolesControlador($this -> datos);
    }

}

?>