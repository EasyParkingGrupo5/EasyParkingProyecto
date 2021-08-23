<?php

include("config.php");

$tarId= $_GET['tarId'];

$query = "DELETE  FROM tarifas WHERE tarId = $tarId";

$result = mysqli_query($connect, $query);

if ($result == 1) {
    $mensaje = "Registro eliminado físicamente";
    session_start();
    $_SESSION['mensaje'] = $mensaje;
}


header("location: fetch.php");

?>

