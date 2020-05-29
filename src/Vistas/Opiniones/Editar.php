<!--Form para editar opinion-->
<section class="container">
    <div class="row">
        <div class="col-sm-10 offset-sm-1 col-md-10 offset-md-1 col-lg-10 offset-lg-1">
            <h4>Opinion</h4>
            <form method="POST">
                <!--NOMBRE-->
                <div class="form-group my-0">
                    <input type="text" name="anuncio" id="anuncio" value="<?php echo ($datos["opinion"]->obtenerAnuncio()); ?>" hidden>
                    <label for="mensaje" class="mb-0">Edita tu opinión</label>
                    <textarea class="form-control form-control-sm" id="mensaje" name="mensaje" rows="10" ><?php echo ($datos["opinion"]->obtenerMensaje()); ?></textarea>
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