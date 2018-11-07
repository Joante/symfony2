<?php 
    require 'config/config.php';
    require 'autenticar.php';
    $objCategoria = new Categoria;
    $listadoCategorias = $objCategoria ->listarCategorias();
?>
<?php  include 'includes/header.html';  ?>
<?php  include 'includes/nav.php';  ?>

<main class="container">
    <h1>Panel de administracion de Categorias</h1>
        <table class="table table-stripped table-hover table-border">
        <thead class="thead-dark">
        <tr>
            <th>Id</th>
            <th>Categoria</th>
            <th colspan="2"><a href="formAgregarMarca.php" class="btn btn-light">Agregar</a></th>
        </tr>
        </thead>
        <tbody>
            <?php
                foreach ( $listadoCategorias as $categoria){
            ?>   
                <tr>
                    <td><?php echo$categoria['idCategoria'];?></td>
                    <td><?php echo$categoria["catNombre"];?></td>
                     <td><a href="formEditarCategoria.php?idCategoria=<?php echo$categoria["idCategoria"];?>" class="btn btn-light">Modificar</a></td>
                <td><a href="formBorrarCategoria.php?idCategoria=<?php echo$categoria["idCategoria"];?>" class="btn btn-light">Eliminar</a></td>
               </tr>     
               <?php 
                    }
                ?>
        </tbody>
    </table>
</main>
<?php  include 'includes/footer.php';  ?>