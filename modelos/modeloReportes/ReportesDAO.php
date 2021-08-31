<?php

include_once PATH . 'modelos/ConBdMysql.php';

class ReportesDAO extends ConDbMySql{
    public function __construct($servidor, $base, $loginDB, $passwordDB){
        parent::__construct($servidor, $base, $loginDB, $passwordDB);  
    }
    
    public function seleccionarTodos(){
        $planconsulta = "SELECT rep.repId, rep.repNumero, rep.repFecha, 
        rep.repEstado, rep.rep_created_at, rep.rep_updated_at, 
        rep.repUsuSesion, emp.empId, emp.empNumeroDocumento, veh.vehId, 
        veh.vehNumero_Placa FROM reportes rep JOIN empleados emp ON 
        rep.Empleados_empId = emp.empId JOIN vehiculos veh ON 
        rep.Vehiculos_vehId = veh.vehId;";

        $registroReportes = $this->conexion->prepare($planconsulta);
        $registroReportes->execute();

        $listadoRegistrosReportes = array();

        while( $registro = $registroReportes->fetch(PDO::FETCH_OBJ)){
            $listadoRegistrosReportes[]=$registro;
        }
          $this->cierreBd();
          return $listadoRegistrosReportes;
    }

    public function seleccionarID($sId){
        $consulta = "SELECT * FROM reportes WHERE repId=?; ";

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
        $consulta = "INSERT INTO reportes (repId, repNumero, repFecha,repEstado, rep_created_at, rep_updated_at, 
       repUsuSesion,Empleados_empId,Vehiculos_vehId) VALUES(:repId, :repNumero, :repFecha,:repEstado,:rep_created_at,:rep_updated_at, 
       :repUsuSesion,:Empleados_empId,:Vehiculos_vehId);"; 

        $insertar = $this->conexion->prepare($consulta);

       
        $insertar -> bindParam(":repId", $registro['repId']);
        $insertar -> bindParam(":repNumero", $registro['repNumero']);
        $insertar -> bindParam(":repFecha", $registro['repFecha']);
        $insertar -> bindParam(":repEstado", $registro['repEstado']);
        $insertar -> bindParam(":rep_created_at", $registro['rep_created_at']);
        $insertar -> bindParam(":rep_updated_at", $registro['rep_updated_at']);
        $insertar -> bindParam(":repUsuSesion", $registro['repUsuSesion']);
        $insertar -> bindParam(":Empleados_empId", $registro['Empleados_empId']);
        $insertar -> bindParam(":Vehiculos_vehId", $registro['Vehiculos_vehId']);
 

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
            $consulta = "UPDATE reportes SET repNumero = :repNumero, repFecha = :repFecha, 
            repEstado = :repEstado WHERE repId = :repId;";
            
            $actualizar = $this -> conexion -> prepare($consulta);

            $actualizar -> bindParam(":repNumero", $registro['repNumero']);
            $actualizar -> bindParam(":repFecha", $registro['repFecha']);
            $actualizar -> bindParam(":repEstado", $registro['repEstado']);
            $actualizar -> bindParam(":repId", $registro['repId']);

            $actualizacion = $actualizar -> execute();

            $this->cierreBd();

            return ['actualizacion' => $actualizacion, 'mensaje' => 'Resgistro Actualizado'];

        } catch (PDOException $pdoExc) {
            $this->cierreBd();
            return ['actualizacion' => $actualizacion, 'mensaje' => $pdoExc];
        }
        
    }

    public function eliminar($sId = array()){
        $consulta = "DELETE FROM reportes WHERE repId = :repId;";

        $eliminar = $this->conexion->prepare($consulta);
        $eliminar->bindParam(':repId', $sId[0],PDO::PARAM_INT);
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
                $actualizar = "UPDATE reportes SET repEstado = ? WHERE repId = ?";
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
                $actualizar = "UPDATE reportes SET repEstado = ? WHERE repId = ?";
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