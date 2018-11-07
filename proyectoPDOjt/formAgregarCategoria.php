<?php 
	require 'config/config.php';
 ?>
<?php  include 'includes/header.html';  ?>
<?php  include 'includes/nav.php';  ?>

<main class="container">
    <h1>Formulario agregar Categoria:</h1>
    <form>
    	<input type="text" name="catNombre" class="form-control" required>
    	<input type="submit" value="Agregar Categoria" class="btn btn-success mb-3">
    	<a href="adminCategoria.php" class="btn btn-light mb-3">Volver al panel de Categorias</a>
    </form>
</main>

<?php  include 'includes/footer.php';  ?>