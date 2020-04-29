<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <title>MiMascota</title>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <form method="POST" novalidate>
                        <div class="row">
                            <div class="col-md-2 col-xl-4">
                                <label for="nombre">Nombre:</label>
                            </div>
                            <div class="col-md-2 col-xl-8">
                                <input id="nombre" name="nombre" type="text">
                            </div>
                        </div>
                        <?php if (Sesion::existeError("nombre")): ?>
                            <div>
                                <p><?php echo(Sesion::obtenerError("nombre")); ?></p>
                            </div>
                        <?php endif; ?>
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
                                    <option value="<?php echo($rol->obtenerId()); ?>"><?php echo($rol->obtenerNombre(
                                        )); ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div>
                            <input type="submit" value="Registrarse">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    </body>
</html>
