<?php

include_once PATH . 'modelos/modeloUsuario_s/Usuario_sDAO.php';
include_once PATH . 'modelos/modeloEmpleados/EmpleadosDAO.php';
include_once PATH . 'modelos/modeloUsuario_s_roles/Usuario_s_rolesDAO.php';
include_once PATH . 'modelos/modeloRol/RolDAO.php';

class Usuario_sControlador{

    private $datos = array();
    
    public function __construct($datos){
        $this->datos = $datos;
        $this->usuario_sControlador();
    }
    
    public function usuario_sControlador(){
        switch ($this->datos['ruta']) {
            case 'gestionDeRegistro':
                $this -> gestionDeRegistro();
                break;
            case 'gestionDeAcceso':
                $this -> gestionDeAcceso();
                break;
            case 'listarUsuarios':
                $this->listarUsuarios();
                break;
            case 'actualizarUsuarios':
                $this->actualizarUsuarios();
                break;
            case 'confirmarActualizarUsuarios':
                 $this -> confirmarActualizarUsuarios();
                break;
            case 'cancelarActualizarUsuarios':
                 $this -> cancelarActualizarUsuarios();
                 break;
        }
    }

    public function gestionDeRegistro(){
        $gestarUsuarios = new Usuario_sDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);
        $existeUsuario = $gestarUsuarios -> seleccionarID(array($this -> datos['empNumeroDocumento'], $this -> datos['usuLogin']));
        
        if (0 == $existeUsuario['exitoSeleccionId']) {
            $this -> datos['usuPassword'] = md5($this -> datos ['usuPassword']);
            $insertarUsuario = $gestarUsuarios -> insertar($this -> datos);
            $exitoInsercionUsuario = $insertarUsuario['Inserto'];
            $resultadoInsercionUsuario = $insertarUsuario['resultado'];

            $gestarEmpleado = new EmpleadosDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);
            $this -> datos['empId'] = $resultadoInsercionUsuario;
            $insertarEmpleado = $gestarEmpleado -> insertar($this -> datos);
            $exitoInsercionEmpleado = $insertarEmpleado['Inserto'];
            $resultadoInsercionEmpleado = $insertarEmpleado['resultado'];

            $gestarRol = new UsuarioRolesDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);
            $gestarRol -> insertar(array($resultadoInsercionUsuario, 6));

            session_start();

            $_SESSION['mensaje'] = "Registrado con èxito para ingreso al sistema";				

            header("location:login.php");
        }else{
            session_start();

            $_SESSION['empNumeroDocumento'] = $this -> datos['empNumeroDocumento'];
            $_SESSION['empPrimerNombre'] = $this -> datos['empPrimerNombre'];
            $_SESSION['empSegundoNombre'] = $this -> datos['empSegundoNombre'];
            $_SESSION['empPrimerApellido'] = $this -> datos['empPrimerApellido'];
            $_SESSION['empSegundoApellido'] = $this -> datos['empSegundoApellido'];
            $_SESSION['empTelefono'] = $this -> datos['empTelefono'];
            $_SESSION['usuLogin'] = $this -> datos['usuLogin'];
            $_SESSION['mensaje'] = "El usuario ya existe en el sistema.";

            header("location:Controlador.php?ruta=registrar");
        }
    }

    public function gestionDeAcceso(){
        $gestarUsuarios = new Usuario_sDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);

        $this -> datos['usuPassword'] = md5($this -> datos['usuPassword']);
        $this -> datos['documento'] = "";
        $existeUsuario = $gestarUsuarios -> seleccionarID(array($this->datos['documento'], $this->datos['usuLogin'], $this -> datos['usuPassword']));

        if (($existeUsuario['exitoSeleccionId'] == 1) && ($existeUsuario['registroEncontrado'][0]->usuLogin == $this -> datos ['usuLogin'])) {
            session_start();

            $_SESSION['mensaje'] = "Bienvenido a EasyParking";
            $_SESSION['nombre'] = $existeUsuario['registroEncontrado'][0]->empPrimerNombre;
            $_SESSION['apellido'] = $existeUsuario['registroEncontrado'][0]->empPrimerApellido;

            $gestarRoles = new RolDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);
            $rolesUsuario = $gestarRoles->seleccionarRolPorPersona(array($existeUsuario['registroEncontrado'][0]->empNumeroDocumento ));
            $cantidadRoles = count($rolesUsuario['registroEncontrado']);
            $rolesEnSesion = array();
            for ($i = 0; $i < $cantidadRoles; $i++) {
                $rolesEnSesion[] = $rolesUsuario['registroEncontrado'][$i]->rolId;
            }

            header("location:principal.php");

        }else{
            session_start();

            $_SESSION['mensaje'] = "Credenciales de acceso incorrectas"; 
            header("location:login.php");	

        }
    }

    public function listarUsuarios(){
        $gestarUsuarios = new Usuario_sDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);
        $registroUsuarios = $gestarUsuarios -> seleccionarTodos();
    
        session_start();
    
        $_SESSION['listaDeUsuarios'] = $registroUsuarios;
    
        header("location:principal.php?contenido=vistas/vistasUsuarios_S/listarRegistroUsuarios_s.php");
    }

    public  function actualizarUsuarios(){

        $gestarUsuarios = new Usuario_sDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);
        $actualizarUsuarios = $gestarUsuarios -> seleccionarID(array($this->datos['usuId']));

        $actualizarDatosUsuarios = $actualizarUsuarios['registroEncontrado'][0];

        session_start();
        $_SESSION['actualizarDatosUsuarios']=$actualizarDatosUsuarios;

        header("location:principal.php?contenido=vistas/vistasUsuarios_S/vistaActualizarUsuarios_S.php");
        
    }

    public function confirmarActualizarUsuarios(){

        $gestarUsuarios = new Usuario_sDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);
        $actualizarUsuarios = $gestarUsuarios -> actualizar(array($this->datos));

        session_start();
            $_SESSION['mensaje'] = "Actualización realizada.";
            header("location:Controlador.php?ruta=listarUsuarios");	

    }

    public function cancelarActualizarUsuarios(){

        session_start();
                $_SESSION['mensaje'] = "Desistió de la actualización";
		        header("location:Controlador.php?ruta=listarUsuarios");	

    }
    
}

?>