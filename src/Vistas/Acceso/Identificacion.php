<section class="container">
    <div class="col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2">
        <h4>Acceso</h4>
        <form method="post" novalidate>
            <!-- EMAIL -->
            <div class="form-group my-0">
                <label for="email" class="mb-0">Correo electrónico:</label>
                <input class=" form-control" id="email" name="email" type="email">
            </div>
            <!-- CONTRASEÑA -->
            <div class="form-group my-0">
                <label for="contrasena" class="mb-0">Contraseña:</label>
                <input class=" form-control" id="contrasena" name="contrasena" type="password">
            </div>
            <?php if (Sesion::existeError("cuenta")): ?>
                <div>
                    <p class="error"><?php echo(Sesion::obtenerError("cuenta")); ?></p>
                </div>
            <?php endif; ?>
            <div class="form-group my-2">
                <input type="submit" class="btn btn-block btn-success" value="Identificarse">
            </div>
        </form>
        <a href="/registro" class="btn btn-block btn-sm btn-light">Registrarse</a>
    </div>
</section>
