<!--Form para editar direcciones-->
<section class="container">
    <div class="row">
        <div class="col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-4 offset-lg-4">
            <h4> Editar direcciones:</h4>
            <form method="POST" novalidate>
                <div class="form-group my-0">
                    <!-- USUARIO-->
                    <label for="usuario" class="mb-0">Usuario:</label>
                    <input class="form-control form-control-sm " id="usuario" name="usuario" type="text" value="<?php echo($datos["direccion"]->obtenerUsuario()); ?>" readonly>
                </div>
                <?php if (Sesion::existeError("usuario")): ?>
                <div>
                    <p class="error"><?php echo(Sesion::obtenerError("usuario")); ?></p>
                </div>
                <?php endif; ?>
                <!--PAÍS-->
                <label for="pais" class="mb-0">País:</label>
                <input class="form-control form-control-sm " id="pais" name="pais" type="text" value="<?php echo($datos["direccion"]->obtenerPais()); ?>">
            <?php if (Sesion::existeError("pais")): ?>
            <div>
                <p class="error"><?php echo(Sesion::obtenerError("pais")); ?></p>
            </div>
            <?php endif; ?>
            
            <!--CIUDAD-->
            <div class="form-group my-0">
                <label for="ciudad" class="mb-0">Ciudad:</label>
                <input class="form-control form-control-sm" id="ciudad" name="ciudad" type="text" value="<?php echo($datos["direccion"]->obtenerCiudad()); ?>">
            </div>
            <?php if (Sesion::existeError("ciudad")): ?>
            <div>
                <p class="error"><?php echo(Sesion::obtenerError("ciudad")); ?></p>
            </div>
            <?php endif; ?>
            
            
            <!--CODIGO POSTAL-->
            <div class="form-group my-0">
                <label for="codigoPostal" class="mb-0">Código Postal:</label>
                <input class="form-control form-control-sm" id="codigoPostal" name="codigoPostal" type="text" value="<?php echo($datos["direccion"]->obtenerCodigoPostal()); ?>">
            </div>
            <?php if (Sesion::existeError("codigoPostal")): ?>
            <div>
                <p class="error"><?php echo(Sesion::obtenerError("codigoPostal")); ?></p>
            </div>
            <?php endif; ?>
            
            <!--CALLE-->
            <div class="form-group my-0">
                <label for="calle" class="mb-0">Calle:</label>
                <input class="form-control form-control-sm" id="calle" name="calle" type="text" value="<?php echo($datos["direccion"]->obtenerCalle()); ?>">
            </div>
            <?php if (Sesion::existeError("calle")): ?>
            <div>
                <p class="error"><?php echo(Sesion::obtenerError("calle")); ?></p>
            </div>
            <?php endif; ?>
            
            <div class="form-group my-2">
                <input class="btn btn-block btn-success" type="submit" value="Guardar">
            </div>
            <div class="input-group input-group-sm mt-4">
                <a href="/direcciones" class="btn btn-block btn-sm btn-secondary">Regresar a la lista de direcciones</a>
            </div>
        </form>
    </div>
</div>
</section>