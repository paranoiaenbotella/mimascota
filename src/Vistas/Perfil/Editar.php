<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <title>MiMascota</title>
    </head>
    <body>
        <pre><?php var_dump($usuario); ?></pre>
        <form method="post" enctype="multipart/form-data">
            <div>
                <label for="nombre">Nombre:</label>
                <input id="nombre" name="nombre" type="text" value="<?php echo($usuario->obtenerNombre()); ?>">
            </div>
            <div>
                <label for="imagen">Imagen de Perfil:</label>
                <?php if ($usuario->obtenerImagen() === "No definido."): ?>
                    <img alt="<?php echo($usuario->obtenerImagen()); ?>" src="<?php echo($usuario->obtenerImagen()); ?>">
                <?php endif; ?>
                <input id="imagen" name="imagen" type="file">
            </div>
            <div>
                <input type="submit" value="Guardar">
            </div>
        </form>
    </body>
</html>
