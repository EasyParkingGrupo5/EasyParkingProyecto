<?php

if (isset($_SESSION['registroEmpleado'])){
    $registroEmpleado = $_SESSION['registroEmpleado'];
}

if (isset($_SESSION['registoDocumentos'])){
    $registoDocumentos = $_SESSION['registoDocumentos'];
    $cantidadDocumentos = count($registoDocumentos);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../css/vistas/vistaAdminEmpleados/vistaActualizacionEmpleado.css">
</head>
<body>
<h2 id="text-1">Gestion de Empleados</h2>
<h3 id="text-2">Actualizar Empleado</h3>
<div class="formActualizarRols">
        <form role="form" action="../../../Controlador.php" method="post" autocomplete="off">
            <div class="contenedor-input"> 
                        <input class="input-100" placeholder="Id" name="empId" type="text" patter="" required="requires" autofocus readonly="readonly" value="<?php 
                        if (isset($registroEmpleado->empId)) {
                            echo $registroEmpleado->empId;} 
                        ?>">
                        <input class="input-48" placeholder="Documento" name="empNumeroDocumento" type="text" patter="" required="required" value="<?php 
                        if(isset($registroEmpleado->empNumeroDocumento)){
                            echo($registroEmpleado->empNumeroDocumento);
                        } 
                        ?>">
                        <select class="select-48" name="Tipos_Documentos_tipDocId" id="Tipos_Documentos_tipDocId">
                        <?php for($i=0; $i < $cantidadDocumentos; $i++){
                            ?><option value="<?php echo $registoDocumentos[$i]->tipDocId?>"
                            <?php
                            if(isset($registoDocumentos[$i]->tipDocId) && isset($registroEmpleado->Tipos_Documentos_tipDocId) && $registroEmpleado->Tipos_Documentos_tipDocId == $registoDocumentos[$i]->tipDocId)
                            echo " selected";
                            ?>
                            >    
                                <?php echo $registoDocumentos[$i]->tipDocNombre_documento?></option>
                                <?php 
                            
                            }                            
                        ?>
                    </select>
                        <input class="input-48" placeholder="Primer Nombre" name="empPrimerNombre" type="text" patter="" required="required" value="<?php 
                        if(isset($registroEmpleado->empPrimerNombre)){
                            echo($registroEmpleado->empPrimerNombre);
                        } 
                        ?>">
                        <input class="input-48" placeholder="Segundo Nombre" name="empSegundoNombre" type="text" patter="" required="required" value="<?php 
                        if(isset($registroEmpleado->empSegundoNombre)){
                            echo($registroEmpleado->empSegundoNombre);
                        } 
                        ?>">
                        <input class="input-48" placeholder="Primer Apellido" name="empPrimerApellido" type="text" patter="" required="required" value="<?php 
                        if(isset($registroEmpleado->empPrimerApellido)){
                            echo($registroEmpleado->empPrimerApellido);
                        } 
                        ?>">
                        <input class="input-48" placeholder="Segundo Apellido" name="empSegundoApellido" type="text" patter="" required="off" value="<?php 
                        if(isset($registroEmpleado->empSegundoApellido)){
                            echo($registroEmpleado->empSegundoApellido);
                        } 
                        ?>">
                        <input class="input-100" placeholder="Télefono" name="empTelefono" type="text" patter="" required="required" value="<?php 
                        if(isset($registroEmpleado->empTelefono)){
                            echo($registroEmpleado->empTelefono);
                        } 
                        ?>">
                        <select class="select-48" name="empTipoSangre" id="empTipoSangre">
                        <?php
                            if(isset($registroEmpleado->empTipoSangre)){
                                ?><option value="<?php echo $registroEmpleado->empTipoSangre ?>" selected><?php echo $registroEmpleado->empTipoSangre;?></option>
                                <?php 
                            }?>
                            
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="AB">AB</option>
                            <option value="O">O</option>
                        </select>

                        <select class="select-48" name="empRh" id="empRh">
                            <?php
                            if(isset($registroEmpleado->empRh)){
                                ?><option value="<?php echo $registroEmpleado->empRh ?>" selected><?php echo $registroEmpleado->empRh;?></option>
                                <?php 
                            }?>
                            <option value="POSITIVO">Positivo</option>
                            <option value="NEGATIVO">Negativo</option>
                        </select>
                        
                        <button class="btnCancelar" type="submit" name="ruta" value="cancelarActualizarEmpleado" formnovalidate="">Cancelar</button>

                        <button class="btnActualizar" type="submit" name="ruta" value="confirmarActualizarEmpleado">Confirmar</button>
                        </div>
                    </form> 
</div>
</body>
</html>
