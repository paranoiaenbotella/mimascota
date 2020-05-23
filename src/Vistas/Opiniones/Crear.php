<!--Form para crear servicio-->
<section class="container">
    <div class="row">
        <div class="col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-4 offset-lg-4">
            <h4>Crear servicio</h4>
            <form method="POST">
                <!--NOMBRE-->
                <div class="form-group my-0">
                    <label for="mensaje" class="mb-0">Escribe tu opinión</label>
                    <input class="form-control form-control-sm" id="mensaje" name="mensaje" type="text" placeholder="Ej. Alojamiento Noche">
                    <?php if (Sesion::existeError("mensaje")): ?>
                        <div>
                            <p class="error"><?php echo(Sesion::obtenerError("mensaje")); ?></p>
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