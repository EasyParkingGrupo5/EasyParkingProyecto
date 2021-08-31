<?php
echo "<pre>";
print_r($_SESSION['listaDeReportes']);
echo "</pre>";
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
    </head>
	
	<body>
<?php
if(isset($_SESSION['listaDeReportes'])){
	
	 $listaDeReportes=$_SESSION['listaDeReportes'];
	 unset($_SESSION['listaDeReportes']);
	
}
?>
    <table id="example" class="table-responsive table-hover table-bordered table-striped" style="width:100%">
        <thead>
            <tr>
                <th>Id</th> 
                <th>Numero</th> 
                <th>Fecha</th>
                <!--<th>Estado</th>--> 
                <th>Empleados</th>  
                <th>Edit</th> 
                <th>Delete</th> 
            </tr>
        </thead>
        <tbody>
            <?php
            $i = 0;
            foreach ($listaDeReportes as $key => $value) {
                ?>
                <tr>
                    <td><?php echo $listaDeReportes[$i]->repId; ?></td>  
                    <td><?php echo $listaDeReportes[$i]->repNumero ; ?></td>  
                    <td><?php echo $listaDeReportes[$i]->repFecha; ?></td>    
                    <!--<td>d>-->  
                    <td><?php echo $listaDeReportes[$i]->empId; ?></td>  
                    <td><a href="Controlador.php?ruta=actualizarReportes&idAct=<?php echo $listaDeReportes[$i]->isbn; ?>">Actualizar</a></td>  
                    <td><a href="Controlador.php?ruta=eliminarReportes&idAct=<?php echo $listaDeReportes[$i]->isbn; ?>" onclick="return confirm('Está seguro de eliminar el registro?')">Eliminar</a></td>  
                </tr>   
                <?php
                $i++;
            }
            $listaDeReportes=null;
            ?>
        </tbody>
    </table>


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
                            });
                        });
    </script>     
    <!--**************************************** -->
    <!--**************************************** -->   



</body>
</html>