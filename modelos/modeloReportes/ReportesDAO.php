<?php

include_once PATH . 'modelos/ConBdMysql.php';

class ReportesDAO extends ConDbMySql{
    public function __construct($servidor, $base, $loginDB, $passwordDB){
        parent::__construct($servidor, $base, $loginDB, $passwordDB);  
    }
    
    public function seleccionarTodos($estado){
        $planconsulta = "SELECT * FROM reportes r JOIN vehiculos ve  ON ve.vehId=ve.Vehiculos_vehId WHERE r.ticEstado=:repEstado";

        $registroReportes = $this->conexion->prepare($planconsulta);
    
        $registroReportes->bindParam(':Estado',$estado);
        
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
        try{
            $repNumero = $registro[0]['repNumero'];
            $repFecha = $registro[0]['repFecha'];
            $Empleados_empId = $registro[0]['Empleados_empId'];
            $Vehiculos_vehId = $registro[0]['Vehiculos_vehId'];
            $repId = $registro[0]['repId'];	
			
			
			if(isset($repId)){
				
                $actualizar = "UPDATE reportes SET repNumero= ? , ";
                $actualizar .= " repFecha = ? , ";
                $actualizar .= " Empleados_empId = ?, ";
                $actualizar .= " Vehiculos_vehId = ? ";
                $actualizar .= " WHERE repId= ? ; ";
				
				$actualizacion = $this->conexion->prepare($actualizar);
				
				$resultadoAct=$actualizacion->execute(array($repNumero,$repFecha,$empleados_empId,$Vehiculos_vehId,$repId));
				
				        $this->cierreBd();
						
                return ['actualizacion' => $resultadoAct, 'mensaje' => "Actualización realizada."];				
				
			}


        } catch (PDOException $pdoExc) {
			$this->cierreBd();
            return ['actualizacion' => $resultadoAct, 'mensaje' => $pdoExc];
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