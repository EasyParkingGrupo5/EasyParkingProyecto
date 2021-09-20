<?php

include_once 'modelos/ConBdMysql.php';

class VehiculosDAO extends ConDbMySql{
    public function __construct($servidor, $base, $loginDB, $passwordDB){
        parent::__construct($servidor, $base, $loginDB, $passwordDB);  
    }
    
    public function seleccionarTodos($estado){
        $planconsulta = "SELECT * FROM vehiculos v  JOIN empleados e on e.empId=v.Empleados_empId WHERE vehEstado= :vehEstado;";

        $registroVehiculos = $this->conexion->prepare($planconsulta);
        $registroVehiculos -> bindParam(":vehEstado", $estado);
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

    public function seleccionarPlaca($sId){

            $consulta = "SELECT * FROM vehiculos veh WHERE veh.vehNumero_Placa = ?; ";
            $listar = $this->conexion->prepare($consulta);
            $listar -> execute(array($sId[0]));
    
            $registroEnco = array();
    
            while( $registro = $listar->fetch(PDO::FETCH_OBJ)){
                $registroEnco[]=$registro;
            }
              
            if(isset($registroEnco[0]->vehId) && $registroEnco[0]->vehId != FALSE){
                return ['exitoSeleccionPlaca' => 1, 'registroEncontrado' => $registroEnco];
            }else{
                return ['exitoSeleccionPlaca' => 0, 'registroEncontrado' => $registroEnco];
            }
    

    }

    public function insertar($registro){
        try {
            $consulta = "INSERT INTO vehiculos (vehNumero_Placa,vehColor,vehMarca, Empleados_empId) 
            VALUES (:vehNumero_Placa,:vehColor,:vehMarca, :Empleados_empId);";

            $insertar = $this->conexion->prepare($consulta);

            $insertar -> bindParam(":vehNumero_Placa", $registro['vehNumero_Placa']);
            $insertar -> bindParam(":vehColor", $registro['vehColor']);
            $insertar -> bindParam(":vehMarca", $registro['vehMarca']);
            $insertar -> bindParam(":Empleados_empId", $registro['Empleados_empId']);
        

            $insercion = $insertar->execute();

            $clavePrimaria = $this->conexion->lastInsertId();

            return ['Inserto'=>true,'resultado'=>$clavePrimaria];

            $this->cierreBd();

        } catch (PDOException $pdoExc) {
            return ['Inserto'=>false,$pdoExc->errorInfo[2]];
        }
        

    }

    public function actualizar($registro){

        try {

            $placa = $registro[0]['vehNumero_Placa'];
            $color = $registro[0]['vehColor'];
            $marca = $registro[0]['vehMarca'];
            $vehId = $registro[0]['vehId'];

            if(isset($vehId)){

            $consulta = "UPDATE vehiculos " ;
            $consulta.=" SET vehNumero_Placa = ?,";
            $consulta.=" vehColor = ?,";
            $consulta.=" vehMarca = ? ";
            $consulta.= "WHERE vehId = ?;";

            $actualizar = $this -> conexion -> prepare($consulta);

            $actualizacion = $actualizar -> execute(array($placa, $color, $marca, $vehId));

            $this->cierreBd();

            return ['actualizacion' => $actualizacion, 'mensaje' => 'Resgistro Actualizado'];
        }
    } catch (PDOException $pdoExc) {
        return ['actualizacion' => $actualizacion, 'mensaje' => $pdoExc];
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