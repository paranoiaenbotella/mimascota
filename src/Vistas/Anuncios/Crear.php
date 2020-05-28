<!--Crear anuncio-->
<section class="container">
    <div class="row">
        <div class="col-sm-12  col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="mb-1">Crear anuncio</h4>
                    <p class="text-muted mb-1"> Para poder crear un anuncio se necesita haber creado previamente los servicios oportunos.</p>
                </div>
                <div class="card-body">
                    <form class="row" enctype="multipart/form-data" method="post">
                        <div class="col-lg-6">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group my-0">
                                        <label for="nombre" class="mb-0">Nombre del Anuncio:</label>
                                        <input class="form-control form-control-sm" id="nombre" name="nombre" type="text" placeholder="Ej. Cuidador en Zona Sur de Barcelona">
                                        <?php if (Sesion::existeError(
                                            "descripcionAnuncio"
                                        )): // IMPROVE: Change the error detection. ?>
                                            <div>
                                                <p class="error"><?php echo(Sesion::obtenerError(
                                                        "descripcionAnuncio"
                                                    )); ?></p>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <!--DESCRIPCIÓN CUIDADOR-->
                                    <div class="form-group my-0">
                                        <label for="descripcion" class="mb-0">Sobre el cuidador y alojamiento:</label>
                                        <textarea class="form-control form-control-sm" id="descripcion" name="descripcion" rows="4" placeholder="Descripción del cuidador y el entorno donde alojara las mascotas si es el caso."></textarea>
                                        <?php if (Sesion::existeError("descripcionAnuncio")): ?>
                                            <div>
                                                <p class="error"><?php echo(Sesion::obtenerError(
                                                        "descripcionAnuncio"
                                                    )); ?></p>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group my-0">
                                        <label for="animal-tipos" class="mb-0">Tipos de Animales:</label>
                                        <select class="form-control form-control-sm" multiple name="animal-tipos[]" id="animal-tipos">
                                            <?php foreach ($datos["animalTipos"] as $animalTipo): ?>
                                                <option value="<?php echo($animalTipo->obtenerId()); ?>">
                                                    <?php echo($animalTipo->obtenerNombre()); ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group my-0">
                                        <label for="servicios" class="mb-0">Servicios:</label>
                                        <select class="form-control form-control-sm" multiple name="servicios[]" id="servicios">
                                            <?php foreach ($datos["servicios"] as $servicio): ?>
                                                <option value="<?php echo($servicio->obtenerId()); ?>">
                                                    <?php echo($servicio->obtenerNombre()); ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <p class="text-muted"><small> Para poder seleccionar varios valores pulse CTRL + click izquierdo en la opción deseada.</small></p>
                        </div>
                        <div class="col-lg-6">
                            <div class="row">
                                <div class="col-lg-12">
                                    <!--PRIMERA IMAGEN CAROUSEL-->
                                    <div class="form-group mb-2">
                                        <label for="imagen1" class="mb-0"> Imagen1:</label>
                                        <input type="file" class="form-control form-control-sm" name="imagen1">
                                    </div>
                                    <!--SEGUNDA IMAGEN CAROUSEL-->
                                    <div class="form-group mb-2">
                                        <label for="imagen2" class="mb-0"> Imagen 2:</label>
                                        <input type="file" class="form-control form-control-sm " name="imagen2">
                                    </div>
                                    <!--TERCERA IMAGEN CAROUSEL-->
                                    <div class="form-group mb-2">
                                        <label for="imagen3" class="mb-0"> Imagen 3:</label>
                                        <input type="file" class="form-control form-control-sm " name="imagen3">
                                    </div>
                                    <!--CUARTA IMAGEN CAROUSEL-->
                                    <div class="form-group mb-2">
                                        <label for="imagen4" class="mb-0"> Imagen 4:</label>
                                        <input type="file" class="form-control form-control-sm" name="imagen4">
                                    </div>
                                    <p class="text-muted mb-1"><small> Si quiere mostrar el espacio de alojamiento suba imagenes.</small></p>
                                    <p class="text-muted mb-1"><small> Los formatos admitidos son png y jpeg.</small></p>
                                    <div class="input-group my-2">
                                        <button class="btn btn-success" type="submit">Guardar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
