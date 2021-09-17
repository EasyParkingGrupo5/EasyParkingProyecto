<?php

if (isset($_SESSION['mensaje'])) {
    $mensaje = $_SESSION['mensaje'];
    echo "<script languaje='javascript'>alert('$mensaje')</script>";
    unset($_SESSION['mensaje']);
}

if (isset($_SESSION['listarTarifa'])){
    $listarTarifas = $_SESSION['listarTarifa'];
    $cantidadTarifas = count($listarTarifas);
}

if (isset($_SESSION['actualizarTickets'])){
    $actualizarTickets = $_SESSION['actualizarTickets'];
}

if (isset($_SESSION['listarVehiculos'])){
    $listarVehiculos = $_SESSION['listarVehiculos'];
    $cantidadVehiculo = count($listarVehiculos);
}

/*echo "<pre>";
print_r($_SESSION);
echo "</pre>";*/
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/timepicker.js/latest/timepicker.min.js"></script>
    <link rel="stylesheet" href="../../css/vistas/vistaAdminTickets/vistaCerrarTicket.css">
    <title>EasyParking</title>
</head>
<body>
    <form class="formInsertarTicket" action="../../Controlador.php" method="post">
    <div class="contenedor-input">
    <div class="uno">
    <h6>Número de Ticket:</h6>
        <input type="text" class="input-48" name="ticNumero"
            <?php
                if(isset($_SESSION['actualizarTickets']) && $actualizarTickets->ticNumero){
                ?> value="<?php echo $actualizarTickets->ticNumero?>" readonly
                >    
                <?php 
                    }        
                                           
            ?>
            </div>
            <div class="dos">
    <h6>Placa:</h6>
        <input type="text" class="input-48" name=""
            <?php for($i=0; $i < $cantidadVehiculo; $i++){
                if(isset($_SESSION['actualizarTickets']) && isset($_SESSION['listarVehiculos']) && $listarVehiculos[$i]->vehId == $actualizarTickets->Vehiculos_vehId){
                ?> value="<?php echo $listarVehiculos[$i]->vehNumero_Placa?>" readonly
                >    
                <?php 
                    }        
                }                            
            ?>
                </div><div class="tres">
        <h6>Tarifa:</h6>
        <input type="text" class="input-48" name=""
            <?php for($i=0; $i < $cantidadTarifas; $i++){
                if(isset($_SESSION['actualizarTickets']) && isset($_SESSION['listarTarifa']) && $listarTarifas[$i]->tarId == $actualizarTickets->Tarifas_tarId){
                ?> value="<?php echo $listarTarifas[$i]->tarTipoVehiculo.' - $'.$listarTarifas[$i]->tarValorTarifa.' pesos minuto'?>" readonly
                >    
                <?php 
                    }        
                }                            
            ?>
                </div><div class="cuatro">
        <h6>Fecha:</h6>
        <input type="text" class="input-48" name=""
            <?php
                if(isset($_SESSION['actualizarTickets'])){
                ?> value="<?php echo $actualizarTickets->ticFecha?>" readonly
                >    
                <?php         
                }                            
            ?>
                </div><div class="cinco">
        <h6>Hora Ingreso:</h6>
        <input type="text" class="input-48" name=""
            <?php
                if(isset($_SESSION['actualizarTickets'])){
                ?> value="<?php echo $actualizarTickets->ticHoraIngreso?>" readonly
                >    
                <?php         
                }                            
            ?>
                </div><div class="seis">
        <h6>Hora Salida:</h6>
        <input class="input-48" type="time" name="ticHoraSalida" required
        <?php if(isset($_SESSION['horaFinal'])){
            ?> value="<?php echo $_SESSION['horaFinal']?>">
            <?php }
            ?>
        </div>
        </div>
        <button class="btnInsertarTicket" type="submit" name="ruta" value="calcularValorFinal">Aceptar</button>
        <?php if(isset($_SESSION['valorTotal'])){?>
            <div class="contenedor-input2">
                <div class="siete">
                    <h6>Total a pagar:</h6>
                    <input type="text" class="input-48" name="valorTotal" readonly
                        <?php
                            if(isset($_SESSION['valorTotal'])){
                            ?> value="$<?php echo $_SESSION['valorTotal']?> pesos" 
                            >    
                            <?php       
                            }                            
                        ?>   
                </div>
                <div class="ocho">
                    <h6>Recibido:</h6>
                    <input type="number" class="input-48" name="valorRecibido" id=""
                        <?php
                            if(isset($_SESSION['valorRecibido'])){
                            ?> value="<?php echo $_SESSION['valorRecibido']?>"
                            >    
                            <?php 
                            }                            
                        ?>    
                </div>
                </div>
                <?php if(isset($_SESSION['totalCambio1'])){?>
                        <div class="nueve">
                            <h6>Cambio: </h6>
                            <input type="text" class="input-48" name="" id="" readonly<?php
                                    if(isset($_SESSION['totalCambio1'])){
                                    ?> value="$<?php echo $_SESSION['totalCambio1']?> pesos" 
                                    >    
                                    <?php       
                                    }                            
                                    ?>
                        </div>
                        </div>
                        <?php     
            }                            
            ?>  
                <div class ="diez">
                <button class="btnCalcularCambio" type="submit" name="ruta" value="calcularCambio">Calcular Cambio</button>
                </div>
                <div class="once">
                <button class="btnCerrarTicket" type="submit" name="ruta" value="cerrarTicket">Cerrar Ticket</button>
                </div>
                <?php     
            }                            
            ?>     
</from>
</body>
</html>