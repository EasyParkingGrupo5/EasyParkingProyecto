<?php

include_once PATH . 'modelos/ConBdMysql.php';

class UsuarioRolesDAO extends ConDbMySql{
    public function __construct($servidor, $base, $loginDB, $passwordDB){
        parent::__construct($servidor, $base, $loginDB, $passwordDB);  
    }
    
    public function seleccionarTodos(){
        $planconsulta = "SELECT usu.estado, usu.fechaUserRol, 
        usu.obsFechaUserRol, usu.usuRolUsuSesion, usu.created_at, 
        usu.updated_at, usus.usuId, usus.usuLogin,rol.rolId, rol.rolNombre FROM 
        usuario_s_roles usu JOIN usuario_s usus ON usu.id_usuario_s = 
        usus.usuId JOIN rol ON usu.id_rol = rol.rolId;
        ";

        $registroUsuarioRol = $this->conexion->prepare($planconsulta);
        $registroUsuarioRol->execute();

        $listadoRegistrosUsuarioRol = array();

        while( $registro = $registroUsuarioRol->fetch(PDO::FETCH_OBJ)){
            $listadoRegistrosUsuarioRol[]=$registro;
        }
          $this->cierreBd();
          return $listadoRegistrosUsuarioRol;
    }

    public function seleccionarID($sId){

        $consulta="select * FROM usuario_s_roles WHERE id_usuario_s=?";

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
            
            $consulta="INSERT INTO usuario_s_roles (id_rol, id_usuario_s) VALUES (:id_rol, :id_usuario_s)" ;

            $insertar=$this->conexion->prepare($consulta);

            $insertar -> bindParam(":id_rol", $registro[1]);
            $insertar -> bindParam(":id_usuario_s", $registro[0]);

            $insertar =$insertar->execute();

            $clavePrimaria = $this->conexion->lastInsertId();

            return ['Inserto'=>1,'resultado'=>$clavePrimaria];

        } catch (PDOException $pdoExc) {
            return ['Inserto'=>0,$pdoExc->errorInfo[2]];
        }

    }

    public function actualizar($registro){

        try {
            $consulta = "UPDATE usuario_s_roles SET id_rol = :id_rol, 
            estado = :estado, fechaUserRol = :fechaUserRol, obsFechaUserRol = :obsFechaUserRol,
            usuRolUsuSesion = :usuRolUsuSesion, created_at = :created_at,
            updated_at = :updated_at WHERE id_usuario_s = :id_usuario_s";
            
            $actualizar = $this -> conexion -> prepare($consulta);

            $actualizar -> bindParam(":id_rol", $registro['id_rol']);
            $actualizar -> bindParam(":estado", $registro['estado']);
            $actualizar -> bindParam(":fechaUserRol", $registro['fechaUserRol']);
            $actualizar -> bindParam(":obsFechaUserRol", $registro['obsFechaUserRol']);
            $actualizar -> bindParam(":usuRolUsuSesion", $registro['usuRolUsuSesion']);
            $actualizar -> bindParam(":created_at", $registro['created_at']);
            $actualizar -> bindParam(":updated_at", $registro['updated_at']);
            $actualizar -> bindParam(":id_usuario_s", $registro['id_usuario_s']);

            $actualizacion = $actualizar->execute();

            $this->cierreBd();

            return ['actualizacion' => $actualizacion, 'mensaje' => 'Resgistro Actualizado'];

        } catch (PDOException $pdoExc) {
            return ['actualizacion' => $actualizacion, 'mensaje' => $pdoExc];
        }
        
    }

    public function eliminar($sId = array()){

        $consulta = "DELETE FROM usuario_s_roles WHERE id_usuario_s = :id_usuario_s;";

        $eliminar = $this->conexion->prepare($consulta);
        $eliminar->bindParam(':id_usuario_s', $sId[0],PDO::PARAM_INT);
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
                $actualizar = "UPDATE usuario_s_roles SET estado = ? WHERE id_usuario_s = ?";
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
                $actualizar = "UPDATE usuario_s_roles SET estado = ? WHERE id_usuario_s = ?";
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