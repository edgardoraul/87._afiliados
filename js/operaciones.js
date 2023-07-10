$(document).ready(function() {
	$('#loginButton').click(function() {
	  var user = $('#user').val();
	  var clave = $('#clave').val();

	  $.ajax({
		type: 'POST',
		url: 'controller/loginController.php',
		data: {
		  user_php: user,
		  clave_php: clave
		},
		success: function(response) {
		  if (response === 'success') {
			// Las credenciales son válidas, redirige a la página de inicio
			alert('Usuario o contraseña incorrectos.');
		} else if (response === 'error_1') {
			// Uno o ambos campos están vacíos, muestra mensaje de error
			alert('Por favor, completa todos los campos.');
		} else if (response === 'error_2') {
			// Las credenciales son inválidas, muestra mensaje de error
			window.location.href = 'controller/redirec.php';
		  } else {
			// Respuesta desconocida, muestra mensaje de error genérico
			alert('Error desconocido. Por favor, intenta nuevamente.');
		  }
		},
		error: function() {
		  // Error en la petición Ajax, muestra mensaje de error
		  alert('Error en la conexión. Por favor, intenta nuevamente.');
		}
	  });
	});
  });
