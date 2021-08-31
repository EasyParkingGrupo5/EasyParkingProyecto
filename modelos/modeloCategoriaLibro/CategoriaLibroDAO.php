<?php

include_once PATH . 'modelos/ConBdMysql.php';

class CategoriaLibroDAO extends ConDbMySql{
    public function __construct($servidor, $base, $loginDB, $passwordDB){
        parent::__construct($servidor, $base, $loginDB, $passwordDB);  
    }
    
    public function seleccionarTodos(){
        $planconsulta = "SELECT * FROM categorialibro;";

        $registroCategoriaLibro = $this->conexion->prepare($planconsulta);
        $registroCategoriaLibro->execute();

        $listadoRegistrosCategoriaLibro = array();

        while( $registro = $registroCategoriaLibro->fetch(PDO::FETCH_OBJ)){
            $listadoRegistrosCategoriaLibro[]=$registro;
        }
          $this->cierreBd();
          return $listadoRegistrosCategoriaLibro;
    }

    public function seleccionarID($sId){

    }

    public function insertar($registro){

    }

    public function actualizar($registro){
        
    }

    public function eliminar($sId = array()){

    }

    public function habilitar($sId = array()){

    }

    public function eliminarLogico($sId = array()){
    }
}
?>