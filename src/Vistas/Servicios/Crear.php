<!--Form para crear servicio-->
<section class="container">
    <div class="row">
        <div class="col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-4 offset-lg-4">
            <h4>Crear Servicio</h4>
            <form method="POST">
                <!--NOMBRE-->
                <div class="form-group my-0">
                    <label for="nombre" class="mb-0">Nombre servicio:</label>
                    <input class="form-control form-control-sm" id="nombre" name="nombre" type="text">
                    <?php if (Sesion::existeError("nombreServicio")): ?>
                        <div>
                            <p class="error"><?php echo(Sesion::obtenerError("nombreServicio")); ?></p>
                        </div>
                    <?php elseif (Sesion::existeAcierto("succes")): ?>
                        <div>
                            <p class="succes"><?php echo(Sesion::obtenerAcierto("succes")); ?></p>
                        </div>
                    <?php endif; ?>
                </div>
                <!--DESCRIPCIÓN-->
                <div class="form-group my-0">
                    <label for="descripcion" class="mb-0">Descripcion del servicio:</label>
                    <textarea class="form-control form-control-sm" id="descripcion" name="descripcion" rows="3"></textarea>
                    <?php if (Sesion::existeError("descripcionServicio")): ?>
                        <div>
                            <p class="error"><?php echo(Sesion::obtenerError("descripcionServicio")); ?></p>
                        </div>
                    <?php elseif (Sesion::existeAcierto("succes")): ?>
                        <div>
                            <p class="succes"><?php echo(Sesion::obtenerAcierto("succes")); ?></p>
                        </div>
                    <?php endif; ?>
                </div>
                 <!--PRECIO-->
                <div class="form-group my-0">
                    <label for="precio" class="mb-0">Precio del servicio:</label>
                    <input class="form-control form-control-sm" id="precio" name="precio" type="text">
                    <?php if (Sesion::existeError("precio")): ?>
                        <div>
                            <p class="error"><?php echo(Sesion::obtenerError("precio")); ?></p>
                        </div>
                    <?php elseif (Sesion::existeAcierto("succes")): ?>
                        <div>
                            <p class="succes"><?php echo(Sesion::obtenerAcierto("succes")); ?></p>
                        </div>
                    <?php endif; ?>
                </div>
                
                <div class="form-group my-2">
                        <input class="btn btn-block btn-success" type="submit" value="Crear">
                </div>
            </form>
        </div>
    </div>
</section>