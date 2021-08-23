<?php

include("config.php");

$vehId = $_GET['id'];

$query = "delete from vehiculos where vehId='$vehId';";

$result = mysqli_query($connect, $query);

if ($result == 1) {
    $mensaje = "Registro eliminado físicamente";
    session_start();
    $_SESSION['mensaje'] = $mensaje;
}


header("location: fetch.php");