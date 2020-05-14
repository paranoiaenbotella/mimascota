<!--Tabla con roles-->
<section class="container">
    <div class="row">
        <div class="col-sm-12 col-md-12  col-lg-12  shadow-sm p-3 mb-5 rounded">
            <h6 class="mb-3"> Roles en la base de datos</h6>
            <table class="table table-sm table-hover border border-success">
                <thead>
                    <tr class="bg-success text-white">
                        <th>Id</th>
                        <th>Nombre</th>
                        <th colspan="2">Acción</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($datos["roles"] as $rol): ?>
                        <tr>
                            <td><?php echo $rol->obtenerId(); ?></td>
                            <td><?php echo $rol->obtenerNombre(); ?></td>
                            <td>
                                <a href="/roles/editar/<?php echo($rol->obtenerId()); ?>" class="btn btn-sm btn-info">Editar</a>
                            </td>
                            <td>
                                <a href="" class="btn btn-sm btn-danger">Eliminar</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</section>
