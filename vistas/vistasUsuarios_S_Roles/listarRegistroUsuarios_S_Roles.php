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
        <link rel="stylesheet" href="../../../css/vistas/vistaAdminUsuarios/vistaListarUsuRol.css">
    </head>
	
	<body>
<?php
if(isset($_SESSION['listaDeUsuarios_Roles'])){
	
    $listaDeUsuarios_Roles=$_SESSION['listaDeUsuarios_Roles'];
	
}

?>
<h4>Listado de la Tabla Rol y Usuario</h4>
<div class="table">
    <table id="example" class="table-responsive table-hover table-bordered table-striped" style="width:100%">
        <thead>

            <tr>
                <th>Id Usuario</th> 
                <th>Correo Usuario</th>
                <th>Id Rol</th>
                <th>Nombre Rol</th>
                <!--<th>Estado</th>-->
                <th>Actualizar</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $i = 0;
            foreach ($listaDeUsuarios_Roles as $key => $value) {
                ?>
                <tr>
                    <td><?php echo $listaDeUsuarios_Roles[$i]->usuId; ?></td>  
                    <td><?php echo $listaDeUsuarios_Roles[$i]->usuLogin; ?></td>
                    <td><?php echo $listaDeUsuarios_Roles[$i]->rolId; ?></td>
                    <td><?php echo $listaDeUsuarios_Roles[$i]->rolNombre; ?></td>
                    <!--<td>d>-->
                    <td><a href="../../../Controlador.php?ruta=actualizarUsuarioRol&usuId=<?php echo $listaDeUsuarios_Roles[$i]->usuId; ?>" style="color:#FF0000">Actualizar</a></td>  
                </tr>   
                <?php
                $i++;
            }
            $listaDeUsuarios=null;
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