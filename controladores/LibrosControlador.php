<?php

include_once PATH . 'modelos/modeloLibros/LibrosDAO.php';
include_once PATH . 'modelos/modeloCategoriaLibro/CategoriaLibroDAO.php';

class LibrosControlador{

    private $datos;
    
    public function __construct($datos){
        $this->datos = $datos;
        $this->librosControlador();
    }
    
    public function librosControlador(){
        switch ($this->datos['ruta']) {
            case 'listarLibros':
                $this->listarLibros();
                break;
            case 'actualizarLibro':
                $this->actualizarLibro();
                break;
            case 'confirmarActualizarLibro': 
                $this->confirmarActualizarLibro();
                break;
            case 'cancelarActualizarLibro':
                $this -> cancelarActualizarLibro();
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
        }
    }
    public function listarLibros(){
        $gestarLibros = new LibroDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);
        $registroLibros = $gestarLibros -> seleccionarTodos(1);
    
        session_start();
    
        $_SESSION['listaDeLibros'] = $registroLibros;
    
        header("location:principal.php?contenido=vistas/vistasLibros/listarDTRegistrosLibros.php");
    }

    public  function actualizarLibro(){
        $gestarLibros = new LibroDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);
        $actualizarLibro = $gestarLibros -> seleccionarID(array($this->datos['idAct']));

        $actualizarDatosLibro = $actualizarLibro['registroEncontrado'][0];

        $gestarCategorias = new CategoriaLibroDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);
        $listarCategorias = $gestarCategorias -> seleccionarTodos();

        session_start();

        $_SESSION['actualizarLibro'] = $actualizarDatosLibro;
        $_SESSION['listarCategorias'] = $listarCategorias;

        header("location:principal.php?contenido=vistas/vistasLibros/vistaActualizarLibro.php");
    }

    public function confirmarActualizarLibro(){
        $gestarLibros = new LibroDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);
        $confirmarActualizarLibro = $gestarLibros -> actualizar(array($this->datos));

        session_start();

        $_SESSION['mensaje'] = "Registro Actualizado";
        header("location:Controlador.php?ruta=listarLibros");
    }

    public function cancelarActualizarLibro(){
        
        header("location:Controlador.php?ruta=listarLibros");
    }

    public function agregarLibro(){
        $gestarCategorias = new CategoriaLibroDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);
        $listarCategorias = $gestarCategorias -> seleccionarTodos();

        session_start();

        $_SESSION['listarCategorias'] = $listarCategorias;

        header('location:principal.php?contenido=vistas/vistasLibros/vistaInsertarLibro.php');
    }

    public function confirmarInsertarLibro(){
        $gestarLibros = new LibroDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);
        $buscarLibro = $gestarLibros -> seleccionarID(array($this->datos['isbn']));

        if(!$buscarLibro['exitoSeleccionId']){
            $insertarLibro = new LibroDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);
            $insertoLibro = $insertarLibro -> insertar($this -> datos);

            session_start();

            $_SESSION['mensaje'] = 'Fue insertado con exito con el código '.$insertoLibro['resultado'];
            header("location:Controlador.php?ruta=listarLibros");
        }else{
            session_start();
                $_SESSION['isbn'] = $this->datos['isbn'];
                $_SESSION['titulo'] = $this->datos['titulo'];
                $_SESSION['autor'] = $this->datos['autor'];
                $_SESSION['precio'] = $this->datos['precio'];
                $_SESSION['categoriaLibro_catLibId'] = $this->datos['categoriaLibro_catLibId'];					
					
                $_SESSION['mensaje'] = "El código " . $this->datos['isbn'] . " ya existe en el sistema.";

                header("location:Controlador.php?ruta=agregarLibro");
        }

        }
        
        public function eliminarLibro(){
            $gestarLibros = new LibroDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);
            $inhabilitarLibro = $gestarLibros -> eliminarLogico(array($this -> datos['idAct']));

            session_start();

            $_SESSION['mensaje'] = "Registro Eliminado";
            header("location:Controlador.php?ruta=listarLibros");


        }

        public function listarLibrosInactivos(){
            $gestarLibros = new LibroDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);
            $listarInactivos = $gestarLibros -> seleccionarTodos(0);

            session_start();
    
            $_SESSION['listaDeLibros'] = $listarInactivos;
    
            header("location:principal.php?contenido=vistas/vistasLibros/listarDTRegistrosInactivos.php");
        }

        public function habilitarLibro(){
            $gestarLibros = new LibroDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);
            $inhabilitarLibro = $gestarLibros -> habilitar(array($this -> datos['idAct']));

            session_start();

            $_SESSION['mensaje'] = "Registro Habilitado";
            header("location:Controlador.php?ruta=listarLibrosInactivos");
        }
    }

?>
