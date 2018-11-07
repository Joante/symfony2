<?php  
		require 'config/config.php';
		$usuNombre = $_SESSION['usuNombre'];
		$usuApellido = $_SESSION['usuApellido'];
		$objUsuario = new Usuario;
		$objUsuario -> logout();
?>
<?php  include 'includes/header.html';  ?>
<?php  include 'includes/nav.php';  ?>

<main class="container">
    <h1>Salir del Sistema</h1>

    <div class="alert alert-sucess">
    	Gracias por su visita:<br>
    	<?php echo$usuNombre;?>
    	<?php echo$usuApellido;?>
    </div>

</main>

<?php  include 'includes/footer.php';  ?>