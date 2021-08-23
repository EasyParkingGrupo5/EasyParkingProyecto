<?php

include_once PATH . 'modelos/ConBdMysql.php';

class RolDAO extends ConDbMySql{
    public function __construct($servidor, $base, $loginDB, $passwordDB){
        parent::__construct($servidor, $base, $usuario_db, $contrasenia_db);  
    }
    
    public function seleccionarTodos(){
        $planconsulta = "SELECT * FROM rol;";

        $registroRol = $this->conexion->prepare($planconsulta);
        $registroRol->execute();

        $listadoRegistrosRol = array();

        while( $registro = $registroRol->fetch(PDO::FETCH_OBJ)){
            $listadoRegistrosRol[]=$registro;
        }
          $this->cierreBd();
          return $listadoRegistrosRol;
    }

    public function seleccionarID($sId){

        $consulta="select * FROM rol WHERE rolId=?";

        $lista=$this->conexion->prepare($consulta);
        $lista->execute(array($sId[0]));

        $registroEnco = array();

        while( $registro = $lista->fetch(PDO::FETCH_OBJ)){
            $registroEnco[]=$registro;
        }
          $this->cierreBd();
          
        if(!empty($registroEnco)){
            return ['exitoSeleccionId' => true, 'registroEncontrado' => $registroEnco];
        }else{
            return ['exitosaSeleccionId' => false, 'registroEncontrado' => $registroEnco];
        }

    }

    public function insertar($registro){

        try {
            
            $consulta="INSERT INTO rol (rolId, rolNombre, rolDescripcion, rolEstado, rolUsuSesion, rol_created_at, rol_updated_at) VALUES (:rolId, :rolNombre, :rolDescripcion, :rolEstado, :rolUsuSesion, :rol_created_at, :rol_updated_at)" ;

            $insertar=$this->conexion->prepare($consulta);

            $insertar -> bindParam(":rolId", $registro['rolId']);
            $insertar -> bindParam(":rolNombre", $registro['rolNombre']);
            $insertar -> bindParam(":rolDescripcion", $registro['rolDescripcion']);
            $insertar -> bindParam(":rolEstado", $registro['rolEstado']);
            $insertar -> bindParam(":rolUsuSesion", $registro['rolUsuSesion']);
            $insertar -> bindParam(":rol_created_at", $registro['rol_created_at']);
            $insertar -> bindParam(":rol_updated_at", $registro['rol_updated_at']);

            $insercion = $insertar->execute();

            $clavePrimaria = $this->conexion->lastInsertId();

            return ['Inserto'=>1,'resultado'=>$clavePrimaria];

        } catch (PDOException $pdoExc) {
            return ['Inserto'=>0,$pdoExc->errorInfo[2]];
        }

    }

    public function actualizar($registro){

        try {
            $consulta = "UPDATE rol SET  rolNombre = :rolNombre, rolDescripcion = :rolDescripcion, 
            rolEstado = :rolEstado, rolUsuSesion = :rolUsuSesion, rol_created_at = :rol_created_at,
            rol_updated_at = :rol_updated_at WHERE rolId = :rolId";
            
            $actualizar = $this -> conexion -> prepare($consulta);

            $actualizar -> bindParam(":rol_updated_at", $registro['rol_updated_at']);
            $actualizar -> bindParam(":rolNombre", $registro['rolNombre']);
            $actualizar -> bindParam(":rolDescripcion", $registro['rolDescripcion']);
            $actualizar -> bindParam(":rolEstado", $registro['rolEstado']);
            $actualizar -> bindParam(":rolUsuSesion", $registro['rolUsuSesion']);
            $actualizar -> bindParam(":rol_created_at", $registro['rol_created_at']);
            $actualizar -> bindParam(":rolId", $registro['rolId']);

            $actualizacion = $actualizar->execute();

            $this->cierreBd();

            return ['actualizacion' => $actualizacion, 'mensaje' => 'Resgistro Actualizado'];

        } catch (PDOException $pdoExc) {
            return ['actualizacion' => $actualizacion, 'mensaje' => $pdoExc];
        }
        
    }

    public function eliminar($sId = array()){

        $consulta = "DELETE FROM rol WHERE rolId = :rolId;";

        $eliminar = $this->conexion->prepare($consulta);
        $eliminar->bindParam(':rolId', $sId[0],PDO::PARAM_INT);
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
            $Estado = 1;

            if(isset($sId[0])){
                $actualizar = "UPDATE rol SET rolEstado = ? WHERE rolId = ?";
                $actualizar = $this->conexion->prepare($actualizar);
                $actualizar = $actualizar->execute(array($Estado, $sId[0]));
                return ['actualizacion' => $actualizar, 'mensaje' => 'Resgistro Activado'];
            }
        } catch (PDOException $pdoExc) {
            return ['actualizacion' => $actualizar, $pdoExc->errorInfo[2]];
        }
    }

    public function eliminarLogico($sId = array()){

        try {
            $Estado = 0;

            if(isset($sId[0])){
                $actualizar = "UPDATE rol SET rolEstado = ? WHERE rolId = ?";
                $actualizacion = $this->conexion->prepare($actualizar);
                $actualizacion = $actualizacion->execute(array($Estado, $sId[0]));
                return ['actualizacion' => $actualizacion, 'mensaje' => 'Resgistro Desactivado'];
            }
        } catch (PDOException $pdoExc) {
            return ['actualizacion' => $actualizacion, 'mensaje' => $pdoExc];
        }
        
    }

    }

?>