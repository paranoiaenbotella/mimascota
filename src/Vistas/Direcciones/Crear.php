<!--Form para crear direcciones-->
<section class="container">
    <div class="row">
        <div class="col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-4 offset-lg-4">
            <h4>Dirección:</h4>
            <form method="POST">
                <div class="form-group my-0">
                    <!--PAÍS-->
                    <label for="pais" class="mb-0">País:</label>
                    <?php if (Sesion::existeFormulario("pais")):?>
                    <?php if (Sesion::existeError("pais")):?>
                    <input class="form-control form-control-sm is-invalid" id="pais" name="pais" type="text" value="<?php echo(Sesion::obtenerFormulario("pais"));?>">
                    <div class="invalid-feedback">
                        <?php echo (Sesion::obtenerError("pais"));?>
                    </div>
                    <?php else: ?>
                    <input class="form-control form-control-sm is-valid" id="pais" name="pais" type="text" value="<?php echo(Sesion::obtenerFormulario("pais")); ?>">
                    <?php endif; ?>
                    <?php else: ?>
                    <?php if (Sesion::existeError("pais")): ?>
                    <input class="form-control form-control-sm is-invalid" id="pais" name="pais" type="text">
                    <div class="invalid-feedback">
                        <?php echo(Sesion::obtenerError("pais")); ?>
                    </div>
                    <?php else: ?>
                    <input class="form-control form-control-sm" id="pais" name="pais" type="text">
                    <?php endif; ?>
                    <?php endif; ?>
                </div>
                <!--CIUDAD-->
                <div class="form-group my-0">
                    <label for="ciudad" class="mb-0">Ciudad:</label>
                    <?php if (Sesion::existeFormulario("ciudad")):?>
                    <?php if (Sesion::existeError("ciudad")):?>
                    <input class="form-control form-control-sm is-invalid" id="ciudad" name="ciudad" type="text" value="<?php echo(Sesion::obtenerFormulario("ciudad"));?>">
                    <div class="invalid-feedback">
                        <?php echo (Sesion::obtenerError("ciudad"));?>
                    </div>
                    <?php else: ?>
                    <input class="form-control form-control-sm is-valid" id="ciudad" name="ciudad" type="text" value="<?php echo(Sesion::obtenerFormulario("ciudad")); ?>">
                    <?php endif; ?>
                    <?php else: ?>
                    <?php if (Sesion::existeError("ciudad")): ?>
                    <input class="form-control form-control-sm is-invalid" id="ciudad" name="ciudad" type="text">
                    <div class="invalid-feedback">
                        <?php echo(Sesion::obtenerError("ciudad")); ?>
                    </div>
                    <?php else: ?>
                    <input class="form-control form-control-sm" id="ciudad" name="ciudad" type="text">
                    <?php endif; ?>
                    <?php endif; ?>
                </div>
                <!--CODIGO POSTAL-->
                <div class="form-group my-0">
                    <label for="codigoPostal" class="mb-0">Código Postal:</label>
                    <?php if (Sesion::existeFormulario("codigoPostal")):?>
                    <?php if (Sesion::existeError("codigoPostal")):?>
                    <input class="form-control form-control-sm is-invalid" id="codigoPostal" name="codigoPostal" type="text" value="<?php echo(Sesion::obtenerFormulario("codigoPostal"));?>">
                    <div class="invalid-feedback">
                        <?php echo (Sesion::obtenerError("codigoPostal"));?>
                    </div>
                    <?php else: ?>
                    <input class="form-control form-control-sm is-valid" id="codigoPostal" name="codigoPostal" type="text" value="<?php echo(Sesion::obtenerFormulario("codigoPostal")); ?>">
                    <?php endif; ?>
                    <?php else: ?>
                    <?php if (Sesion::existeError("codigoPostal")): ?>
                    <input class="form-control form-control-sm is-invalid" id="codigoPostal" name="codigoPostal" type="text">
                    <div class="invalid-feedback">
                        <?php echo(Sesion::obtenerError("codigoPostal")); ?>
                    </div>
                    <?php else: ?>
                    <input class="form-control form-control-sm" id="codigoPostal" name="codigoPostal" type="text">
                    <?php endif; ?>
                    <?php endif; ?>
                </div>
                <!--CALLE-->
                <div class="form-group my-0">
                    <label for="calle
                        " class="mb-0">Calle
                    :</label>
                    <?php if (Sesion::existeFormulario("calle
                    ")):?>
                    <?php if (Sesion::existeError("calle
                    ")):?>
                    <input class="form-control form-control-sm is-invalid" id="calle
                    " name="calle
                    " type="text" value="<?php echo(Sesion::obtenerFormulario("calle
                    "));?>">
                    <div class="invalid-feedback">
                        <?php echo (Sesion::obtenerError("calle
                        "));?>
                    </div>
                    <?php else: ?>
                    <input class="form-control form-control-sm is-valid" id="calle
                    " name="calle
                    " type="text" value="<?php echo(Sesion::obtenerFormulario("calle
                    ")); ?>">
                    <?php endif; ?>
                    <?php else: ?>
                    <?php if (Sesion::existeError("calle
                    ")): ?>
                    <input class="form-control form-control-sm is-invalid" id="calle
                    " name="calle
                    " type="text">
                    <div class="invalid-feedback">
                        <?php echo(Sesion::obtenerError("calle
                        ")); ?>
                    </div>
                    <?php else: ?>
                    <input class="form-control form-control-sm" id="calle
                    " name="calle
                    " type="text">
                    <?php endif; ?>
                    <?php endif; ?>
                </div>
                <!--IMAGEN ?????????-->
                <div class="form-group mb-0">
                    <h5>Imágenes para</h5>
                   <label for ="imagen1">Imagen 1</label> 
                </div>
                <div class="form-group my-2">
                    <input class="btn btn-block btn-success" type="submit" value="Guardar">
                </div>
            </div>
        </form>
    </div>
</div>
</section>