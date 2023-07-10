<?php
session_start();

// Función para obtener los datos de usuario y contraseña desde el archivo "bd.txt"
function obtenerUsuarios() {
    $usuarios = [];
    $archivo = fopen('./db/db.txt', 'r');

    while (($linea = fgets($archivo)) !== false) {
        $campos = explode(',', $linea);
        $usuario = [
            'usuario' => trim($campos[0]),
            'contraseña' => trim($campos[1]),
            'nombre' => trim($campos[2])
        ];
        $usuarios[] = $usuario;
    }

    fclose($archivo);
    return $usuarios;
}

// Verificar si el usuario ya ha iniciado sesión
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true){
    // Redirigir al usuario a la página de ingreso correcto
    header("Location: index.php");
    exit;
}

// Verificar si se ha enviado el formulario de inicio de sesión
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $usuarios = obtenerUsuarios();
    $usuario_ingresado = $_POST['usuario'];
    $contraseña_ingresada = $_POST['contraseña'];

    // Verificar las credenciales del usuario
    foreach ($usuarios as $usuario) {
        if($usuario['usuario'] == $usuario_ingresado && $usuario['contraseña'] == $contraseña_ingresada){
            // Iniciar sesión
            $_SESSION['loggedin'] = true;
            $_SESSION['usuario'] = $usuario;

            // Redirigir al usuario a la página de ingreso correcto
            header("Location: ingreso_correcto.php");
            exit;
        }
    }

    // Mostrar mensaje de error
    $error = "Usuario o contraseña incorrectos";
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
	<title>Whisky Lovers Afiliados V.I.P.</title>
	<link rel="shortcut icon" href="./img/favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        .hidden-section {
            display: none;
        }
    </style>
</head>
<body>

	<div class="container">
		<div class="row justify-content-center">
			<header class="col-xs-12 col-md-4 col-md-offset-4">
				<img src="./img/logo.jpg" alt="Logotipo de Whisky Lovers Mendoza">
			</header>

		</div>
	</div>

    <div class="container hidden-section">
        <div class="row justify-content-center">
            <div class="col-md-6 mt-5 text-center">
                <h3>Bienvenido <?php echo $_SESSION['usuario']['nombre']; ?></h3>
                <img src="db/<?php echo $_SESSION['usuario']['usuario']; ?>.jpg" alt="Imagen de perfil de <?php echo $_SESSION['usuario']['nombre']; ?>" class="mt-3" />
                <form action="cerrarSesion.php" method="POST">
                    <button type="submit" class="btn btn-primary mt-3">Cerrar Sesión</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        <?php if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true){ ?>
            document.querySelector('.hidden-section').style.display = 'block';
        <?php } ?>
    </script>
</body>
</html>
