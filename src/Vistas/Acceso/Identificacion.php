<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" href="/css/style.css">
        <title>MiMascota.com</title>
    </head>
    <body>
        <section class="container">
         <div class="col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-4 offset-lg-4">
         <h4>Acceso</h4>   
        <form method="post" novalidate>
            <!-- EMAIL -->
            <div class="form-group my-0">
                <label for="email" class="mb-0">Correo electrónico:</label>
                <input class =" form-control form-control-sm" id="email" name="email" type="email">
            </div>
            <!-- CONTRASEÑA -->
            <div class="form-group my-0">
                <label for="contrasena" class="mb-0">Contraseña:</label>
                <input class =" form-control form-control-sm" id="contrasena" name="contrasena" type="password">
            </div>
            <?php if (Sesion::existeError("cuenta")): ?>
                <div>
                    <p class ="error"><?php echo(Sesion::obtenerError("cuenta")); ?></p>
                </div>
            <?php endif; ?>
            <div class="form-group my-2">
                <input type="submit" class ="btn btn-block btn-success" value="Identificarse">
            </div>
        </form>
    </div>
        </section>
    </body>
</html>
