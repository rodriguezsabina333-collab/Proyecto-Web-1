<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <title>Registrate</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='../Estilo/style5.css'>
</head>
<body>
    <div class="Login-Contenedor">
        <form action="procesar_registro.php" method="POST">
            <h2>CREAR CUENTA</h2>
            <div class="Contenedor">
                <img src="../Assets/Usuario.png">
            </div>

            <label for="Nombre">Nombre</label>
            <input type="text" id="Nombre" name="Nombre" required>

            <label for="Apellido">Apellido</label>
            <input type="text" id="Apellido" name="Apellido" required>

            <label for="Contrasena">Contraseña</label>
            <input type="password" id="Contrasena" name="Contrasena" required>

            <label for="Correo">Correo</label>
            <input type="email" id="Correo" name="Correo" required>

            <label for="Telefono">Teléfono</label>
            <input type="text" id="Telefono" name="Telefono" required>

            <label for="Fechadenacimiento">Fecha de Nacimiento</label>
            <input type="date" id="Fechadenacimiento" name="Fechadenacimiento" required>

            <button type="submit">Registrar Usuario</button>
        </form>
    </div>
</body>
</html>
