<?php
session_start();
if (isset($_SESSION['mensaje'])) {
    $mensaje = $_SESSION['mensaje'];
    echo "<script languaje='javascript'>alert('$mensaje')</script>";
    unset($_SESSION['mensaje']);
}

if(isset($_SESSION['listarTiposDocumentos'])){
    $listadoDocumentos = $_SESSION['listarTiposDocumentos'];
    $cantidadDocumentos = count($listadoDocumentos);
}


?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="stylesheet" href="css/registroStyle/registro.css">
        <title>Registro</title>
        <!-- Funciones JavaScript propias del sistema -->
        <script type="text/javascript" src="javascript/funciones.js"></script>
        <!-- Funciones JavaScript propias del sistema -->
        <script type="text/javascript" src="javascript/md5.js"></script>  
    </head>
    <body>
    <div class="form-box">
        <div class="margin-box">
            <h1>Datos de registro</h1>
            <form method="POST" action="Controlador.php" id="formRegistro">
                    <input type="number" name="empNumeroDocumento" id="empNumeroDocumento" placeholder="Número de documento" required
                    value="<?php if(isset($_SESSION['empNumeroDocumento'])){
                        echo $_SESSION['empNumeroDocumento'];
                        unset($_SESSION['empNumeroDocumento']);
                    } ?>">
                    <select name="Tipos_Documentos_tipDocId" id="Tipos_Documentos_tipDocId">
                        <?php for($i=0; $i < $cantidadDocumentos; $i++){
                            ?><option value="<?php echo $listadoDocumentos[$i]->tipDocId?>"
                            <?php
                            if(isset($_SESSION['listarTiposDocumentos']) && $_SESSION['listarTiposDocumentos'] == $listadoDocumentos[$i]->tipDocId)
                            echo " selected";
                            ?>
                            >    
                                <?php echo $listadoDocumentos[$i]->tipDocNombre_documento?></option>
                                <?php 
                            
                            }                            
                        ?>
                    </select>
                    <input type="text" name="empPrimerNombre" id="empPrimerNombre" placeholder="Primer nombre" required
                    value ="<?php if(isset($_SESSION['empPrimerNombre'])){
                        echo $_SESSION['empPrimerNombre'];
                        unset($_SESSION['empPrimerNombre']);
                    } ?>">
                    
                    <input type="text" name="empSegundoNombre" id="empSegundoNombre" placeholder="Segundo nombre" required
                    value="<?php if(isset($_SESSION['empSegundoNombre'])){
                        echo $_SESSION['empSegundoNombre'];
                        unset($_SESSION['empSegundoNombre']);
                            } ?>">
                    <input type="text" name="empPrimerApellido" id="empPrimerApellido" placeholder="Primer apellido" required
                    value="<?php if(isset($_SESSION['empPrimerApellido'])){
                        echo $_SESSION['empPrimerApellido'];
                        unset($_SESSION['empPrimerApellido']);
                    } ?>">
                    <input type="text" name="empSegundoApellido" id="empSegundoApellido" placeholder="Segundo apellido" required
                    value="<?php if(isset($_SESSION['empSegundoApellido'])){
                        echo $_SESSION['empSegundoApellido'];
                        unset($_SESSION['empSegundoApellido']);
                            } ?>">
                    
                    <input type="number" name="empTelefono" id="empTelefono" placeholder="Teléfono" required
                    value="<?php if(isset($_SESSION['empTelefono'])){
                        echo $_SESSION['empTelefono'];
                        unset($_SESSION['empTelefono']);
                    } ?>">
                    
                    <select name="empTipoSangre" id="empTipoSangre">
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="AB">AB</option>
                        <option value="O">O</option>
                    </select>
                    
                    <select name="empRh" id="empRh">
                        <option value="POSITIVO">Positivo</option>
                        <option value="NEGATIVO">Negativo</option>
                    </select>
                    
                    <input type="text" name="usuLogin" id="InputCorreo" placeholder="Correo" required
                    value="<?php if(isset($_SESSION['usuLogin'])){
                        echo $_SESSION['usuLogin'];
                        unset($_SESSION['usuLogin']);
                            } ?>">
                    
                    <input type="password" name="usuPassword" id="InputPassword" placeholder="Contraseña" required>
                    
                    <input type="password" name="usuPassword2" id="InputPassword2" placeholder="Confirmar Contraseña" required>
                        <input type="hidden" name="ruta" value="gestionDeRegistro">
                    
                    
                        <button class="btn" onclick="valida_registro()">Registrarse</button>
                    
                    
                <div class ="login">
                        Ya está registrado? 
                        <a href="login.php" style="color:#FF0000">
                            Ingrese Aquí
                        </a>
                    </div>
            </form>
        </div>
    </body>
</html>