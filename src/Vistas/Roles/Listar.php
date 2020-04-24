<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <title>MiMascota.com</title>
    </head>
    <body>
        <table>
            <caption>Lista con los tipos de roles registrados en la base de datos</caption>
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($roles as $rol): ?>
                    <tr>
                        <td><?php echo $rol->obtenerId(); ?></td>
                        <td><?php echo $rol->obtenerNombre(); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </body>
</html>
