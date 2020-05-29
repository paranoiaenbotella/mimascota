<!--Tabla con anuncios-->
<section class="container">
    <div class="row">
        <div class="col-sm-12 col-md-12  col-lg-12  shadow-sm p-3 mb-5 rounded">
            <h6 class="mb-3">Anuncio:</h6>
            <?php if ($datos["anuncio"]): ?>
                <table class="table table-sm table-hover border border-success">
                    <thead>
                        <tr class="bg-success text-white">
                            <th>Nombre</th>
                            <th>Descripción</th>
                            <th>Fecha Creación</th>
                            <th colspan="2">Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?php echo $datos["anuncio"]->obtenerNombre(); ?></td>
                            <td><?php echo $datos["anuncio"]->obtenerDescripcion(); ?></td>
                            <td><?php echo $datos["anuncio"]->obtenerFecha(); ?></td>
                            <td>
                                <a href="/anuncios/editar/<?php echo($datos["anuncio"]->obtenerId(
                                )); ?>" class="btn btn-sm btn-info">Editar
                                </a>
                            </td>
                            <td>
                                <a href="/anuncios/eliminar/<?php echo($datos["anuncio"]->obtenerId(
                                )); ?>" class="btn btn-sm btn-danger">Eliminar
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            <?php else: ?>
                <p>No hay anuncio definidos.</p>
                <a href="/anuncios/crear" class="btn btn-sm btn-outline-success">Crear anuncio</a>
            <?php endif; ?>
        </div>
    </div>
</section>
