<?php

/*echo "<pre>";
print_r($_SESSION['listarTiposDocumentos']);
echo "</pre>";*/

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


        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css"> 
        <link rel="stylesheet" href="../../../css/vistas/vistaAdminEmpleados/vistaListarTiposDocumentos.css">
    </head>
    <br>
<body>
<?php
if(isset($_SESSION['listarTiposDocumentos'])){
	
	 $listaDeDocumentos = $_SESSION['listarTiposDocumentos'];

	
}
?>
<h4>Listado de Tipos de Documentos</h4>
<div class="table">
    <table id="example" class="table-responsive table-hover table-bordered table-striped" style="width:100%">
        <thead>
            <tr>
                <th>Id</th> 
                <th>Sigla</th> 
                <th>Nombre Documentos</th>  
                <th>Editar</th> 
                <th>Eliminar</th> 
            </tr>
        </thead>
        <tbody>
            <?php
            $i = 0;
            foreach ($listaDeDocumentos as $key => $value) {
                ?>
                <tr>
                    <td><?php echo $listaDeDocumentos[$i]->tipDocId; ?></td>  
                    <td><?php echo $listaDeDocumentos[$i]->tipDocSigla; ?></td>  
                    <td><?php echo $listaDeDocumentos[$i]->tipDocNombre_documento; ?></td>   
                    <td><a href="../../../Controlador.php?ruta=actualizarTipoDocumento&idAct=<?php echo $listaDeDocumentos[$i]->tipDocId; ?>" style="color:#FF0000">Actualizar</a></td>  
                    <td><a href="../../../Controlador.php?ruta=eliminarTipoDocumento&idAct=<?php echo $listaDeDocumentos[$i]->tipDocId; ?>" onclick="return confirm('Está seguro de eliminar el registro?')" style="color:#FF0000">Eliminar</a></td>  
                </tr>   
                <?php
                $i++;
            }
            $listaDeDocumentos=null;
            ?>
        </tbody>
    </table>
</div>


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




</body>
</html>