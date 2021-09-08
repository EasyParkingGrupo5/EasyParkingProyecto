<?php

use PHPUnit\Framework\TestCase;
require_once 'modelos/modeloTarifas/TarifasDAO.php';
require_once 'modelos/ConstantesConexion.php';

final class TarifasDAOTest extends TestCase{

    public function testSeleccionarTodos(){
        $tarifa = new TarifasDAO (SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);
        $esperado = $tarifa -> seleccionarTodos();

        $this -> assertEmpty(!$esperado);
    }

    public function testSeleccionarID(){
        $sId=array(1);
        $tarifa = new TarifasDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);
        $seleccionar = $tarifa -> seleccionarID($sId);
        $esperado = $seleccionar['exitoSeleccionId'];

        $this -> assertTrue($esperado);

    }

    public function testInsertar(){
        $registro['tarId'] = 5;
        $registro['tarTipoVehiculo']='Camion';
        $registro['tarValorTarifa']=150;
        $registro['tarEstado']=1;

        $tarifa = new TarifasDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);
        $insertar = $tarifa -> insertar($registro);
        $esperado = $insertar['Inserto'];

        $this -> assertTrue($esperado);
    }

    public function testActualizar(){
        $registro['tarId'] = 5;
        $registro['tarTipoVehiculo']='Mono Patin';
        $registro['tarValorTarifa']=15;

        $tarifa = new TarifasDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);
        $insertar = $tarifa -> actualizar($registro);
        $esperado = $insertar['actualizacion'];

        $this -> assertTrue($esperado);
    }

    public function testEliminar(){
        $sId = array(5);
        $tarifa = new TarifasDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);
        $eliminar = $tarifa -> eliminar($sId);
        $esperado = $eliminar['eliminado'];

        $this -> assertTrue($esperado);
    }

    public function testHabilitar(){
        $sId = array(1);
        $tarifa = new TarifasDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);
        $habilitar = $tarifa -> habilitar($sId);
        $esperado = $habilitar['actualizacion'];

        $this -> assertTrue($esperado);
    }

    public function testEliminarLogico(){
        $sId = array(1);
        $tarifa = new TarifasDAO(SERVIDOR, BASE, USUARIO_DB, CONTRASENIA_DB);
        $eliminarLogico = $tarifa -> eliminarLogico($sId);
        $esperado = $eliminarLogico['actualizacion'];

        $this -> assertTrue($esperado);
    }
}


?>