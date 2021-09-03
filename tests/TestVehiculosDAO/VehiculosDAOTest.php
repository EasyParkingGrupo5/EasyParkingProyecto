<?php

use PHPUnit\Framework\TestCase;
require_once 'modelos/modeloVehiculos/VehiculosDAO.php';
require_once 'modelos/ConstantesConexion.php';

final class VehiculosDAOTest extends TestCase{
    public function testSeleccionarTodos(){
        $vehiculos = new VehiculosDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);
        $esperado = $vehiculos -> seleccionarTodos();

        $this -> assertEmpty(!$esperado);
    }

    public function testSeleccionarID(){
        $sId=array(1);
        $vehiculos = new VehiculosDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);
        $seleccionar = $vehiculos -> seleccionarID($sId);
        $esperado = $seleccionar['exitoSeleccionId'];

        $this -> assertTrue($esperado);
    }

    public function testInsertar(){
        $registro['vehId']=6;
        $registro['vehNumero_Placa']="ABD364";
        $registro['vehColor']="Verde";
        $registro['vehMarca']="Toyota";
        $registro['Empleados_empId']=3;
        $registro['Tickets_ticId']=4;

        $vehiculos = new VehiculosDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);
        $insertar = $vehiculos -> insertar($registro);
        $esperado = $insertar['Inserto'];

        $this -> assertTrue($esperado);
    }

    public function testActualizar(){
        $registro['vehId']=1;
        $registro['vehNumero_Placa']="ASB207";
        $registro['vehColor']="Amarillo";
        $registro['vehMarca']="Mazda";

        $vehiculos = new VehiculosDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);
        $actualizar = $vehiculos -> actualizar($registro);
        $esperado = $actualizar['actualizacion'];

        $this -> assertTrue($esperado);
    }

    public function testEliminar(){
        $sId = array(6);
        $vehiculos = new VehiculosDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);
        $eliminar = $vehiculos -> eliminar($sId);
        $esperado = $eliminar['eliminado'];

        $this -> assertTrue($esperado);
    }

    public function testHabilitar(){
        $sId = array(1);
        $vehiculos = new VehiculosDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);
        $habilitar = $vehiculos -> habilitar($sId);
        $esperado = $habilitar['actualizacion'];

        $this -> assertTrue($esperado);
    }

    public function testEliminarLogico(){
        $sId = array(1);
        $vehiculos = new VehiculosDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);
        $eliminarLogico = $vehiculos -> eliminarLogico($sId);
        $esperado = $eliminarLogico['actualizacion'];

        $this -> assertTrue($esperado);
    }
}

?>