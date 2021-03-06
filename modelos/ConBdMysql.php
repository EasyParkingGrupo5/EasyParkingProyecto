<?php

/*abstract*/ class ConDbMySql{
    private $servidor;
    private $base;
    protected $conexion;

    public function __construct ($servidor, $base, $loginDB, $passwordDB){
        $this->servidor = $servidor;
        $this->base = $base;

        try {
            $options = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\'');
            $dsn = "mysql:dbname=".$this->base.";host=".$this->servidor;

            $this->conexion = new PDO($dsn, $loginDB, $passwordDB, $options);

            $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            //echo "Conexión exitosa";
        } catch (Exception $ex) {
            echo "Error de Conexión".$ex->getMessage();
        }
    }

    public function cierreBd(){
        $this->conexion=NULL;
    }
}


?>