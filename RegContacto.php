<?php
require_once "ConContacto.php";

$nombre = $_POST['nombrecontacto'];
$telefono = $_POST['telefonocontacto'];

$insertar = mysqli_query($conn,"INSERT INTO contactos(nombrecontacto,telefonocontacto)VALUES(
    '$nombre',
    '$telefono'
)");

header("location: contactob.php");