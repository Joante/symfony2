<?php 
    require 'config/config.php';
    $objProducto = new Producto();
    $chequeo = $objProducto -> editarProducto();
    $objMarca = new Marca;
    $detalleMarca = $objMarca -> verMarcaPorId($objProducto->getIdMarca());
    $objCategoria = new Categoria;
    $detalleCategoria = $objCategoria -> verCategoriaPorId($objProducto->getIdCategoria());
 ?>
<?php  include 'includes/header.html';  ?>
<?php  include 'includes/nav.php';  ?>

<main class="container">
    <?php
    	if($chequeo==0){?>
            <h1>Producto no modificado:</h1>
            <div class="alert alert-warning">
        Producto <span class="badge badge-pill badge-warning">
            <?php echo $objProducto-> getPrdNombre()?>
        </span>
        <br>
        Con el Id:<span class="badge badge-pill badge-warning">
            <?php echo $objProducto -> getIdProducto() ?>
        </span>
        <br>
        Precio <span class="badge badge-pill badge-warning">
            <?php echo $objProducto-> getPrdPrecio()?>
        </span>
        <br>
        Categoria <span class="badge badge-pill badge-warning">
            <?php echo$detalleCategoria->getCatNombre() ?>
        </span>
        <br>
        Marca <span class="badge badge-pill badge-warning">
            <?php echo$detalleMarca->getMkNombre() ?>
        </span>
        <br>
        Presentacion <span class="badge badge-pill badge-warning">
            <?php echo $objProducto-> getPrdPresentacion()?>
        </span>
        <br>
        Stock <span class="badge badge-pill badge-warning">
            <?php echo $objProducto-> getPrdStock()?>
        </span>
        <br>
        Imagen <span class="badge badge-pill badge-warning">
            <img style="width: 100px;" src="images/productos/<?php echo $objProducto->getPrdImagen()?>">
        </span>
        <br>
        Agregado con exito
        <br>
        <a href="adminProductos.php" class="btn btn-ligth">
            Volver a Admin productos
        </a>
        <a href="formAgregarProducto.php" class="btn btn-light">
            Agregar otro Producto
        </a>
        <a href="formEditarProducto.php?idProducto=<?php echo $objProducto->getIdProducto() ?>" class="btn btn-light">
            Editar este Producto
        </a>
    </div>
    	<?php }
        else{ ?>
            <h1>Producto Modificado:<h1>
            <div class="alert alert-sucess">
        Producto <span class="badge badge-pill badge-sucess">
            <?php echo $objProducto-> getPrdNombre()?>
        </span>
        <br>
        Con el Id:<span class="badge badge-pill badge-sucess">
            <?php echo $objProducto -> getIdProducto() ?>
        </span>
        <br>
        Precio <span class="badge badge-pill badge-sucess">
            <?php echo $objProducto-> getPrdPrecio()?>
        </span>
        <br>
        Categoria <span class="badge badge-pill badge-sucess">
            <?php echo$detalleCategoria->getCatNombre() ?>
        </span>
        <br>
        Marca <span class="badge badge-pill badge-sucess">
            <?php echo$detalleMarca->getMkNombre() ?>
        </span>
        <br>
        Presentacion <span class="badge badge-pill badge-sucess">
            <?php echo $objProducto-> getPrdPresentacion()?>
        </span>
        <br>
        Stock <span class="badge badge-pill badge-sucess">
            <?php echo $objProducto-> getPrdStock()?>
        </span>
        <br>
        Imagen <span class="badge badge-pill badge-sucess">
            <img style="width: 100px;" src="images/productos/<?php echo $objProducto->getPrdImagen()?>">
        </span>
        <br>
        Agregado con exito
        <br>
        <a href="adminProductos.php" class="btn btn-ligth">
            Volver a Admin productos
        </a>
        <a href="formAgregarProducto.php" class="btn btn-light">
            Agregar otro Producto
        </a>
        <a href="formEditarProducto.php?idProducto=<?php echo $objProducto->getIdProducto() ?>" class="btn btn-light">
            Editar este Producto
        </a>
    </div>
        <?php }
    ?>
    
</main>

<?php  include 'includes/footer.php';  ?>