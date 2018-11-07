<?php 
    require 'config/config.php';
    require 'autenticar.php';
    $objProducto = new Producto;
    $listadoProductos = $objProducto ->listarProductos();
?>
<?php  include 'includes/header.html';  ?>
<?php  include 'includes/nav.php';  ?>

<main class="container">
    <h1>Panel de administracion de Productos;</h1>
    <table class="table table-stripped table-hover table-border">
        <thead class="thead-dark">
        <tr>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Marca</th>
            <th>Categoria</th>
            <th>Presentacion</th>
            <th>Stock</th>
            <th>Imagen</th>
            <th colspan="2"><a href="formAgregarProducto.php" class="btn btn-light">Agregar</a></th>
        </tr>
        </thead>
        <tbody>
            <?php
                foreach ( $listadoProductos as $producto){
            ?>   
                <tr>
                    <td><?php echo $producto["prdNombre"];?></td>
                    <td><?php echo $producto["prdPrecio"];?></td>
                    <td><?php echo $producto["mkNombre"];?></td>
                    <td><?php echo $producto["catNombre"];?></td>
                    <td><?php echo $producto["prdPresentacion"];?></td>
                    <td><?php echo $producto["prdStock"];?></td>
                    <td><img style="width: 100px;" src="images/productos/<?php echo $producto["prdImagen"];?>"></td>
                    <td><a href="formEditarProducto.php?idProducto=<?php echo$producto["idProducto"];?>" class="btn btn-light">Modificar</a></td>
                <td><a href="formBorrarProducto.php?idProducto=<?php echo$producto["idProducto"];?>" class="btn btn-light">Eliminar</a></td>
               </tr>     
               <?php 
                    }
                ?>

        </tbody>
    
    </table>

</main>

<?php  include 'includes/footer.php';  ?>