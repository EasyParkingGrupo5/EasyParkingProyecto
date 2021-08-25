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
        }
    }
    public function listarLibros(){
        $gestarLibros = new LibroDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);
        $registroLibros = $gestarLibros -> seleccionarTodos();
    
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
    
}

?>
