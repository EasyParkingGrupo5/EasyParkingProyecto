<?php


if (isset($_SESSION['listarCategorias'])) {
    $listarCategorias = $_SESSION['listarCategorias'];
    $categoriasCantidad = count($listarCategorias);
}

if (isset($_SESSION['mensaje'])) {
    $mensaje = $_SESSION['mensaje'];
    echo "<script languaje='javascript'>alert('$mensaje')</script>";
    unset($_SESSION['mensaje']);
}



?>
<style type="text/css">

form{
	width:350px;
	padding:16px;
	border-radius:10px;
	margin:auto;
	background-color:white;
    border: black 3px solid;
}

form button[type="submit"]{
	cursor:pointer;
}

form input[type="text"]{
    margin: 5px;
    width: 200px;
}

form input[type="number"]{
    margin: 5px;
    width: 200px;
}

form select{
    margin: 5px;
    width: 200px;
}

.titulo{
    display: flex;
    justify-content: center;
}

.botonCancelar{
    margin-left: center;
}

.botonInsertar{
    margin-left: 70px;
}

.letras{
    justify-content: center;
    text-align: left;
}

</style>
<div>
    <h2 class="titulo">Gestión de Libros</h2>
    <h3 class ="titulo">Agregar nuevo Libro</h3>
</div>
<div>
    <fieldset>
        <center>
        <form role="form" action="Controlador.php" method="POST" id="formRegistro" autocomplete="off">
            <table>
                <tr>
                    <td class="letras">Id:</td>
                    <td>
                        <input placeholder="Id" name = "isbn" type="number" required="required" value="<?php if(isset($_SESSION['isbn'])){echo $_SESSION['isbn']; unset($_SESSION['isbn']);}?>">
                    </td>
                </tr>
                <tr>
                    <td class="letras">Titulo:</td>
                    <td>
                            <input type="text" name="titulo" placeholder="Titulo"  required="required" value="<?php if(isset($_SESSION['titulo'])){echo $_SESSION['titulo']; unset($_SESSION['titulo']);}?>">
                    </td>
                </tr>
                <tr>
                    <td class="letras">Autor:</td>
                    <td>
                            <input type="text" name="autor" placeholder="Autor"  required="required" value="<?php if(isset($_SESSION['autor'])){echo $_SESSION['autor']; unset($_SESSION['autor']);}?>">
                    </td>
                </tr>
                <tr>
                    <td class="letras">Precio:</td>
                    <td>
                            <input type="number" name="precio" placeholder="Precio"  required="required" value="<?php if(isset($_SESSION['precio'])){echo $_SESSION['precio']; unset($_SESSION['precio']);}?>">
                    </td>
                </tr>
                <tr>
                    <td class="letras">Categoria:</td>
                    <td>
                            <select name="categoriaLibro_catLibId" id="categoriaLibro_catLibId">
                                <?php for ($i=0; $i < $categoriasCantidad; $i++) { 
                                ?>
                                    <option value="<?php echo $listarCategorias[$i]->catLibId; ?>"
                                     <?php
                                    if(isset($_SESSION['categoriaLibro_catLibId']) && $_SESSION['categoriaLibro_catLibId']==$listarCategorias[$i]->catLibId){
                                        echo " selected";
                                        unset($_SESSION['categoriaLibro_catLibId']);
                                    }
                                    ?>
                                    
                                    >

                                    <?php echo $listarCategorias[$i]->catLibNombre; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                    </td>
                </tr>
                <tr>
                   
                    <td>
                        <br>
                        <button class="botonCancelar" type="submit" name="ruta" value="listarLibros" formnovalidate>Cancelar</button>
                    </td>
                    <td>
                        <br>
                        <button class="botonInsertar" type="submit" name="ruta" value="confirmarInsertarLibro">Insertar Libro</button>
                    </td>
                </tr>
            </table>
        </form><br>
        </center>   
    </fieldset>
</div>
