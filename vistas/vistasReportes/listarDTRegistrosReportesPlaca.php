<?php
//echo "<pre>";
//print_r($_SESSION['listaDeLReportes']);
//echo "</pre>";

if (isset($_SESSION['mensaje'])) {
    $mensaje = $_SESSION['mensaje'];
    echo "<script languaje='javascript'>alert('$mensaje')</script>";
    unset($_SESSION['mensaje']);
}

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
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css"> 
        <script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
        <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
        <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.flash.min.js"></script>
        <script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
        <script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
        <script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
        <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
        <!--**************************************** -->
        <link rel="stylesheet" href="../../css/vistas/vistaAdminReportes/vistaListarReportePlaca.css">
    </head>
	
	<body>
        <h1>Listado de la tabla Reportes Inactivos</h1>
        <br>
<?php
if(isset($_SESSION['listaDeReportes'])){
	
	 $listaDeReportes=$_SESSION['listaDeReportes'];

	
}
?><h4>Reporte Generado</h4>
<div class="table">
    <table id="example" class="table-responsive table-hover table-bordered table-striped" style="width:100%">
        <thead>
            <tr>
                <th>Numero</th> 
                <th>Fecha</th>
                <th>Placa</th>
                <th>Tipo de Tarifa</th> 
                <th>Hora Ingreso</th> 
                <th>Hora Salida</th> 
                <th>Valor Ticket</th>  
            </tr>
        </thead>
        <tbody>
            <?php
            $i = 0;
            foreach ($listaDeReportes as $key => $value) {
                ?>
                <tr>
                    <td><?php echo $listaDeReportes[$i]->ticNumero; ?></td>  
                    <td><?php echo $listaDeReportes[$i]->ticFecha ; ?></td>  
                    <td><?php echo $listaDeReportes[$i]->vehNumero_Placa; ?></td>
                    <td><?php echo $listaDeReportes[$i]->tarTipoVehiculo; ?></td>
                    <td><?php echo $listaDeReportes[$i]->ticHoraIngreso; ?></td>
                    <td><?php echo $listaDeReportes[$i]->ticHoraSalida; ?></td>
                    <td><?php echo $listaDeReportes[$i]->ticValorFinal; ?></td>   
                </tr>   
                <?php
                $i++;
            }
            ?>
        </tbody>
    </table>
    </div>
    <?php
            $i = 0;
            $totalReportado = 0;
            foreach ($listaDeReportes as $key => $value) {       
                $totalReportado += $listaDeReportes[$i]->ticValorFinal;    
                $i++;
            }
            $listaDeReportes=null;
            
            $totalReportado = number_format($totalReportado, 2, '.', ',');    
            ?>

<h2>Valor Total de Tickets $<?php echo $totalReportado?></h2>

    <!--**************************************** -->  
    <!--LAS siguientes lìneas se agregan con el propòsito de dar funcionalidad a un DataTable-->
    <!--**************************************** -->
    <script type="text/javascript">
                        $(document).ready(function() {
                            $('#example').DataTable({
                                dom: 'Bfrtip',
                                buttons: [
                                    {
                                        extend: 'pdfHtml5',
                                        title: 'Reporte EasyParking',
                                        className: 'btn',
                                        text: "Descargar Reporte"
  }
                                    ],
                                pageLength: 10,
                                lengthMenu: [[5, 10, 15, 20], [5, 10, 15, 20]],
                                ordering: true,
                                order: [[ 1, 'asc' ]],

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