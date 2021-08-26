<?php


if (isset($_SESSION['actualizarLibro'])) {
    $actualizarLibro = $_SESSION['actualizarLibro'];
}
if (isset($_SESSION['listarCategorias'])) {
    $listarCategorias = $_SESSION['listarCategorias'];
    $categoriasCantidad = count($listarCategorias);
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

.botonActualizar{
    margin-left: 60px;
}

.letras{
    justify-content: center;
    text-align: left;
}

</style>
<div>
    <h2 class="titulo">Gestión de Libros</h2>
    <h3 class ="titulo">Actualización de Libro</h3>
</div>
<div>
    <fieldset>
        <center>
        <form role="form" action="Controlador.php" method="POST" id="formRegistro" >
            <table>
                <tr>
                    <td class="letras">Id:</td>
                    <td>
                        <input placeholder="Id" name = "isbn" type="number" pattern="" require="required" autofocus readonly="readonly"
                        value="<?php if (isset($actualizarLibro->isbn)) {
                            echo $actualizarLibro->isbn;}?>">
                    </td>
                </tr>
                <tr>
                    <td class="letras">Titulo:</td>
                    <td>
                            <input type="text" name="titulo" placeholder="Titulo"
                            value="<?php if (isset($actualizarLibro->titulo)) {
                                echo $actualizarLibro->titulo;
                            } ?>">
                    </td>
                </tr>
                <tr>
                    <td class="letras">Autor:</td>
                    <td>
                            <input type="text" name="autor" placeholder="Autor"
                            value="<?php if (isset($actualizarLibro->autor)) {
                                echo $actualizarLibro->autor;
                            } ?>">
                    </td>
                </tr>
                <tr>
                    <td class="letras">Precio:</td>
                    <td>
                            <input type="number" name="precio" placeholder="Precio"
                            value="<?php if (isset($actualizarLibro->precio)) {
                                echo $actualizarLibro->precio;
                            } ?>">
                    </td>
                </tr>
                <tr>
                    <td class="letras">Categoria:</td>
                    <td>
                            <select name="categoriaLibro_catLibId" id="categoriaLibro_catLibId">
                                <?php for ($i=0; $i < $categoriasCantidad; $i++) { 
                                ?>
                                    <option value="<?php echo $listarCategorias[$i]->catLibId; ?>" 
                                    <?php if (isset($listarCategorias[$i]->catLibId) && isset($actualizarLibro->categoriaLibro_catLibId) && $listarCategorias[$i]->catLibId == $actualizarLibro->categoriaLibro_catLibId) {
                                        echo "selected";
                                    } ?>
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
                        <button class="botonCancelar" type="submit" name="ruta" value="cancelarActualizarLibro" >Cancelar</button>
                    </td>
                    <td>
                        <br>
                        <button class="botonActualizar" type="submit" name="ruta" value="confirmarActualizarLibro">Actualizar Libro</button>
                    </td>
                </tr>
            </table>
        </form><br>
        </center>   
    </fieldset>
</div>