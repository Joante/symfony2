<?php 
	require 'config/config.php';
 	$objCategoria = new Categoria();
    $chequeo = $objCategoria -> agregarCategoria();
 ?>
<?php  include 'includes/header.html';  ?>
<?php  include 'includes/nav.php';  ?>

<main class="container">
    <h1>Alta de una nueva Categoria:</h1>
   <div class="alert alert-sucess">
    	Marca <span class="badge badge-pill badge-sucess">
    		<?php echo $objCategoria-> getCatNombre()	?>
    	</span>
    	Con el Id:<span class="badge badge-pill badge-sucess">
    		<?php echo $objCategoria->getIdCategoria() ?>
    	</span>Agregada con exito
    	<br>
    	<a href="adminMarcas.php" class="btn btn-ligth">
    		Volver a Admin Categoria
    	</a>
    	<a href="formAgregarMarca.php" class="btn btn-light">
    		Agregar otra Categoria
    	</a>
    	<a href="formEditarMarca.php?idCategoria=<?php echo$objCategoria->getIdCategoria() ?>" class="btn btn-light">
    		Editar esta Categoria
    	</a>
    </div>
</main>

<?php  include 'includes/footer.php';  ?>