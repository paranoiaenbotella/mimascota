<!--Form para crear roles-->
<section class="container">
    <div class="row">
        <div class="col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-4 offset-lg-4">
            <h4>Crear roles</h4>
            <form method="POST">
                <div class="form-group my-0">
                    <label for="nombre" class="mb-0">Rol:</label>
                    <input class="form-control form-control-sm" id="nombre" name="nombre" type="text">
                    <?php if (Sesion::existeError("nombreRol")): ?>
                        <div>
                            <p class="error"><?php echo(Sesion::obtenerError("nombreRol")); ?></p>
                        </div>
                    <?php elseif (Sesion::existeAcierto("succes")): ?>
                        <div>
                            <p class="succes"><?php echo(Sesion::obtenerAcierto("succes")); ?></p>
                        </div>
                    <?php endif; ?>
                    </div>
                    <div class="form-group my-2">
                        <input class="btn btn-block btn-success" type="submit" value="Guardar">
                    </div>               
            </form>
        </div>
    </div>
</section>