<?php

include_once PATH . 'modelos/ConBdMysql.php';

class VehiculosDAO extends ConDbMySql{
    public function __construct($servidor, $base, $loginDB, $passwordDB){
        parent::__construct($servidor, $base, $loginDB, $passwordDB);  
    }
    
    public function seleccionarTodos(){
        $planconsulta = "SELECT veh.vehId, veh.vehNumero_Placa, 
        veh.vehColor, veh.vehMarca, veh.vehEstado, veh.vehUsuSesion, 
        veh.vehCreated_At, veh.vehUpdated_At, emp.empId, 
        emp.empNumeroDocumento, tic.ticId, tic.ticNumero 
        FROM vehiculos veh JOIN empleados emp ON veh.Empleados_empId = 
        emp.empId JOIN tickets tic ON veh.Tickets_ticId = tic.ticId; 
        ";

        $registroVehiculos = $this->conexion->prepare($planconsulta);
        $registroVehiculos->execute();

        $listadoRegistrosVehiculos = array();

        while( $registro = $registroVehiculos->fetch(PDO::FETCH_OBJ)){
            $listadoRegistrosVehiculos[]=$registro;
        }
          $this->cierreBd();
          return $listadoRegistrosVehiculos;
    }

    public function seleccionarID($sId){

        $consulta = "SELECT * FROM vehiculos WHERE vehId=?; ";

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
            $consulta = "INSERT INTO vehiculos (vehId,vehNumero_Placa,vehColor,vehMarca,vehEstado,vehUsuSesion,vehCreated_At,
            vehUpdated_At,Empleados_empId,Tickets_ticId) VALUES (:vehId,:vehNumero_Placa,:vehColor,:vehMarca,:vehEstado,:vehUsuSesion,:vehCreated_At,
            :vehUpdated_At,:Empleados_empId,:Tickets_ticId);";

            $insertar = $this->conexion->prepare($consulta);

            $insertar -> bindParam(":vehId", $registro['vehId']);
            $insertar -> bindParam(":vehNumero_Placa", $registro['vehNumero_Placa']);
            $insertar -> bindParam(":vehColor", $registro['vehColor']);
            $insertar -> bindParam(":vehMarca", $registro['vehMarca']);
            $insertar -> bindParam(":vehEstado", $registro['vehEstado']);
            $insertar -> bindParam(":vehUsuSesion", $registro['vehUsuSesion']);
            $insertar -> bindParam(":vehCreated_At", $registro['vehCreated_At']);
            $insertar -> bindParam(":vehUpdated_At", $registro['vehUpdated_At']);
            $insertar -> bindParam(":Empleados_empId", $registro['Empleados_empId']);
            $insertar -> bindParam(":Tickets_ticId", $registro['Tickets_ticId']);
        

            $insercion = $insertar->execute();

            $clavePrimaria = $this->conexion->lastInsertId();

            return ['Inserto'=>1,'resultado'=>$clavePrimaria];

            $this->cierreBd();

        }  
          catch(Exception $e){return $e;}
        

    }

    public function actualizar($registro){
        try{
            $vehNumero_Placa = $registro[0]['vehNumero_Placa'];
            $vehColor = $registro[0]['vehColor'];
            $vehMarca = $registro[0]['vehMarca'];
            $vehId = $registro[0]['vehId'];	
			
			
			if(isset($isbn)){
				
                $actualizar = "UPDATE vehiculos SET vehNumero_Placa= ? , ";
                $actualizar .= " vehColor = ? , ";
                $actualizar .= " vehMarca = ? , ";
                $actualizar .= " WHERE vehId= ? ; ";
				
				$actualizacion = $this->conexion->prepare($actualizar);
				
				$resultadoAct=$actualizacion->execute(array($vehNumero_Placa,$vehColor,$vehMarca,$vehId));
				
				        $this->cierreBd();
						
                return ['actualizacion' => $resultadoAct, 'mensaje' => "Actualización realizada."];				
				
			}


        } catch (PDOException $pdoExc) {
			$this->cierreBd();
            return ['actualizacion' => $resultadoAct, 'mensaje' => $pdoExc];
        
        }
    }

    
    public function eliminar($sId = array()){
        $consulta = "DELETE FROM vehiculos WHERE vehId = :vehId;";

        $eliminar = $this->conexion->prepare($consulta);
        $eliminar->bindParam(':vehId', $sId[0],PDO::PARAM_INT);
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
                $actualizar = "UPDATE vehiculos SET vehEstado = ? WHERE vehId = ?";
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
                $actualizar = "UPDATE vehiculos SET VehEstado = ? WHERE vehId = ?";
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