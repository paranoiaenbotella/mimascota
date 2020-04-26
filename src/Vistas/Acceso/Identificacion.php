<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <title>MiMascota.com</title>
    </head>
    <body>
        <form method="post" novalidate>
            <div>
                <label for="email">Correo:</label>
                <input id="email" name="email" placeholder="Introduzca su Correo" type="email">
            </div>
            <?php if (Sesion::obtenerError("correoElectronico")): ?>
                <p><?php echo(Sesion::obtenerError("correoElectronico")); ?></p>
            <?php endif; ?>
            <div>
                <label for="contrasena">Contraseña:</label>
                <input id="contrasena" name="contrasena" placeholder="Introdzca su Contraseña" type="password">
            </div>
            <?php if (Sesion::obtenerError("contrasena")): ?>
                <p><?php echo(Sesion::obtenerError("contrasena")); ?></p>
            <?php endif; ?>
            <div>
                <input type="submit" value="Identificarse">
            </div>
        </form>
    </body>
</html>
