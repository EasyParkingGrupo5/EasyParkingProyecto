<?php

include_once PATH . 'modelos/ConBdMysql.php';

class TicketsDAO extends ConDbMySql{
    public function __construct($servidor, $base, $loginDB, $passwordDB){
        parent::__construct($servidor, $base, $loginDB, $passwordDB);  
    }
    
    public function seleccionarTodos(){
        $planconsulta = "select tic.ticId, tic.ticNumero, tic.ticFecha, tic.ticHoraIngreso, tic.ticHoraSalida, tic.ticValorFinal, 
        tic.ticEstado, tic.tic_created_at, tic.tic_updated_at, tic.ticUsuSesion,emp.empId, 			
        emp.empNumeroDocumento, tar.tarTipoVehiculo, tar.tarValorTarifa 
        from tickets tic JOIN empleados emp ON tic.Empleados_empId=emp.empId 
        JOIN tarifas tar on tic.Tarifas_tarId=tar.tarId;";

        $registroTickets = $this->conexion->prepare($planconsulta);
        $registroTickets->execute();

        $listadoRegistrosTickets = array();

        while( $registro = $registroTickets->fetch(PDO::FETCH_OBJ)){
            $listadoRegistrosTickets[]=$registro;
        }
          $this->cierreBd();
          return $listadoRegistrosTickets;
    }

    public function seleccionarID($sId){

        $consulta = "SELECT * FROM tickets WHERE ticId=?; ";

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
            $consulta = "INSERT INTO tickets (ticId, ticNumero, ticFecha, ticHoraIngreso, ticHoraSalida, ticValorFinal, 
            ticEstado,tic_created_at,tic_updated_at, ticUsuSesion,Empleados_empId, 			
            Tarifas_tarId) VALUES (:ticId, :ticNumero , :ticFecha,
            :ticHoraIngreso , :ticHoraSalida , :ticValorFinal ,:ticEstado,:tic_created_at,:tic_updated_at,:ticUsuSesion,
            :Empleados_empId,:Tarifas_tarId);";

            $insertar = $this->conexion->prepare($consulta);

            $insertar -> bindParam(":ticId", $registro['ticId']);
            $insertar -> bindParam(":ticNumero", $registro['ticNumero']);
            $insertar -> bindParam(":ticFecha", $registro['ticFecha']);
            $insertar -> bindParam(":ticHoraIngreso", $registro['ticHoraIngreso']);
            $insertar -> bindParam(":ticHoraSalida", $registro['ticHoraSalida']);
            $insertar -> bindParam(":ticValorFinal", $registro['ticValorFinal']);
            $insertar -> bindParam(":ticEstado", $registro['ticEstado']);
            $insertar -> bindParam(":tic_created_at", $registro['tic_created_at']);
            $insertar -> bindParam(":tic_updated_at", $registro['tic_updated_at']);
            $insertar -> bindParam(":ticUsuSesion", $registro['ticUsuSesion']);
            $insertar -> bindParam(":Empleados_empId", $registro['Empleados_empId']);
            $insertar -> bindParam(":Tarifas_tarId", $registro['Tarifas_tarId']);



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
            $ticNumero = $registro[0]['ticNumero'];
            $ticFecha = $registro[0]['ticFecha'];
            $ticHoraIngreso = $registro[0]['ticHoraIngreso'];
            $ticHoraSalida = $registro[0]['ticHoraSalida'];
            $ticValorFinal = $registro[0]['ticValorFinal'];
            $empleados_empId = $registro[0]['Empleados_empId'];
            $tarifas_tarId = $registro[0]['Tarifas_tarId'];
            $ticId = $registro[0]['ticId'];	
			
			
			if(isset($ticId)){
				
                $actualizar = "UPDATE tickets SET ticNumero= ? , ";
                $actualizar .= " ticFecha = ? , ";
                $actualizar .= " ticHoraIngreso = ? , ";
                $actualizar .= " ticHoraSalida = ?, ";
                $actualizar .= " ticValorFinal = ?, ";
                $actualizar .= " Empleados_empId = ?, ";
                $actualizar .= " Tarifas_tarId = ? ";
                $actualizar .= " WHERE ticId= ? ; ";
				
				$actualizacion = $this->conexion->prepare($actualizar);
				
				$resultadoAct=$actualizacion->execute(array($ticNumero,$ticFecha,$ticHoraIngreso,$ticHoraSalida, 
                $ticValorFinal,$empleados_empId,$tarifas_tarId,$ticId));
				
				        $this->cierreBd();
						
                return ['actualizacion' => $resultadoAct, 'mensaje' => "Actualización realizada."];				
				
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
                $actualizar = "UPDATE tickets SET ticEstado = ? WHERE ticId = ?";
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