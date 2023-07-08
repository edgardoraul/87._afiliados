<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Whisky Lovers Afiliados V.I.P.</title>
		<link rel="shortcut icon" href="./img/favicon.ico" type="image/x-icon" />
		<!-- Importamos los estilos de Bootstrap -->
		<link rel="stylesheet" href="./css/bootstrap.min.css">
		<!-- Font Awesome: para los iconos -->
		<link rel="stylesheet" href="./css/font-awesome.min.css">
		<!-- Sweet Alert: alertas JavaScript presentables para el usuario (más bonitas que el alert) -->
		<link rel="stylesheet" href="./css/sweetalert.css">
		<!-- Estilos personalizados: archivo personalizado 100% real no feik -->
		<link rel="stylesheet" href="./css/style.css">

	</head>
	<body>


<?php
session_start();

if (isset($_SESSION['id'])) {
	header('location: controller/redirec.php');
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$username = $_POST['user'];
	$password = $_POST['clave'];

	// Ruta del archivo de texto plano
	$archivo = './db/archivo.txt';

	// Verificar las credenciales en el archivo de texto plano
	$credenciales_validas = false;
	$handle = fopen($archivo, 'r');
	if ($handle) {
		while (($line = fgets($handle)) !== false) {
			$line = trim($line);
			$credentials = explode(',', $line);
			$stored_username = $credentials[0];
			$stored_password = $credentials[1];

			// Verificar si las credenciales coinciden
			if ($username === $stored_username && $password === $stored_password) {
				$credenciales_validas = true;
				break;
			}
		}
		fclose($handle);
	}

	if ($credenciales_validas) {
		// Las credenciales son válidas, se inicia la sesión y se redirige al usuario
		$_SESSION['id'] = $stored_username; // Aquí puedes asignar el valor deseado para 'id'
		header('location: controller/redirec.php');
		exit();
	} else {
		// Las credenciales son inválidas, muestra un mensaje de error
		echo '<div class="alert alert-danger">Usuario o contraseña incorrectos</div>';
	}
}
?>

<!-- Resto del formulario HTML -->
<div class="container">
	<!-- Formulario Login -->
<div class="container">
	  <div class="row">
		<div class="col-xs-12 col-md-4 col-md-offset-4">
			<div class="center">
				<img class="center" src="./img/logo.jpg" alt="Logotipo de Whisky Lovers Mendoza" />
			</div>

		<!-- Estructura del formulario -->
		<fieldset>
			<legend class="center">Sector de Afiliados Autorizados</legend>

			<!-- Caja de texto para usuario -->
			<label class="sr-only" for="user">Usuario</label>
			<div class="input-group">
				<div class="input-group-addon"><i class="fa fa-user"></i></div>
				<input type="number" autocomplete="on" class="form-control" id="user" placeholder="DNI/Passport/RUT/NIF" />
			</div>

			<!-- Div espaciador -->
			<div class="spacing-2"></div>

			<!-- Caja de texto para la clave-->
			<label class="sr-only" for="clave">Contraseña</label>
			<div class="input-group">
				<div class="input-group-addon"><i class="fa fa-lock"></i></div>
				<input type="password" autocomplete="on" class="form-control" id="clave" placeholder="Ingresa tu contraseña" />
			</div>

			<!-- Animacion de load (solo sera visible cuando el cliente espere una respuesta del servidor )-->
			<div class="row" id="load" hidden="hidden">
				<div class="col-xs-4 col-xs-offset-4 col-md-2 col-md-offset-5">
					<img src="./img/load.gif" width="100%" alt="Animación .gif de cargar y validación de contenido" />
				</div>
				<div class="col-xs-12 center text-accent">
					<span>Validando información...</span>
				</div>
			</div>
			<!-- Fin load -->

			<!-- boton #login para activar la funcion click y enviar el los datos mediante ajax -->
			<div class="row">
				<div class="col-xs-8 col-xs-offset-2">
					<div class="spacing-2"></div>
					<button type="button" class="btn btn-primary btn-block" name="button" id="loginButton">Iniciar sesion</button>
				</div>
			</div>

			<section class="text-accent center">
				<div class="spacing-2"></div>
			</section>

			</fieldset>
		</div>
		</div>
	</div>

</div>

	<!-- Jquery -->
	<script src="./js/jquery.js"></script>
	<!-- Bootstrap js -->
	<script src="./js/bootstrap.min.js"></script>
	<!-- SweetAlert js -->
	<script src="./js/sweetalert.min.js"></script>
	<!-- Js personalizado -->
	<script src="./js/operaciones.js"></script>
</body>
</html>