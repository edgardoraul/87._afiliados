<?php

// Leemos las variables enviadas mediante Ajax
$user = $_POST['user_php'];
$clave = $_POST['clave_php'];

// Verificamos que los campos no estén vacíos
if(empty($user) || empty($clave)){
  // Mostramos el mensaje de error
  echo 'error_1';
} else {
  // Realizamos cualquier lógica adicional que necesites aquí
  // Por ejemplo, puedes verificar las credenciales en un archivo de texto plano o en una base de datos

  // Ejemplo: Verificar las credenciales en un archivo de texto plano
  $archivo = './db/archivo.txt';
  $credenciales_validas = false;
  $handle = fopen($archivo, 'r');
  if ($handle) {
    while (($line = fgets($handle)) !== false) {
      $line = trim($line);
      $credentials = explode(',', $line);
      $stored_username = $credentials[0];
      $stored_password = $credentials[1];

      // Verificar si las credenciales coinciden
      if ($user === $stored_username && $clave === $stored_password) {
        $credenciales_validas = true;
        break;
      }
    }
    fclose($handle);
  }

  if ($credenciales_validas) {
    // Las credenciales son válidas, muestra un mensaje de éxito
    echo 'success';
  } else {
    // Las credenciales son inválidas, muestra un mensaje de error
    echo 'error_2';
  }
}

?>
