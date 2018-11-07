<?php 
    require 'config/config.php';
    $objProducto = new Producto();
    $chequeo = $objProducto -> agregarProducto();
   // $objMarca = new Marca;
   // $detalleMarca = $objMarca -> verMarcaPorId($idMarca);
    $objCategoria = new Categoria;
   // $detalleCategoria = $objCategoria -> verCategoriaPorId($idCategoria);
 ?>
<?php  include 'includes/header.html';  ?>
<?php  include 'includes/nav.php';  ?>

<main class="container">
    <h1>Alta de un nuevo producto:</h1>
    <?php
    	if($chequeo){

    	}
    ?>
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
            <?php //echo $detalleCategoria-> $catNombre?>
        </span>
        <br>
        Marca <span class="badge badge-pill badge-sucess">
            <?php //echo $detalleMarca-> $mkNombre?>
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
</main>

<?php  include 'includes/footer.php';  ?>