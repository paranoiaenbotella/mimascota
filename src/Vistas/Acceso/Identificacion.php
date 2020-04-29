<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <title>MiMascota.com</title>
    </head>
    <body>
        <form method="post" novalidate>
            <?php if (Sesion::existeError("credenciales")): ?>
                <div>
                    <p><?php echo(Sesion::obtenerError("credenciales")); ?></p>
                </div>
            <?php endif; ?>
            <div>
                <label for="email">Correo:</label>
                <input id="email" name="email" placeholder="Introduzca su Correo" type="email">
            </div>
            <div>
                <label for="contrasena">Contraseña:</label>
                <input id="contrasena" name="contrasena" placeholder="Introdzca su Contraseña" type="password">
            </div>
            <div>
                <input type="submit" value="Identificarse">
            </div>
        </form>
    </body>
</html>
