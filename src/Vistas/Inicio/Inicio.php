<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <title>MiMascota</title>
    </head>
    <body>
        <?php if (Sesion::esInvitado()): ?>
            <p>Hola, señor Invitado.</p>
        <?php else: ?>
            <p>Hola, señor <?php echo(Sesion::obtenerUsuario()->obtenerApellidos()); ?>.</p>
        <?php endif; ?>
    </body>
</html>
