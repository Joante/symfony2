<?php
	//directiva de sesion	
	session_start();
	if (isset($_GET['movie'])) {
		$_SESSION['movie'] = $_GET['movie'];
	}
?>