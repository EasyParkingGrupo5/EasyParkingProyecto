<?php

include_once PATH . 'modelos/ConBdMysql.php';

class EmpleadosDAO extends ConDbMySql{
    public function __construct ($servidor, $base, $usuario_db, $contrasenia_db){
        parent::__construct($servidor, $base, $usuario_db, $contrasenia_db);
    }

    public function seleccionarTodos(){
        $planconsulta = "SELECT emp.empId, emp.empNumeroDocumento, 
        emp.empPrimerNombre, emp.empSegundoNombre, emp.empPrimerApellido, 
        emp.empSegundoApellido, emp.empTelefono, emp.empTipoSangre, 
        emp.empRh, emp.empEstado, emp.empUsuSesion, emp.emp_created_at,
         emp.emp_updated_at, usu.usuLogin, tip.tipDocNombre_documento 
         FROM empleados emp JOIN usuario_s usu ON emp.usuario_s_usuId = 
         usu.usuId JOIN tipos_documentos tip ON emp.Tipos_Documentos_tipDocId = 
         tip.tipDocId ORDER BY emp.empId ASC;";

        $registroLibros = $this->conexion->prepare($planconsulta);
        $registroLibros->execute();

        $listadoRegistrosLibros = array();

        while( $registro = $registroLibros->fetch(PDO::FETCH_OBJ)){
            $listadoRegistrosLibros[]=$registro;
        }
          $this->cierreBd();
          return $listadoRegistrosLibros;
    }

    public function seleccionarID($sId){
        $consulta = "SELECT * FROM empleados WHERE empleados.empId = ?;";

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
            $consulta = "INSERT INTO empleados (empNumeroDocumento, empPrimerNombre, empSegundoNombre,
             empPrimerApellido, empSegundoApellido, empTelefono, empTipoSangre, empRh, usuario_s_usuId, 
             Tipos_Documentos_tipDocId ) VALUES (:empNumeroDocumento, :empPrimerNombre, :empSegundoNombre, 
             :empPrimerApellido, :empSegundoApellido, :empTelefono, :empTipoSangre, :empRh, :usuario_s_usuId, :Tipos_Documentos_tipDocId);";

            $insertar = $this->conexion->prepare($consulta);

            $insertar -> bindParam(":empNumeroDocumento", $registro['empNumeroDocumento']);
            $insertar -> bindParam(":empPrimerNombre", $registro['empPrimerNombre']);
            $insertar -> bindParam(":empSegundoNombre", $registro['empSegundoNombre']);
            $insertar -> bindParam(":empPrimerApellido", $registro['empPrimerApellido']);
            $insertar -> bindParam(":empSegundoApellido", $registro['empSegundoApellido']);
            $insertar -> bindParam(":empTelefono", $registro['empTelefono']);
            $insertar -> bindParam(":empTipoSangre", $registro['empTipoSangre']);
            $insertar -> bindParam(":empRh", $registro['empRh']);
            $insertar -> bindParam(":usuario_s_usuId", $registro['usuario_s_usuId']);
            $insertar -> bindParam(":Tipos_Documentos_tipDocId", $registro['Tipos_Documentos_tipDocId']);

            $insercion = $insertar->execute();

            $clavePrimaria = $this->conexion->lastInsertId();

            return ['Inserto'=>1,'resultado'=>$clavePrimaria];

            $this->cierreBd();

        } catch (PDOException $pdoExc) {
            return ['Inserto'=>0,$pdoExc->errorInfo[2]];
        }
    }
    public function actualizar($registro){
        try {
            $consulta = "UPDATE empleados SET empNumeroDocumento = :empNumeroDocumento, empPrimerNombre = :empPrimerNombre, 
            empSegundoNombre = :empSegundoNombre, empPrimerApellido = :empPrimerApellido, empSegundoApellido = :empSegundoApellido, 
            empTelefono = :empTelefono, empTipoSangre = :empTipoSangre, empRh = :empRh, Tipos_Documentos_tipDocId = :Tipos_Documentos_tipDocId WHERE 
            empId = :empId;";
            
            $actualizar = $this -> conexion -> prepare($consulta);

            $actualizar -> bindParam(":empNumeroDocumento", $registro['empNumeroDocumento']);
            $actualizar -> bindParam(":empPrimerNombre", $registro['empPrimerNombre']);
            $actualizar -> bindParam(":empSegundoNombre", $registro['empSegundoNombre']);
            $actualizar -> bindParam(":empPrimerApellido", $registro['empPrimerApellido']);
            $actualizar -> bindParam(":empSegundoApellido", $registro['empSegundoApellido']);
            $actualizar -> bindParam(":empTelefono", $registro['empTelefono']);
            $actualizar -> bindParam(":empTipoSangre", $registro['empTipoSangre']);
            $actualizar -> bindParam(":empRh", $registro['empRh']);
            $actualizar -> bindParam(":empId", $registro['empId']);
            $actualizar -> bindParam(":Tipos_Documentos_tipDocId", $registro['Tipos_Documentos_tipDocId']);

            $actualizacion = $actualizar -> execute();

            $this->cierreBd();

            return ['actualizacion' => $actualizacion, 'mensaje' => 'Resgistro Actualizado'];

        } catch (PDOException $pdoExc) {
            return ['actualizacion' => $actualizacion, 'mensaje' => $pdoExc];
        }
    } 

    public function eliminar($sId = array()){
        $consulta = "DELETE FROM empleados WHERE empId = :empId";

        $eliminar = $this->conexion->prepare($consulta);
        $eliminar->bindParam(':empId', $sId[0],PDO::PARAM_INT);
        $resultado = $eliminar->execute();

        $this->cierreBd();

        if(!empty($resultado)){
            return ['eliminado' => true, 'registroEliminado' => array($sId[0])];
        }else{
            return ['eliminado' => false, 'registroEliminado' => array($sId[0])];
        }
    }

    public function habilitar($sId = array()){
        try {
            $cambiarEstado = 1;

            if(isset($sId[0])){
                $actualizar = "UPDATE empleados SET empEstado = ? WHERE empId = ?";
                $actualizacion = $this->conexion->prepare($actualizar);
                $actualizacion = $actualizacion->execute(array($cambiarEstado, $sId[0]));
                return ['actualizacion' => $actualizacion, 'mensaje' => 'Resgistro Activado'];
            }
        } catch (PDOException $pdoExc) {
            return ['actualizacion' => $actualizacion, 'mensaje' => $pdoExc];
        }
    }

    public function eliminarLogico($sId = array()){
        try {
            $cambiarEstado = 0;

            if(isset($sId[0])){
                $actualizar = "UPDATE empleados SET empEstado = ? WHERE empId = ?";
                $actualizacion = $this->conexion->prepare($actualizar);
                $actualizacion = $actualizacion->execute(array($cambiarEstado, $sId[0]));
                return ['actualizacion' => $actualizacion, 'mensaje' => 'Resgistro Desactivado'];
            }
        } catch (PDOException $pdoExc) {
            return ['actualizacion' => $actualizacion, 'mensaje' => $pdoExc];
        }
        
    }

}

?>