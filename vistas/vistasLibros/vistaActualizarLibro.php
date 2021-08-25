<?php


if (isset($_SESSION['actualizarLibro'])) {
    $actualizarLibro = $_SESSION['actualizarLibro'];
}
if (isset($_SESSION['listarCategorias'])) {
    $listarCategorias = $_SESSION['listarCategorias'];
    $categoriasCantidad = count($listarCategorias);
}

?>

<div class="penek-heading">
    <h2 class="panel-title">Gestión de Libros</h2>
    <h3 class="panel-title">Actualización de Libro</h3>
</div>
<div>
    <fieldset>
        <center>
        <form role="form" action="Controlador.php" method="POST" id="formRegistro" >
            <table>
                <tr>
                    <td>Id:</td>
                    <td>
                        <input type="form-control" placeholder="Id" name = "isbn" type="number" pattern="" size="50" require="required" autofocus readonly="readonly"
                        value="<?php if (isset($actualizarLibro->isbn)) {
                            echo $actualizarLibro->isbn;}?>">
                    </td>
                </tr>
                <tr>
                    <td>Titulo:</td>
                    <td>
                            <input type="form-control" type="text" name="titulo" placeholder="Titulo"  size="50"
                            value="<?php if (isset($actualizarLibro->titulo)) {
                                echo $actualizarLibro->titulo;
                            } ?>">
                    </td>
                </tr>
                <tr>
                    <td>Autor:</td>
                    <td>
                            <input type="form-control" type="text" name="autor" placeholder="Autor" size="50" 
                            value="<?php if (isset($actualizarLibro->autor)) {
                                echo $actualizarLibro->autor;
                            } ?>">
                    </td>
                </tr>
                <tr>
                    <td>Precio:</td>
                    <td>
                            <input type="number" name="precio" placeholder="Precio" style="width: 330px"
                            value="<?php if (isset($actualizarLibro->precio)) {
                                echo $actualizarLibro->precio;
                            } ?>">
                    </td>
                </tr>
                <tr>
                    <td>Categoria:</td>
                    <td>
                            <select name="categoriaLibro_catLibId" id="categoriaLibro_catLibId" style="width: 338px">
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
                        <button type="reset" name="ruta" value="cancelarActualizarLibro" >Cancelar</button>
                    </td>
                    <td>
                        <br>
                        &nbsp;&nbsp;||&nbsp;&nbsp;<button type="submit" name="ruta" value="confirmarActualizarLibro">Actualizar Libro</button>
                    </td>
                </tr>
            </table>
        </form>
        </center>   
    </fieldset>
</div>