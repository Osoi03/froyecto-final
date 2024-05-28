<?php 
require_once "conexform.php";

$nombre = $_POST['nombre'];
$email = $_POST['email'];
$usuario = $_POST['usuario'];
$contrasena = $_POST['contrasena'];

// Verificar si el correo electrónico ya está en uso
$check_email = mysqli_query($con, "SELECT * FROM usuario WHERE email='$email'");

if(mysqli_num_rows($check_email) > 0) {
    echo "
    <script>
    alert('Ya existe una persona con este correo');
    window.location = 'index.php';
    </script>
    ";
    exit;
} 

// Si el correo no está en uso, procede con la inserción
$query = "INSERT INTO usuario (nombre, email, usuario, contrasena) VALUES (
    '$nombre',
    '$email',
    '$usuario',
    '$contrasena'
)";

$insertar = mysqli_query($con, $query);

if($insertar) {
    echo "
    <script>
    alert('Registro exitoso');
    window.location = 'index.php';
    </script>
    ";
} else {
    echo "
    <script>
    alert('Error al registrar');
    window.location = 'index.php';
    </script>
    ";
}

