<?php

include_once PATH . 'modelos/ConBdMysql.php';

class TarifasDAO extends ConDbMySql{
    public function __construct($servidor, $base, $loginDB, $passwordDB){
        parent::__construct($servidor, $base, $loginDB, $passwordDB);  
    }
    
    public function seleccionarTodos(){
        $planconsulta = "select * from tarifas;";

        $registroTarifas = $this->conexion->prepare($planconsulta);
        $registroTarifas->execute();

        $listadoRegistrosTarifas = array();

        while( $registro = $registroTarifas->fetch(PDO::FETCH_OBJ)){
            $listadoRegistrosTarifas[]=$registro;
        }
          $this->cierreBd();
          return $listadoRegistrosTarifas;
    }

    public function seleccionarID($sId){
        $consulta = "SELECT * FROM tarifas WHERE tarifas.tarId = ?;";

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
            $consulta = "INSERT INTO tarifas (tarTipoVehiculo,tarValorTarifa,tarEstado)
             VALUES (:tarTipoVehiculo, :tarValorTarifa, :tarEstado);";

            $insertar = $this->conexion->prepare($consulta);

            $insertar -> bindParam(":tarTipoVehiculo", $registro['tarTipoVehiculo']);
            $insertar -> bindParam(":tarValorTarifa", $registro['tarValorTarifa']);
            $insertar -> bindParam(":tarEstado", $registro['tarEstado']);

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
            $consulta = "UPDATE tarifas SET tarTipoVehiculo = :tarTipoVehiculo, 
            tarValorTarifa = :tarValorTarifa WHERE tarId = :tarId;";
            
            $actualizar = $this -> conexion -> prepare($consulta);

            $actualizar -> bindParam(":tarTipoVehiculo", $registro['tarTipoVehiculo']);
            $actualizar -> bindParam(":tarValorTarifa", $registro['tarValorTarifa']);
            $actualizar -> bindParam(":tarId", $registro['tarId']);

            $actualizacion = $actualizar -> execute();

            $this->cierreBd();

            return ['actualizacion' => $actualizacion, 'mensaje' => 'Resgistro Actualizado'];

        } catch (PDOException $pdoExc) {
            return ['actualizacion' => $actualizacion, 'mensaje' => $pdoExc];
        }
    }

    public function eliminar($sId = array()){
        try{
        $consulta = "DELETE FROM tarifas WHERE tarId = :tarId";

        $eliminar = $this->conexion->prepare($consulta);
        $eliminar->bindParam(':tarId', $sId[0],PDO::PARAM_INT);
        $resultado = $eliminar->execute();
        print_r($resultado);
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
                $actualizar = "UPDATE tarifas SET tarEstado = ? WHERE tarId = ?;";
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
                $actualizar = "UPDATE tarifas SET tarEstado = ? WHERE tarId = ?;";
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