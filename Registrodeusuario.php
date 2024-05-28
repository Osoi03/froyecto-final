<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Registro y Inicio de Sesión</title>
    <link rel="stylesheet" href="styles.css"> <!-- Archivo CSS existente -->

</head>
<body>
    <div class="form-container">
        <form action="reg.php" method="post" class="formulario registrar">
            <h2>Registrate</h2>
            <input type="text" name="nombre" placeholder="Ingrese el nombre">
            <input type="email" name="email" placeholder="Ingrese el email">
            <input type="text" name="usuario" placeholder="Ingrese el usuario">
            <input type="password" name="contrasena" placeholder="Ingrese una contraseña">
            <button type="submit">REGISTRAR</button>
        </form>

        <form action="iniciarsesion.php" method="post" class="formulario iniciar">
            <h2>Iniciar sesión</h2>
            <input type="email" name="email" placeholder="Ingrese el email">
            <input type="password" name="contrasena" placeholder="Ingrese la contraseña">
            <button type="submit">ENTRAR</button>
        </form>
    </div>
</body>
</html>