<?php 
	require 'config/config.php';
	$idCategoria = $_GET['idCategoria'];
    $objCategoria = new Categoria;
    $detalleCategoria = $objCategoria ->verCategoriaPorId($idCategoria); //$_GET['idMarca']
?>
<?php  include 'includes/header.html';  ?>
<?php  include 'includes/nav.php';  ?>

<main class="container">
    <h1>Modificar una Categoria</h1>
    <value = "<?php echo $detalleCategoria['catNombre'];?>">
    <input type="hidden" name="idCategoria value="<?php echo $detalleCategoria['idCategoria'];?>">
    <input type="submit" value="Editar Categoria" class="btn btn-success mb-3">
    <a href="adminCategoria.php" class="btn btn-light mb-3">Volver al panel de Categoria</a>
</main>

<?php  include 'includes/footer.php';  ?>