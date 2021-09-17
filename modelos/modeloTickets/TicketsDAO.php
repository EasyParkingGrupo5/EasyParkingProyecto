<?php

include_once PATH . 'modelos/ConBdMysql.php';

class TicketsDAO extends ConDbMySql{
    public function __construct($servidor, $base, $loginDB, $passwordDB){
        parent::__construct($servidor, $base, $loginDB, $passwordDB);  
    }
    
    public function seleccionarTodos($estado){
        $planconsulta = "SELECT * FROM tickets t JOIN tarifas ta ON ta.tarId=t.Tarifas_tarId JOIN vehiculos veh 
        ON t.Vehiculos_vehId=veh.vehId WHERE t.ticEstado=:ticEstado";

        $registroTickets = $this->conexion->prepare($planconsulta);
        $registroTickets->bindParam(':ticEstado',$estado);
        $registroTickets->execute();

        $listadoRegistrosTickets = array();

        while( $registro = $registroTickets->fetch(PDO::FETCH_OBJ)){
            $listadoRegistrosTickets[]=$registro;
        }
          $this->cierreBd();
          return $listadoRegistrosTickets;
    }

    public function seleccionarID($sId){

        $consulta = "SELECT * FROM tickets WHERE ticNumero=?; ";

        $listar = $this->conexion->prepare($consulta);
        $listar->execute(array($sId[0]));

        $registroEncontrado = array();

        while( $registro = $listar->fetch(PDO::FETCH_OBJ)){
            $registroEncontrado[]=$registro;
        }
          
        if(!empty($registroEncontrado)){
            return ['exitoSeleccionId' => true, 'registroEncontrado' => $registroEncontrado];
        }else{
            return ['exitoSeleccionId' => false, 'registroEncontrado' => $registroEncontrado];  

    }
}

    public function insertar($registro){ 

        try {
            $consulta = "INSERT INTO tickets (ticFecha,ticHoraIngreso,
            Empleados_empId,Tarifas_tarId, Vehiculos_vehId) VALUES (:ticFecha,
            :ticHoraIngreso,:Empleados_empId,:Tarifas_tarId, :Vehiculos_vehId);";

            $insertar = $this->conexion->prepare($consulta);

            $insertar -> bindParam(":ticFecha", $registro['ticFecha']);
            $insertar -> bindParam(":ticHoraIngreso", $registro['ticHoraIngreso']);
            $insertar -> bindParam(":Empleados_empId", $registro['Empleados_empId']);
            $insertar -> bindParam(":Tarifas_tarId", $registro['Tarifas_tarId']);
            $insertar -> bindParam(":Vehiculos_vehId", $registro['Vehiculos_vehId']);

            $insercion = $insertar->execute();

            $clavePrimaria = $this->conexion->lastInsertId();

            return ['Inserto'=>1,'resultado'=>$clavePrimaria];

            $this->cierreBd();

        } catch (PDOException $pdoExc) {
            return ['Inserto'=>0,$pdoExc->errorInfo[2]];
        }
    }

    

    public function actualizarValorTotal($registro){
        try{
            $ticNumero = $registro[0]['ticNumero'];
            $ticValorFinal = $registro[0]['ticValorFinal'];
			
			
			if(isset($ticNumero)){
				
                $actualizar = "UPDATE tickets SET ticValorFinal = ?  WHERE ticNumero= ? ; ";
				
				$actualizacion = $this->conexion->prepare($actualizar);
				
				$resultadoAct=$actualizacion->execute(array($ticValorFinal,$ticNumero));
				
				        $this->cierreBd();
						
                return ['actualizacion' => $resultadoAct, 'mensaje' => "Actualización realizada."];				
				
			}


        } catch (PDOException $pdoExc) {
			$this->cierreBd();
            return ['actualizacion' => $resultadoAct, 'mensaje' => $pdoExc];
        }
    
        
    }

    public function actualizarValorFinal($registro){
        try{
            $ticNumero = $registro[0]['ticNumero'];
            $ticHoraSalida = $registro[0]['ticHoraSalida'];
			
			if(isset($ticNumero)){
				
                $actualizar = "UPDATE tickets SET ticHoraSalida = ? WHERE ticNumero= ? ; ";
				
				$actualizacion = $this->conexion->prepare($actualizar);
				
				$resultadoAct=$actualizacion->execute(array($ticHoraSalida, $ticNumero));
				
						
                return ['actualizacion' => $resultadoAct];				
				
			}


        } catch (PDOException $pdoExc) {
			$this->cierreBd();
            return ['actualizacion' => $resultadoAct, 'mensaje' => $pdoExc];
        }
    
        
    }



    
    public function eliminar($sId = array()){
        $consulta = "DELETE FROM tickets WHERE ticId = :ticId;";

        $eliminar = $this->conexion->prepare($consulta);
        $eliminar->bindParam(':ticId', $sId[0],PDO::PARAM_INT);
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
                $actualizar = "UPDATE tickets SET ticEstado = ? WHERE ticId = ?";
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
                $actualizar = "UPDATE tickets SET ticEstado = ? WHERE ticNumero = ?";
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