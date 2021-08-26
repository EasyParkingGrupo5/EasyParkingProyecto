 <?php

include_once PATH . 'controladores/LibrosControlador.php';
include_once PATH . 'controladores/rolesControlador.php';
include_once PATH . 'controladores/usuario_SControlador.php';

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



}

?>