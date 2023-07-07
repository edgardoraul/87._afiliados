<?php require_once "../templates/header.php";

  session_start();

  // Validamos que exista una session y ademas que el cargo que exista sea igual a 1 (Administrador)
  if(!isset($_SESSION['cargo']) || $_SESSION['cargo'] != 2){
	header('location: ../../index.php');
  }

?>

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

<?php require_once "../templates/footer.php" ;?>