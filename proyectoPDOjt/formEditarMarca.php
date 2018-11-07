<?php 
    require 'config/config.php';
    $idMarca = $_GET['idMarca'];
    $objMarca = new Marca;
    $detalleMarca = $objMarca ->verMarcaPorId($idMarca); //$_GET['idMarca']
?>
<?php  include 'includes/header.html';  ?>
<?php  include 'includes/nav.php';  ?>

<main class="container">
    <h1>Modificar una Marca</h1>
    <value = "<?php echo $detalleMarca['mkNombre'];?>">
    <input type="hidden" name="idMarca" value="<?php echo $detalleMarca['idMarca'];?>">
    <input type="submit" value="Editar Marca" class="btn btn-success mb-3">
   	<a href="adminMarca.php" class="btn btn-light mb-3">Volver al panel de Marcas</a>
</main>

<?php  include 'includes/footer.php';  ?>