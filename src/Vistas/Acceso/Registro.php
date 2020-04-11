<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <title>MiMascota</title>
    </head>
    <body>
        <form method="POST" novalidate>
            <div>
                <label for="nombre">Nombre:</label>
                <input id="nombre" name="nombre" type="text">
            </div>
            <div>
                <label for="appellidos">Apellidos:</label>
                <input id="appellidos" name="apellidos" type="text">
            </div>
            <div>
                <label for="email">Correo Electronico:</label>
                <input id="email" name="email" type="email">
            </div>
            <div>
                <label for="contrasena">Contraseña:</label>
                <input id="contrasena" name="contrasena" type="password">
            </div>
            <div>
                <label for="contrasena-verificada">Verificar Contraseña:</label>
                <input id="contrasena-verificada" name="contrasena-verificada" type="password">
            </div>
            <div>
                <label for="rol">Rol:</label>
                <select name="rol" id="rol">
                    <?php foreach ($roles as $rol): ?>
                        <option value="<?php echo($rol->obtenerId()); ?>"><?php echo($rol->obtenerNombre()); ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div>
                <input type="submit" value="Registrarse">
            </div>
        </form>
    </body>
</html>
