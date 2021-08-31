<?php

include_once 'modelos/ConBdMysql.php';


class LibroDAO extends ConDbMySql{
    public function __construct($servidor, $base, $loginDB, $passwordDB){
        parent::__construct($servidor, $base, $loginDB, $passwordDB);  
    }
    
    public function seleccionarTodos($estado){
        $planconsulta = "SELECT l.isbn,l.titulo,l.autor,l.precio,cl.catLibId,cl.catLibNombre ";
        $planconsulta.="FROM libros l ";
        $planconsulta.="JOIN categorialibro cl ON l.categoriaLibro_catLibId=cl.catLibId "; 
        $planconsulta.="where l.estado = :estado";

        $registroLibros = $this->conexion->prepare($planconsulta);

        $registroLibros -> bindParam(":estado", $estado);

        $registroLibros->execute();

        $listadoRegistrosLibros = array();

        while( $registro = $registroLibros->fetch(PDO::FETCH_OBJ)){
            $listadoRegistrosLibros[]=$registro;
        }
          $this->cierreBd();
          return $listadoRegistrosLibros;
    }

    public function seleccionarID($sId){
        $consulta = "SELECT * FROM libros WHERE libros.isbn = ? ";

        $listar = $this->conexion->prepare($consulta);
        $listar->execute(array($sId[0]));

        $registroEncontrado = array();

        while( $registro = $listar->fetch(PDO::FETCH_OBJ)){
            $registroEncontrado[]=$registro;
        }
          $this->cierreBd();
          
        if(!empty($registroEncontrado)){
            return ['exitoSeleccionId' => true, 'registroEncontrado' => $registroEncontrado];
        }else{
            return ['exitoSeleccionId' => false, 'registroEncontrado' => $registroEncontrado];
        }
    } 

    public function insertar($registro){
        try {
            $consulta = "INSERT INTO libros (isbn, titulo, autor, 
            precio, categoriaLibro_catLibId) VALUES (:isbn , :titulo , 
            :autor , :precio , :categoriaLibro_catLibId );";

            $insertar = $this->conexion->prepare($consulta);

            $insertar -> bindParam(":isbn", $registro['isbn']);
            $insertar -> bindParam(":titulo", $registro['titulo']);
            $insertar -> bindParam(":autor", $registro['autor']);
            $insertar -> bindParam(":precio", $registro['precio']);
            $insertar -> bindParam(":categoriaLibro_catLibId", $registro['categoriaLibro_catLibId']);
            $insercion = $insertar->execute();

            return ['Inserto'=>true,'resultado'=>$registro['isbn']];
<<<<<<< HEAD
=======

            return ['Inserto'=>1,'resultado'=>$clavePrimaria];
>>>>>>> develop

            $this->cierreBd();

        } catch (PDOException $pdoExc) {
            return ['Inserto'=>false,$pdoExc->errorInfo[2]];
        }
    }

    public function actualizar($registro){
        try{
            $autor = $registro[0]['autor'];
            $titulo = $registro[0]['titulo'];
            $precio = $registro[0]['precio'];
            $categoria = $registro[0]['categoriaLibro_catLibId'];
            $isbn = $registro[0]['isbn'];	
			
			
			if(isset($isbn)){
				
                $actualizar = "UPDATE libros SET autor= ? , ";
                $actualizar .= " titulo = ? , ";
                $actualizar .= " precio = ? , ";
                $actualizar .= " categoriaLibro_catLibId = ? ";
                $actualizar .= " WHERE isbn= ? ; ";
				
				$actualizacion = $this->conexion->prepare($actualizar);
				
				$resultadoAct=$actualizacion->execute(array($autor,$titulo,$precio,$categoria, $isbn));
				
				$this->cierreBd();
						
                return ['actualizacion' => $resultadoAct, 'mensaje' => "Actualización realizada."];				
				
			}


        } catch (PDOException $pdoExc) {
			$this->cierreBd();
            return ['actualizacion' => $resultadoAct, 'mensaje' => $pdoExc];
        }

    }

    public function eliminar($sId = array()){
        try{
        $consulta = "DELETE FROM libros WHERE isbn = :isbn;";

        $eliminar = $this->conexion->prepare($consulta);
        $eliminar->bindParam(':isbn', $sId[0],PDO::PARAM_INT);
        $resultado = $eliminar->execute();
        $this->cierreBd();

        if(!empty($resultado)){
            return ['eliminado' => true, 'registroEliminado' => array($sId[0])];
            }
        }catch(PDOException $pdo){
            return ['eliminado' => false, 'mensaje' => $pdo];
        }
    }

    public function habilitar($sId = array()){
        try {
            $cambiarEstado = 1;

            if(isset($sId[0])){
                $actualizar = "UPDATE libros SET estado = ? WHERE isbn = ?";
                $actualizacion = $this->conexion->prepare($actualizar);
                $actualizacion = $actualizacion->execute(array($cambiarEstado, $sId[0]));
                return ['actualizacion' => $actualizacion, 'mensaje' => 'Registro Activado'];
            }
        } catch (PDOException $pdoExc) {
            return ['actualizacion' => $actualizacion, 'mensaje' => $pdoExc];
        }
    }

    public function eliminarLogico($sId = array()){
        try {
            $cambiarEstado = 0;

            if(isset($sId[0])){
                $actualizar = "UPDATE libros SET estado = ? WHERE isbn = ?";
                $actualizacion = $this->conexion->prepare($actualizar);
                $actualizacion = $actualizacion->execute(array($cambiarEstado, $sId[0]));
                return ['actualizacion' => $actualizacion, 'mensaje' => 'Registro Desactivado'];
            }
        } catch (PDOException $pdoExc) {
            return ['actualizacion' => $actualizacion, 'mensaje' => $pdoExc];
        }
        
    }
}
?>