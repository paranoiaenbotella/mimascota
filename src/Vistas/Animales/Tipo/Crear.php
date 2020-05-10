<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" href="/css/style.css">
        <title>MiMascota</title>
    </head>
    <body>
        <section class="container">
            <div class="row">
                <div class="col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-4 offset-lg-4">
                    <h4>Crear tipos de animales</h4>
                    <form method="POST">
                        <div class="form-group my-0">
                            <label for="nombre" class="mb-0">Tipo de animal:</label>
                            <input class ="form-control form-control-sm" id="nombre" name="nombre"  type="text">
                            <?php if (Sesion::existeError("nombreTipoAnimal")):?>
                            <div>
                                <p class="error"><?php echo(Sesion::obtenerError("nombreTipoAnimal"));?></p>
                            </div>
                            <?php elseif(Sesion::exiteAcierto("succes")): ?>
                            <div>
                                <p class="succes"><?php echo(Sesion::obtenerAcierto("succes"));?></p>
                            </div>
                            <?php else:?>
                            <?php endif; ?>
                            <div class="form-group my-2">
                                <input class ="btn btn-block btn-success"type="submit" value="Crear">
                            </div>
                        </form>
                    </div>
                </div>
            </section>          
        </body>
    </html>