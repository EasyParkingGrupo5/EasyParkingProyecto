<?php
echo "<pre>";
print_r($_GET);
echo "</pre>";

include 'config.php';


if (isset($_POST['Submit'])) {

    $vehId = $_POST['vehId'];
    $vehNumero_Placa = $_POST['vehNumero_Placa'];
    $vehColor = $_POST['vehColor'];
    $vehMarca = $_POST['vehMarca'];
    $empleadoId = $_POST['listaEmpleados'];
    
    $consulta="update vehiculos set vehNumero_Placa='$vehNumero_Placa', vehColor='$vehColor', vehMarca='$vehMarca', Empleados_empId='$empleadoId' where vehId='$vehId'";
    
    $result=mysqli_query($connect, $consulta);
    
    header("Location: fetch.php");
    
}

$id = $_GET['id'];

$query = "select * from vehiculos Join empleados e on e.empId = Empleados_empId where vehId=$id";
$result = mysqli_query($connect, $query);

while ($row = mysqli_fetch_array($result)) {

    $vehId = $row['vehId'];
    $vehNumero_Placa = $row['vehNumero_Placa'];
    $vehColor = $row['vehColor'];
    $vehMarca = $row['vehMarca'];
    $empleadoId = $row['Empleados_empId'];
    $nombreEmpleado = $row['empPrimerNombre'];
    $apellido = $row['empPrimerApellido'];
}
?>
<html>
    <head>
        <title>Actualizar Vehiculo</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>

    <body>
        <div class="container" style="width: 800px; margin-top: 100px;">
            <div class="row">
                <h3>Actualizar Vehiculo</h3>
                <div class="col-sm-6"> 
                    <form action="" method="post" name="form1">
                        <div class="form-group">
                            <input type="hidden" name="vehId" class="form-control" value="<?php echo $id; ?>">
                        </div>
                        <div class="form-group">
                            <label>Id Vehiculo</label>
                            <input type="text" name="vehId" class="form-control" value="<?php echo $vehId; ?>" readonly="readonly">

                        </div>
                        <div class="form-group">
                            <label>Número Placa</label>
                            <input type="text" name="vehNumero_Placa" class="form-control" value="<?php echo $vehNumero_Placa; ?>">
                        </div>
                        <div class="form-group">
                            <label>Color</label>
                            <input type="text" name="vehColor" class="form-control" value="<?php echo $vehColor; ?>">
                        </div>
                        <div class="form-group">
                            <label>Marca</label>
                            <input type="text" name="vehMarca" class="form-control" value="<?php echo $vehMarca; ?>">
                        </div>
                        <div class="form-group">
                        <label>Empleado</label>
                        <select name="listaEmpleados" class="form-control">
                        <?php
                            echo '<option value="'.$empleadoId.'" selected>'.$empleadoId.' - '.$nombreEmpleado.' '.$apellido.'</option>';
                            $query = "Select * from empleados;";

                            $sql = mysqli_query($connect, $query);
                            while ($row = mysqli_fetch_array($sql)){
                                echo '<option value="'.$row['empId'].'">'.$row['empId'].' - '.$row['empPrimerNombre'].' '.$row['empPrimerApellido'].'</option>';
                            }
                        ?>
                        </select>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="Submit" value="Actualizar" class="btn btn-primary btn-block" name="update">    
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </body>
</html>                    