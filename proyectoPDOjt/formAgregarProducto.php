<?php 
    require 'config/config.php';
   	$objMarca = new Marca;
    $listadoMarcas = $objMarca ->listarMarcas();
    $objCategoria = new Categoria;
    $listadoCategorias = $objCategoria-> listarCategorias();
?>
<?php  include 'includes/header.html';  ?>
<?php  include 'includes/nav.php';  ?>

<main class="container">
    <h1>Formulario para agregar un producto</h1>
    <form action="agregarProducto" method="post" enctype="multipart/form-data">
    Nombre: <br>
    <input type="text" name="prdNombre" class="form-control" required>
    <br>
    Precio:
     <div class="input-group mb-2">
            <div class="input-group-prepend">
                <div class="input-group-text">$</div>
            </div>
            <input type="text" name="prdPrecio" class="form-control" required>
        </div>
    <br>
    Marca:<br>
    <select name="idMarca" class="form-control" required>
        <option value"">Seleccionar una categoria</option>
        <?php foreach ($listadoMarcas as $marca){?>
        <option value="<?php echo $marca['idMarca']?>"><?php echo $marca['mkNombre']?></option>	
    <?php } ?>
    </select>
    Categoria:<br>
    <select name="idCategoria" class="form-control" required>
        <option value"">Seleccionar una categoria</option>
        <?php foreach ($listadoCategorias as $categoria){?>
        <option value="<?php echo $categoria['idCategoria']?>"><?php echo $categoria['catNombre']?></option>	
        <?php }?>
    </select> 
    <br>
    Presentacion:<br>
    <textarea name="prdPresentacion" class="form-control" required></textarea>
    <br>
    Stock:<br>
    <input type="number" name="prdStock" class="form-control" required>
    <br>
    Imagen:<br>
    <input type="file" name="prdImagen" class="form-control">
    <br>
    <input type="submit" value="Agregar Producto" class="btn btn-success mb-3">
    <a href="adminProductos.php" class="btn btn-light mb-3">Volver al panel de Productos</a>
    </form>
</main>

<?php  include 'includes/footer.php';  ?>