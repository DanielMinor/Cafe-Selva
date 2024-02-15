<?php
// Obtener los datos del formulario
$usuario = $_POST['usuario'];
$contrasena = $_POST['contrasena'];

// Verificar las credenciales
if ($usuario == 'administrador' && $contrasena == 'asd') {
    // Redirigir al usuario administrador
    header('Location: admi.html');
    exit;
} elseif ($usuario == 'cliente' && $contrasena == '123') {
    // Redirigir al usuario normal
    header('Location: cliente.html');
    exit;
} else {
    // Credenciales incorrectas, redirigir de vuelta al formulario de inicio de sesión
    header('Location: failed.html');
    exit;
}
?>
