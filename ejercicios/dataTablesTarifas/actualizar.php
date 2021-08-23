<?php
echo "<pre>";
print_r($_GET);
echo "</pre>";

include 'config.php';


if (isset($_POST['Submit'])) {

    $tarId = $_POST['tarId'];
    $tarTipoVehiculo = $_POST['tarTipoVehiculo'];
    $tarValorTarifa = $_POST['tarValorTarifa'];
    
    
    $consulta="update tarifas set tarTipoVehiculo = '$tarTipoVehiculo',tarValorTarifa = '$tarValorTarifa' where tarId='$tarId'";
    
    $result=mysqli_query($connect, $consulta);
    
    header("Location: fetch.php");
    
}

$id = $_GET['id'];

$query = "SELECT * FROM tarifas WHERE tarId ='$id'";    
$result = mysqli_query($connect, $query);

while ($row = mysqli_fetch_array($result)) {

    $tarId = $row['tarId'];
    $tarTipoVehiculo = $row['tarTipoVehiculo'];
    $tarValorTarifa = $row['tarValorTarifa'];
    
}
?>
<html>
    <head>
        <title>Actualizando Tarifas</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>

    <body>
        <div class="container" style="width: 800px; margin-top: 100px;">
            <div class="row">
                <h3>Actualizando Tarifas</h3>
                <div class="col-sm-6"> 
                    <form action="" method="post" name="form1">
                        <div class="form-group">
                            <input type="hidden" name="id" class="form-control" value="<?php echo $id; ?>">
                        </div>
                        <div class="form-group">
                            <label>Id Tarifa</label>
                            <input type="text" name="tarId" class="form-control" value="<?php echo $tarId; ?>"readonly="readonly">
                        </div>
                        <div class="form-group">
                            <label>Tipo Vehiculo</label>
                            <input type="text" name="tarTipoVehiculo" class="form-control" value="<?php echo $tarTipoVehiculo; ?>">
                        </div>
                        <div class="form-group">
                            <label>Valor Tarifa</label>
                            <input type="text" name="tarValorTarifa" class="form-control" value="<?php echo $tarValorTarifa; ?>">
                        </div>
                        
                        <div class="form-group">
                            <input type="submit" name="Submit" value="Update" class="btn btn-primary btn-block" name="update">    
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </body>
</html>                    