<section class="container">
    <div class="row">
        <div class="col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-4 offset-lg-4">
            <h4>Crear tipos de animales</h4>
            <form method="POST">
                <div class="form-group my-0">
                    <label for="nombre" class="mb-0">Tipo de animal:</label>
                    <input class="form-control form-control-sm" id="nombre" name="nombre" type="text">
                    <?php if (Sesion::existeError("nombreTipoAnimal")): ?>
                        <div>
                            <p class="error"><?php echo(Sesion::obtenerError("nombreTipoAnimal")); ?></p>
                        </div>
                    <?php elseif (Sesion::existeAcierto("succes")): ?>
                        <div>
                            <p class="succes"><?php echo(Sesion::obtenerAcierto("succes")); ?></p>
                        </div>
                    <?php endif; ?>
                    <div class="form-group my-2">
                        <input class="btn btn-block btn-success" type="submit" value="Crear">
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
