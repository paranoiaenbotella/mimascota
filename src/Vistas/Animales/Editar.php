<!--Form para editar Roles-->
<section class="container">
    <div class="row">
        <div class="col-sm-10 offset-sm-1 col-md-10 offset-md-1 col-lg-6 offset-lg-3">
            <h4>Editar animales</h4>
            <form method="POST" novalidate>
                <div class="form-group mb-1">
                    <label for="nombre" class="mb-0">Nombre:</label>
                    <input class="form-control my-0" id="nombre" name="nombre" type="text" value="<?php echo($datos["animal"]->obtenerNombre()); ?>">
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
                    <div class="input-group input-group-sm my-2">
                        <button class="btn btn-info btn-block btn-sm" type="submit">Guardar</button>
                    </div>
                    <div class="input-group input-group-sm mt-4">
                     <a href="/animales" class="btn btn-block btn-sm btn-secondary">Regresar a la lista de animales</a>
                 </div>
                </div>
            </form>
        </div>
    </div>
</section>