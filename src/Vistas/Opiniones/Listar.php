<!--Tabla con opiniones-->
<section class="container">
    <div class="row">
        <div class="col-sm-12 col-md-12  col-lg-12  shadow-sm p-3 mb-5 rounded">
            <?php if ($datos["opiniones"]): ?>
            <h6 class="mb-1 mt-3"> Opiniones:</h6>
            <table class="table table-sm table-hover border border-success">
                <thead>
                    <tr class="bg-success text-white">
                        <th>Mensaje</th>
                        <th colspan="2">Acción</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($datos["opiniones"] as $opinion): ?>
                        <tr>
                            <td><?php echo $opinion->obtenerMensaje(); ?></td>
                            <td>
                                <a href="/opiniones/editar/<?php echo($opinion->obtenerId(
                                )); ?>" class="btn btn-sm btn-info">Editar
                                </a>
                            </td>
                            <td>
                                <a href="/opiniones/eliminar/<?php echo($opinion->obtenerId(
                                )); ?>" class="btn btn-sm btn-danger">Eliminar
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <?php else: ?>
            <p>No tiene opiniones definidas.</p>
        <?php endif; ?>
    </div>
</section>
