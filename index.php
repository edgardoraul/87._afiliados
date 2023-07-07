<?php require_once "./templates/header.php" ;

  /*
	En ocasiones el usuario puede volver al login
	aun si ya existe una sesion iniciada, lo correcto
	es no mostrar otra ves el login sino redireccionarlo
	a su pagina principal mientras exista una sesion entonces
	creamos un archivo que controle el redireccionamiento
  */

	session_start();

	// isset verifica si existe una variable o eso creo xd
	if(isset($_SESSION['id']))
	{
		header('location: controller/redirec.php');
	}

?>


	<!--
		Las clases que utilizo en los divs son propias de Bootstrap
		si no tienes conocimiento de este framework puedes consultar la documentacion en
		https://v4-alpha.getbootstrap.com/getting-started/introduction/
	-->


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
				<input type="password" autocomplete="on" class="form-control" id="clave" placeholder="*******" />
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

	<?php require_once "./templates/footer.php" ;?>
