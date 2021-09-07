<?php

include_once 'modelos/ConBdMysql.php';

class VehiculosDAO extends ConDbMySql{
    public function __construct($servidor, $base, $loginDB, $passwordDB){
        parent::__construct($servidor, $base, $loginDB, $passwordDB);  
    }
    
    public function seleccionarTodos($estado){
        $planconsulta = "SELECT * FROM vehiculos v JOIN tickets t on v.Tickets_ticId=t.ticId JOIN empleados e on e.empId=v.Empleados_empId WHERE vehEstado= :vehEstado;";

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

    public function insertar($registro){
        try {
            $consulta = "INSERT INTO vehiculos (vehNumero_Placa,vehColor,vehMarca, Empleados_empId, Tickets_ticId) 
            VALUES (:vehNumero_Placa,:vehColor,:vehMarca, :Empleados_empId,:Tickets_ticId);";

            $insertar = $this->conexion->prepare($consulta);

            $insertar -> bindParam(":vehNumero_Placa", $registro['vehNumero_Placa']);
            $insertar -> bindParam(":vehColor", $registro['vehColor']);
            $insertar -> bindParam(":vehMarca", $registro['vehMarca']);
            $insertar -> bindParam(":Empleados_empId", $registro['Empleados_empId']);
            $insertar -> bindParam(":Tickets_ticId", $registro['Tickets_ticId']);
        

            $insercion = $insertar->execute();

            $clavePrimaria = $this->conexion->lastInsertId();

            return ['Inserto'=>true,'resultado'=>$clavePrimaria];

            $this->cierreBd();

        } catch (PDOException $pdoExc) {
            return ['Inserto'=>false,$pdoExc->errorInfo[2]];
        }
        

    }

    public function actualizar($registro){
           //print_r($registro);

        //exit();

        try {

            $placa = $registro[0]['vehNumero_Placa'];
            $color = $registro[0]['vehColor'];
            $marca = $registro[0]['vehMarca'];
            $vehId = $registro[0]['vehId'];
            $empleados = $registro[0]['Empleados_empId'];
            $tarifas = $registro[0]['Tickets_ticId'];

            if(isset($vehId)){

            $consulta = "UPDATE vehiculos " ;
            $consulta.=" SET vehNumero_Placa = ?,";
            $consulta.=" vehColor = ?,";
            $consulta.=" vehMarca = ?, ";
            $consulta.=" Tickets_ticId = ?, ";
            $consulta.=" Empleados_empId = ? ";
            $consulta.= "WHERE vehId = ?;";

            //echo $placa."   ".$color."   ".$marca."   ".$vehId."   ".$empleados."   ".$tarifas;


            //echo "<br>";
            //echo $consulta;

            //exit();

            $actualizar = $this -> conexion -> prepare($consulta);

            $actualizacion = $actualizar -> execute(array($placa, $color, $marca, $tarifas, $empleados, $vehId));

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