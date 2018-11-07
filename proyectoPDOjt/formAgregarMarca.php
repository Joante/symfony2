<?php 
    require 'config/config.php';
    
?>
<?php  include 'includes/header.html';  ?>
<?php  include 'includes/nav.php';  ?>

<main class="container">
    <h1>Formulario agregar marca:</h1>
    <form>
    	<input type="text" name="mkNombre" class="form-control" required>
    	<input type="submit" value="Agregar Marca" class="btn btn-success mb-3">
    	<a href="adminMarca.php" class="btn btn-light mb-3">Volver al panel de Productos</a>
    </form>
</main>

<?php  include 'includes/footer.php';  ?>