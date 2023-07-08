<?php

  session_start();

  // Validamos que exista una session
	header('location: ../../index.php');


?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Whisky Lovers Afiliados</title>
	<link rel="shortcut icon" href="../../img/favicon.ico" type="image/x-icon" />
	<!-- Importamos los estilos de Bootstrap -->
	<link rel="stylesheet" href="../../css/bootstrap.min.css">
	<!-- Font Awesome: para los iconos -->
	<link rel="stylesheet" href="../../css/font-awesome.min.css">
	<!-- Sweet Alert: alertas JavaScript presentables para el usuario (más bonitas que el alert) -->
	<link rel="stylesheet" href="../../css/sweetalert.css">
	<!-- Estilos personalizados: archivo personalizado 100% real no feik -->
	<link rel="stylesheet" href="../../css/style.css">

</head>
<body>
<div class="container">
		<div class="row justify-content-center align-items-center">
		<div class="col-xs-12 col-md-4 col-md-offset-4 center">
			<!-- Margen superior (css personalizado )-->
			<div class="spacing-2"></div>
			<!-- ucfirst convierte la primera letra en mayusculas de una cadena -->
			<h4>Hola usuario estandar <span class="btn btn-danger"><?php echo ucfirst($_SESSION['nombre']); ?></span></h4>

			<!-- La tarjeta de Afiliado -->
			<div class="center">
				<img src="../../img/afiliado.jpg" alt="Afiliado" />
			</div>

			<div class="spacing-2"></div>
			<a href="../../controller/cerrarSesion.php">
				<button type="button" class="btn btn-primary" name="button">Cerrar sesion</button>
			</a>
			<div class="spacing-1"></div>
		</div>
	</div>
</div>

	<!-- Jquery -->
	<script src="../../js/jquery.js"></script>
	<!-- Bootstrap js -->
	<script src="../../js/bootstrap.min.js"></script>
	<!-- SweetAlert js -->
	<script src="../../js/sweetalert.min.js"></script>
	<!-- Js personalizado -->
	<script src="../../js/operaciones.js"></script>
</body>
</html>