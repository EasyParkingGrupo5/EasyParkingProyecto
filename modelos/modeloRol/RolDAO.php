<?php

include_once PATH . 'modelos/ConBdMysql.php';

class RolDAO extends ConDbMySql{
    public function __construct($servidor, $base, $loginDB, $passwordDB){
        parent::__construct($servidor, $base, $loginDB, $passwordDB);  
    }

    public function seleccionarRolPorPersona($sId){
        
        $consulta="SELECT rolId, rolNombre, rolDescripcion FROM rol JOIN 
        usuario_s_roles usr on usr.id_rol = rol.rolId JOIN usuario_s usu on usu.usuId = usr.id_usuario_s 
        RIGHT JOIN empleados emp on emp.empId = usr.id_usuario_s WHERE emp.empNumeroDocumento = ?";

        $lista=$this->conexion->prepare($consulta);
        $lista->execute(array($sId[0]));

        $registroEnco = array();

        while( $registro = $lista->fetch(PDO::FETCH_OBJ)){
            $registroEnco[]=$registro;
        }
        if (isset($registroEnco[0]->usuId) && $registroEnco[0]->usuId != FALSE) {
            return ['exitoSeleccionId' => 1, 'registroEncontrado' => $registroEnco];
        } else {
            return ['exitoSeleccionId' => 0, 'registroEncontrado' => $registroEnco];
        }
    }
    
    public function seleccionarTodos($estado){
        $planconsulta = "SELECT * FROM rol where rolEstado = :rolEstado;";

        $registroRol = $this->conexion->prepare($planconsulta);
        $registroRol -> bindParam(":rolEstado", $estado);
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
          
        if(!empty($registroEnco)){
            return ['exitoSeleccionId' => true, 'registroEncontrado' => $registroEnco];
        }else{
            return ['exitosaSeleccionId' => false, 'registroEncontrado' => $registroEnco];
        }

    }

    public function insertar($registro){

        try {
            
            $consulta="INSERT INTO rol (rolNombre, rolDescripcion) VALUES (:rolNombre, :rolDescripcion)" ;

            $insertar=$this->conexion->prepare($consulta);

            $insertar -> bindParam(":rolNombre", $registro['rolNombre']);
            $insertar -> bindParam(":rolDescripcion", $registro['rolDescripcion']);

            $insercion = $insertar->execute();

            $clavePrimaria = $this->conexion->lastInsertId();

            return ['Inserto'=>1,'resultado'=>$clavePrimaria];

        } catch (PDOException $pdoExc) {
            return ['Inserto'=>0,$pdoExc->errorInfo[2]];
        }

    }

    public function actualizar($registro){

        try {

            $nombre = $registro[0]['rolNombre'];
            $descripcion = $registro[0]['rolDescripcion'];
            $rolId = $registro[0]['rolId'];
            
            if(isset($rolId)){
                $consulta = "UPDATE rol SET  rolNombre = ?, rolDescripcion = ?
                WHERE rolId = ?";
                
                $actualizar = $this -> conexion -> prepare($consulta);

                $actualizacion = $actualizar->execute(array($nombre, $descripcion, $rolId));

                $this->cierreBd();

                return ['actualizacion' => $actualizacion, 'mensaje' => 'Resgistro Actualizado'];
            }
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