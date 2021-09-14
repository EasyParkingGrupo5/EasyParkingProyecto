<?php

include_once PATH . 'modelos/ConBdMysql.php';

class EmpleadosDAO extends ConDbMySql{
    public function __construct ($servidor, $base, $usuario_db, $contrasenia_db){
        parent::__construct($servidor, $base, $usuario_db, $contrasenia_db);
    }

    public function seleccionarTodos($estado){
        $planconsulta = "SELECT emp.empId, emp.empNumeroDocumento, 
        emp.empPrimerNombre, emp.empSegundoNombre, emp.empPrimerApellido, 
        emp.empSegundoApellido, emp.empTelefono, emp.empTipoSangre, 
        emp.empRh, emp.empEstado, emp.empUsuSesion, emp.emp_created_at,
         emp.emp_updated_at, usu.usuLogin, tip.tipDocNombre_documento 
         FROM empleados emp JOIN usuario_s usu ON emp.usuario_s_usuId = 
         usu.usuId JOIN tipos_documentos tip ON emp.Tipos_Documentos_tipDocId = 
         tip.tipDocId WHERE empEstado = :empEstado";

        $registroLibros = $this->conexion->prepare($planconsulta);
        $registroLibros -> bindParam(":empEstado", $estado);
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
            $consulta = "INSERT INTO empleados (empId, empNumeroDocumento, empPrimerNombre, empSegundoNombre,
             empPrimerApellido, empSegundoApellido, empTelefono, empTipoSangre, empRh, usuario_s_usuId, 
             Tipos_Documentos_tipDocId ) VALUES (:empId, :empNumeroDocumento, :empPrimerNombre, :empSegundoNombre, 
             :empPrimerApellido, :empSegundoApellido, :empTelefono, :empTipoSangre, :empRh, :usuario_s_usuId, :Tipos_Documentos_tipDocId);";

            $insertar = $this->conexion->prepare($consulta);

            $insertar -> bindParam(":empId", $registro['empId']);
            $insertar -> bindParam(":empNumeroDocumento", $registro['empNumeroDocumento']);
            $insertar -> bindParam(":empPrimerNombre", $registro['empPrimerNombre']);
            $insertar -> bindParam(":empSegundoNombre", $registro['empSegundoNombre']);
            $insertar -> bindParam(":empPrimerApellido", $registro['empPrimerApellido']);
            $insertar -> bindParam(":empSegundoApellido", $registro['empSegundoApellido']);
            $insertar -> bindParam(":empTelefono", $registro['empTelefono']);
            $insertar -> bindParam(":empTipoSangre", $registro['empTipoSangre']);
            $insertar -> bindParam(":empRh", $registro['empRh']);
            $insertar -> bindParam(":usuario_s_usuId", $registro['empId']);
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
            $id = $registro[0]['empId'];
            $documento = $registro[0]['empNumeroDocumento'];
            $primerNombre = $registro[0]['empPrimerNombre'];
            $segundoNombre = $registro[0]['empSegundoNombre'];
            $primerApellido = $registro[0]['empPrimerApellido'];
            $segundoApellido = $registro[0]['empSegundoApellido'];
            $telefono = $registro[0]['empTelefono'];
            $tipoSangre = $registro[0]['empTipoSangre'];
            $rh = $registro[0]['empRh'];
            $tipoDocumento = $registro[0]['Tipos_Documentos_tipDocId'];

            if(isset($id)){

                $consulta = "UPDATE empleados SET empNumeroDocumento = ?, empPrimerNombre = ?, 
                empSegundoNombre = ?, empPrimerApellido = ?, empSegundoApellido = ?, 
                empTelefono = ?, empTipoSangre = ?, empRh = ?, Tipos_Documentos_tipDocId = ? WHERE 
                empId = ?;";
                
                $actualizar = $this -> conexion -> prepare($consulta);

                $actualizacion = $actualizar -> execute(array($documento, $primerNombre, $segundoNombre, $primerApellido, $segundoApellido, $telefono, $tipoSangre, $rh, $tipoDocumento, $id));

                $this->cierreBd();

                return ['actualizacion' => $actualizacion, 'mensaje' => 'Resgistro Actualizado'];

            }
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