<!--Tabla con roles-->
<section class="container">
    <div class="row">
        <div class="col-sm-12 col-md-12  col-lg-12  shadow-sm p-3 mb-5 rounded">
            <h6 class="mb-3"> Animales:</h6>
            <table class="table table-sm table-hover border border-success">
                <thead>
                    <tr class="bg-success text-white">
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Tipo</th>
                        <th>Usuario</th>
                        <th colspan="2">Acción</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($datos["animales"] as $animal): ?>
                        <tr>
                            <td><?php echo $animal->obtenerId(); ?></td>
                            <td><?php echo $animal->obtenerNombre(); ?></td>
                            <?php foreach ($datos["animalTipos"] as $animalTipo): ?>
                                <?php if ($animal->obtenerAnimalTipo() === $animalTipo->obtenerId()): ?>
                                    <td><?php echo $animalTipo->obtenerNombre(); ?></td>
                                <?php endif; ?>
                            <?php endforeach; ?>
                            <td><?php echo $animal->obtenerUsuario(); ?></td>
                            <td>
                                <a href="/animales/editar/<?php echo($animal->obtenerId(
                                )); ?>" class="btn btn-sm btn-info">Editar
                                </a>
                            </td>
                            <td>
                                <a href="/animales/eliminar/<?php echo($animal->obtenerId(
                                )); ?>" class="btn btn-sm btn-danger">Eliminar</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <a href="/animales/crear" class="btn btn-sm btn-outline-success">Crear animal</a>
        </div>
    </div>
</section>
