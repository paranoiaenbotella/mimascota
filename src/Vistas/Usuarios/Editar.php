<!--Form para editar Usuarios-->
<section class="container">
    <div class="row">
        <div class="col-sm-10 offset-sm-1 col-md-10 offset-md-1 col-lg-6 offset-lg-3">
            <h4>Editar usuario</h4>
            <form method="POST" novalidate>
                <!--ID-->
                <div class="form-group mb-1">
                    <label for="id" class="mb-0">Id:</label>
                    <input class="form-control my-0" id="id" name="id" type="text" value="<?php echo($datos["usuario"]->obtenerId(
                    )); ?>" readonly>
                </div>
                <!--ROL-->
                <div class="form-group my-0">
                    <label for="rol" class="mb-0">Rol:</label>
                    <select class="form-control form-control-sm" name="rol" id="rol">
                        <?php foreach ($datos["roles"] as $rol): ?>
                        <?php if ($rol->obtenerId() === $datos["usuario"]->obtenerRol()): ?>
                        <option selected value="<?php echo($rol->obtenerId()); ?>">
                            <?php else: ?>
                            <option value="<?php echo($rol->obtenerId()); ?>">
                                <?php endif; ?>
                                <?php echo($rol->obtenerNombre()); ?>
                            </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <!--APELLIDOS-->
                    <div class="form-group mb-1">
                        <label for="apellidos" class="mb-0">Apellidos:</label>
                        <input class="form-control my-0" id="apellidos" name="apellidos" type="text" value="<?php echo($datos["usuario"]->obtenerApellidos(
                        )); ?>">
                    </div>
                    <!--NOMBRE-->
                    <div class="form-group mb-1">
                        <label for="nombre" class="mb-0">Nombre:</label>
                        <input class="form-control my-0" id="nombre" name="nombre" type="text" value="<?php echo($datos["usuario"]->obtenerNombre(
                        )); ?>">
                    </div>
                    <!--MÓVIL-->
                    <div class="form-group mb-1">
                        <label for="movil" class="mb-0">Móvil:</label>
                        <input class="form-control my-0" id="movil" name="movil" type="text" value="<?php echo($datos["usuario"]->obtenerMovil(
                        )); ?>">
                    </div>
                    <!--EMAIL-->
                    <div class="form-group mb-1">
                        <label for="email" class="mb-0">Email:</label>
                        <input class="form-control my-0" id="email" name="email" type="text" value="<?php echo($datos["usuario"]->obtenerEmail(
                        )); ?>">
                    </div>
                    <div class="input-group input-group-sm my-2">
                        <button class="btn btn-info btn-block btn-sm" type="submit">Guardar</button>
                    </div>      
                </div>
            </form>
        </div>
    </div>
</section>