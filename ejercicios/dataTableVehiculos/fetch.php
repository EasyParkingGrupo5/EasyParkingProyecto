<?php
session_start();

if(isset($_SESSION['mensaje'])) {//isset()
    $mensaje=$_SESSION['mensaje'];//capturamos mensaje que existe
     echo "<script type='text/javascript'>alert('$mensaje');</script>";//imprimimos mensaje
     unset($_SESSION['mensaje']);// eliminamos mensaje
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Listar Vehiculos</title>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">  
    </head>
    <body>
        <div class="container" style="width: 800px; margin-top: 100px;">       
            <div class="row">
                <table id="example" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th>Id</th> 
                            <th>Número Placa</th>
                            <th>Número Ticket</th> 
                            <th>Color</th>
                            <th>Marca</th>   
                            <th>Estado</th> 
                            <th>Id Empleado</th> 
                            <th>Documento Empleado</th> 
                            <th>Editar</th> 
                            <th>Eliminar</th> 
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include './config.php';
                        $query = "SELECT veh.vehId, veh.vehNumero_Placa, tic.ticNumero, 
                        veh.vehColor, veh.vehMarca, veh.vehEstado, emp.empId, 
                        emp.empNumeroDocumento FROM vehiculos veh JOIN empleados emp ON 
                        veh.Empleados_empId =  emp.empId JOIN tickets tic ON veh.Tickets_ticId 
                        = tic.ticId; ";
                        $sql = mysqli_query($connect, $query);
                        while ($row = mysqli_fetch_array($sql)) {
                            ?>                       
                            <tr>
                                <td><?php echo $row["vehId"]; ?></td>  
                                <td><?php echo $row["vehNumero_Placa"]; ?></td>  
                                <td><?php echo $row["ticNumero"]; ?></td>  
                                <td><?php echo $row["vehColor"]; ?></td>  
                                <td><?php echo $row["vehMarca"]; ?></td>  
                                <td><?php echo $row["vehEstado"]; ?></td>  
                                <td><?php echo $row["empId"]; ?></td>  
                                <td><?php echo $row["empNumeroDocumento"]; ?></td>  
                                <td><a href="actualizar.php?id=<?php echo $row["vehId"]; ?>">Actualizar</a></td>  
                                <td><a href="borrar.php?id=<?php echo $row["vehId"]; ?>" onclick="return confirm('Está seguro de eliminar el registro?')">Eliminar</a></td>  
                            </tr>             
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
        
    </body>
</html>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
                                $(document).ready(function () {
                                    $('#example').DataTable();
                                });
</script>
<!--https://eldesvandejose.com/category/jquery/hacks-y-recursos/el-plugin-datatables-->