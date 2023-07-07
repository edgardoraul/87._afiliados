<?php require_once "../templates/header.php" ;

  // Se prendio esta mrd :v
  session_start();


  // Validamos que exista una session y ademas que el cargo que exista sea igual a 1 (Administrador)
  if(!isset($_SESSION['cargo']) || $_SESSION['cargo'] != 1){
	  /*
	  Para redireccionar en php se utiliza header,
	  pero al ser datos enviados por cabereza debe ejecutarse
	  antes de mostrar cualquier informacion en el DOM es por eso que inserto este
	  codigo antes de la estructura del html, espero haber sido claro
	  */
	  header('location: ../../index.php');
	}

?>


	<div class="container">
		<div class="row justify-content-center align-items-center">
		<div class="col-xs-12 col-md-4 col-md-offset-4 center">
			<!-- Margen superior (css personalizado )-->
			<div class="spacing-2"></div>
			<!-- ucfirst convierte la primera letra en mayusculas de una cadena -->
			<h4>Hola administrador <span class="btn btn-danger"><?php echo ucfirst($_SESSION['nombre']); ?></span></h4>

			<!-- La tarjeta de Afiliado -->
			<div class="center">
				<img src="../../img/afiliado.jpg" alt="Afiliado" />
			</div>

			<div class="spacing-2"></div>
			<a href="../../controller/cerrarSesion.php">
				<button type="button" type="button" class="btn btn-primary" name="button">Cerrar sesión</button>
			</a>
			<div class="spacing-1"></div>
		</div>
	</div>
</div>

<?php require_once "../templates/footer.php" ;?>

