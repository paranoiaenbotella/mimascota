<!--Form para crear animales-->
<section class="container">
    <div class="row">
        <div class="col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-4 offset-lg-4">
            <h4>Crear Animales</h4>
            <form method="POST">
            	<div class="form-group my-0">
                    <label for="usuario" class="mb-0">Usuario:</label>
                    <select class="form-control form-control-sm" name="usuario" id="usuario">
                        <?php foreach ($datos["usuarios"] as $usuario): ?>
                            <option value="<?php echo($usuario->obtenerId()); ?>">
                                <?php echo($usuario->obtenerNombre()); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group my-0">
                    <label for="nombre" class="mb-0">Nombre animal:</label>
                    <input class="form-control form-control-sm" id="nombre" name="nombre" type="text">
                    <?php if (Sesion::existeError("nombreAnimal")): ?>
                        <div>
                            <p class="error"><?php echo(Sesion::obtenerError("nombreAnimal")); ?></p>
                        </div>
                    <?php elseif (Sesion::existeAcierto("succes")): ?>
                        <div>
                            <p class="succes"><?php echo(Sesion::obtenerAcierto("succes")); ?></p>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="form-group my-0">
                    <label for="tipoAnimal" class="mb-0">Tipo Animal:</label>
                    <select class="form-control form-control-sm" name="tipoAnimal" id="tipoAnimal">
                        <?php foreach ($datos["animalesTipo"] as $animalTipo): ?>
                            <option value="<?php echo($animalTipo->obtenerId()); ?>">
                                <?php echo($animalTipo->obtenerNombre()); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group my-2">
                        <input class="btn btn-block btn-success" type="submit" value="Crear">
                </div>
            </form>
        </div>
    </div>
</section>