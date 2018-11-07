<?php
	require 'config/config.php';
?>
<?php  include 'includes/header.html';  ?>
<?php  include 'includes/nav.php';  ?>

<main class="container">
    <h1>Formulario de ingreso</h1>
	<form action="login.php" method="post">
		Usuario:<br>
		<input type="email" name="usuEmail" class="form-control">
		<br>
		Clave: <br>
		<input type="password" name="usuPass" class="form-control">
		<br>
		<input type="submit" name="Ingresar" class="btn btn-secondary">
	</form>
	
	<?php 
		if(isset($_GET['error'])){
			$error = $_GET['error'];
			if($error==2){
		?>
			<script>
				swal({
		  			title: 'Error!',
		  			text: 'Debe loguearse para ver el contenido',
		  			type: 'error',
		  			confirmButtonText: 'Aceptar'
				})
			</script>
	<?php
		}else if($error==1){
		?>
			<script>
				swal({
		  			title: 'Error!',
		  			text: 'Usuario y/o contraseña incorrectos',
		  			type: 'error',
		  			confirmButtonText: 'Aceptar'
		})
		</script>
		<?php
		}
	}
	?>
</main>

<?php  include 'includes/footer.php';  ?>