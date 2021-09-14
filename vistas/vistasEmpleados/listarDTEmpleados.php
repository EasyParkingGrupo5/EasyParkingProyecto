<?php
//echo "<pre>";
//print_r($_SESSION['listaDeLibros']);
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
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css"> 
        <!--**************************************** -->
        <link rel="stylesheet" href="../../../css/vistas/vistaAdminEmpleados/vistarListarEmpleados.css">
    </head>

	<body>
<?php
if(isset($_SESSION['listaDeEmpleados'])){
	
    $listaDeEmpleados=$_SESSION['listaDeEmpleados'];
	
}
?>            
<h4 >Listado de Empleados</h4>
<div class="table">
    <table id="example" class="table-responsive table-hover table-bordered table-striped">
        <thead>

            <tr> 
                <th>Id</th>
                <th>Número<br>Documento</th> 
                <th>Tipo<br>Documento</th>
                <th>Nombre</th>
                <!--<th>Estado</th>-->
                <th>Apellido</th> 
                <th>Teléfono</th>
                <th>Tipo de Sangre</th> 
                <th>RH</th>
                <th>Actualizar</th>
                <th>Eliminar</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $i = 0;
            foreach ($listaDeEmpleados as $key => $value) {
                ?>
                <tr> 
                    <td><?php echo $listaDeEmpleados[$i]->empId; ?></td> 
                    <td><?php echo $listaDeEmpleados[$i]->empNumeroDocumento; ?></td> 
                    <td><?php echo $listaDeEmpleados[$i]->tipDocNombre_documento; ?></td>  
                    <td><?php echo $listaDeEmpleados[$i]->empPrimerNombre." ".$listaDeEmpleados[$i]->empSegundoNombre; ?></td> 
                    <td><?php echo $listaDeEmpleados[$i]->empPrimerApellido." ".$listaDeEmpleados[$i]->empSegundoApellido; ?></td> 
                    <td><?php echo $listaDeEmpleados[$i]->empTelefono; ?></td> 
                    <td><?php echo $listaDeEmpleados[$i]->empTipoSangre; ?></td> 
                    <td><?php echo $listaDeEmpleados[$i]->empRh; ?></td> 
                    <!--<td>d>--> 
                    <td><a href="../../../Controlador.php?ruta=actualizarEmpleado&sId=<?php echo $listaDeEmpleados[$i]->empId; ?>" style="color:#FF0000">Actualizar</a></td>  
                    <td><a href="../../../Controlador.php?ruta=eliminarEmpleado&sId=<?php echo $listaDeEmpleados[$i]->empId; ?>" onclick="return confirm('Está seguro de eliminar el registro?')" style="color:#FF0000">Eliminar</a></td>  
                </tr>   
                <?php
                $i++;
            }
            $listaDeEmpleados=null;
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