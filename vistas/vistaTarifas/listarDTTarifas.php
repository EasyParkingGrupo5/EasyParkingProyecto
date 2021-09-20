<?php
/*echo "<pre>";
print_r($_SESSION['listaDeVehiculos']);
echo "</pre>";*/
?>
<!DOCTYPE html>
<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!--LAS siguientes lìneas se agregan con el propòsito de dar funcionalidad a un DataTable-->
        <!--**************************************** -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css"> 
        <!--**************************************** -->
        <link rel="stylesheet" href="../../css/vistas/vistaAdminVehiculos/vistaListarVehiculos.css">
    </head>
	
	<body>
<?php
if(isset($_SESSION['listadoTarifas'])){
	
	 $listadoTarifas=$_SESSION['listadoTarifas'];	
}
?>
<h4>Listado de Tarifas Registradas</h4>
<div class="table">
    <table id="example" class="table-responsive table-hover table-bordered table-striped" style="width:100%">
        <thead>
            <tr>
                <th>Id</th> 
                <th>Tipo de Vehículos</th> 
                <th>Valor Tarifa</th> 
                <th>Actualizar</th>
                <th>Eliminar</th> 
            </tr>
        </thead>
        <tbody>
            <?php

            $i = 0;
            foreach ($listadoTarifas as $key => $value) {
                ?>
                <tr>
                    <td><?php echo $listadoTarifas[$i]->tarId; ?></td>  
                    <td><?php echo $listadoTarifas[$i]->tarTipoVehiculo; ?></td>  
                    <td><?php echo '$'.$listadoTarifas[$i]->tarValorTarifa.' pesos por minuto'; ?></td>  
                    <!--<td>d>-->
                    <td><a href="../../Controlador.php?ruta=vistaActualizarTarifa&tarId=<?php echo $listadoTarifas[$i]->tarId; ?>" style="color:red">Actualizar</a></td> 
                    <td><a href="../../Controlador.php?ruta=eliminarTarifa&sId=<?php echo $listadoTarifas[$i]->tarId; ?>" onclick="return confirm('Está seguro de eliminar el registro?')" style="color:#FF0000">Eliminar</a></td>     
                </tr>   
                <?php
                $i++;
            }
            $listadoTarifas=null;
            ?>
        </tbody>
    </table>
    </div>


    <!--**************************************** -->  
    <!--LAS siguientes lìneas se agregan con el propòsito de dar funcionalidad a un DataTable-->
    <!--**************************************** -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript">
                        $(document).ready(function () {
                            $('#example').DataTable({
                                pageLength: 5,
                                lengthMenu: [[5, 10, 15, 20], [5, 10, 15, 20]],
                                language: {
                                    url: '//cdn.datatables.net/plug-ins/1.11.1/i18n/es_es.json'
                                }
                            });
                        });
    </script>     
    <!--**************************************** -->
    <!--**************************************** -->   



</body>
</html>