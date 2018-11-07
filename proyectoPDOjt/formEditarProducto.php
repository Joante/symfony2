<?php 
    require 'config/config.php';
    $objMarca = new Marca;
    $listadoMarcas = $objMarca ->listarMarcas();
    $objCategoria = new Categoria;
    $listadoCategorias = $objCategoria-> listarCategorias();
    $objProducto = new Producto;
    $idProducto = $_GET['idProducto'];
    $detalleProducto = $objProducto -> verProductoPorId($idProducto); 
?>
<?php  include 'includes/header.html';  ?>
<?php  include 'includes/nav.php';  ?>

<main class="container">
    <h1>Formulario para modificar un producto</h1>
    <form action="editarProducto.php" method="post" enctype="multipart/form-data">
    Nombre: <br>
    <input type="text" name="prdNombre" class="form-control" value="<?php echo$detalleProducto['prdNombre']?>" required>
    <br>
    Precio:
     <div class="input-group mb-2">
            <div class="input-group-prepend">
                <div class="input-group-text">$</div>
            </div>
            <input type="text" name="prdPrecio" class="form-control" value="<?php echo$detalleProducto['prdPrecio']?>" required>
        </div>
    <br>
    Marca:<br>
    <select name="idMarca" class="form-control" required>
        <option value"">Seleccionar una categoria</option>
        <?php foreach ($listadoMarcas as $marca){?>
        <option <?php
                    if($marca['idMarca']==$detalleProducto['idMarca']){
                        echo'selected';
                    }?> 
                    value="<?php echo$marca['idMarca']?>"><?php echo$marca['mkNombre']?></option>	
    <?php } ?>
    </select>
    Categoria:<br>
    <select name="idCategoria" class="form-control" required>
        <option value"">Seleccionar una categoria</option>
        <?php foreach ($listadoCategorias as $categoria){?>
        <option <?php
                    if($categoria['idCategoria']==$detalleProducto['idCategoria']){
                        echo'selected';
                }?> 
                value="<?php echo$categoria['idCategoria']?>"><?php echo$categoria['catNombre']?></option>	
        <?php }?>
    </select> 
    <br>
    Presentacion:<br>
    <textarea name="prdPresentacion" class="form-control" required><?php echo$detalleProducto['prdPresentacion']?></textarea>
    <br>
    Stock:<br>
    <input type="number" name="prdStock" class="form-control" value="<?php echo$detalleProducto['prdStock']?>" required>
    <br>
    Imagen Actual:
    <img src="images/productos/<?php echo$detalleProducto['prdImagen']?>">
    <br>
    Imagen:<br>
    <input type="file" name="prdImagen" class="form-control">
    <br>
    <input type="hidden" name="idProducto" value="<?php echo$idProducto ?>">
    <input type="hidden" name="prdImagenOriginal" value="<?php echo$detalleProducto['prdImagen'] ?>">
    <input type="submit" value="Modificar Producto" class="btn btn-warning mb-3">
    <a href="adminProductos.php" class="btn btn-light mb-3">Volver al panel de Productos</a>
    </form>
</main>

<?php  include 'includes/footer.php';  ?>