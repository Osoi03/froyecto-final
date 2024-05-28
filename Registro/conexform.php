<?php
$servername = "localhost"; //
$username = "root"; //
$password = ""; //
$dbname = "registro"; // Cambia esto al nombre de tu base de datos

// Crear la conexión
$con = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($con->connect_error) {
    die("Conexión fallida: " . $con->connect_error);
}
