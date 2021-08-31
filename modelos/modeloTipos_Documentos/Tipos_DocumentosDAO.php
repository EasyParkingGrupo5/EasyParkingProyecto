<?php

include_once PATH . 'modelos/ConBdMysql.php';

class TiposDocumentosDAO extends ConDbMySql{
    public function __construct($servidor, $base, $loginDB, $passwordDB){
        parent::__construct($servidor, $base, $loginDB, $passwordDB);  
    }
    
    public function seleccionarTodos(){
        $planconsulta = "SELECT * FROM tipos_documentos;";

        $registroTiposDocumentos = $this->conexion->prepare($planconsulta);
        $registroTiposDocumentos->execute();

        $listadoRegistrosTiposDocumentos = array();

        while( $registro = $registroTiposDocumentos->fetch(PDO::FETCH_OBJ)){
            $listadoRegistrosTiposDocumentos[]=$registro;
        }
          $this->cierreBd();
          return $listadoRegistrosTiposDocumentos;
    }

    public function seleccionarID($sId){
    
        $consulta = "SELECT * FROM tipos_documentos WHERE tipDocId = ?;";

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
            $consulta = "INSERT INTO tipos_documentos (tipDocSigla, tipDocNombre_documento, tipDocEstado)
             VALUES (:tipDocSigla, :tipDocNombre_documento, :tipDocEstado);";

            $insertar = $this->conexion->prepare($consulta);

            $insertar -> bindParam(":tipDocEstado", $registro['tipDocEstado']);
            $insertar -> bindParam(":tipDocSigla", $registro['tipDocSigla']);
            $insertar -> bindParam(":tipDocNombre_documento", $registro['tipDocNombre_documento']);

            $insercion = $insertar->execute();

            $clavePrimaria = $this->conexion->lastInsertId();

            $this->cierreBd();
            return ['Inserto'=>1,'resultado'=>$clavePrimaria];

        } catch (PDOException $pdoExc) {
            return ['Inserto'=>0,$pdoExc->errorInfo[2]];
        }
    }

    public function actualizar($registro){
        try {
            $sigla = $registro[0]['tipDocSigla'];
            $tipoDocumento = $registro[0]['tipDocNombre_documento'];
            $idDocumento = $registro[0]['tipDocId'];

            if(isset($idDocumento)){
                $consulta = "UPDATE tipos_documentos SET tipDocSigla = ?, tipDocNombre_documento = ?
                WHERE tipDocId = ?";
                
                $actualizar = $this -> conexion -> prepare($consulta);

                $actualizacion = $actualizar -> execute(array($sigla, $tipoDocumento, $idDocumento));

                $this->cierreBd();

                return ['actualizacion' => $actualizacion, 'mensaje' => 'Resgistro Actualizado'];
            }

        } catch (PDOException $pdoExc) {
            return ['actualizacion' => $actualizacion, 'mensaje' => $pdoExc];
        }
    }

    public function eliminar($sId = array()){
        $consulta = "DELETE FROM tipos_documentos WHERE tipDocId = :tipDocId";

        $eliminar = $this->conexion->prepare($consulta);
        $eliminar->bindParam(':tipDocId', $sId[0],PDO::PARAM_INT);
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
                $actualizar = "UPDATE tipos_documentos SET tipDocEstado = ? WHERE tipDocId = ?";
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
                $actualizar = "UPDATE tipos_documentos SET tipDocEstado = ? WHERE tipDocId = ?";
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