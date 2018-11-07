<?php 
    require 'config/config.php';
    $objMarca = new Marca();
    $chequeo = $objMarca -> agregarMarca();
 ?>
<?php  include 'includes/header.html';  ?>
<?php  include 'includes/nav.php';  ?>

<main class="container">
    <h1>Alta de una nueva marca:</h1>
   <div class="alert alert-sucess">
    	Marca <span class="badge badge-pill badge-sucess">
    		<?php echo $objMarca-> getMkNombre()	?>
    	</span>
    	Con el Id:<span class="badge badge-pill badge-sucess">
    		<?php echo $objMarca->getIdMarca() ?>
    	</span>Agregada con exito
    	<br>
    	<a href="adminMarcas.php" class="btn btn-ligth">
    		Volver a Admin marcas
    	</a>
    	<a href="formAgregarMarca.php" class="btn btn-light">
    		Agregar otra Marca
    	</a>
    	<a href="formEditarMarca.php?idMarca=<?php echo$objMarca->getIdMarca() ?>" class="btn btn-light">
    		Editar esta Marca
    	</a>
    </div>
</main>

<?php  include 'includes/footer.php';  ?>