<!-- Tabla con tipos de tarifas-->
<section class="container">
    <div class="row">
        <div class="col-sm-12 col-md-12  col-lg-12  shadow-sm p-3 mb-5 rounded">
            <h6 class="mb-3"> Tipos de tarifas en la base de datos</h6>
            <table class="table table-sm table-hover border border-success">
                <thead>
                    <tr class="bg-success text-white">
                        <th>Id</th>
                        <th>Nombre</th>
                        <th colspan="2">Acción</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($datos["tarifasTipo"] as $tarifaTipo): ?>
                        <tr>
                            <td><?php echo $tarifaTipo->obtenerId(); ?></td>
                            <td><?php echo $tarifaTipo->obtenerNombre(); ?></td>
                            <td>
                                <a href="/tarifas/tipos/editar" class="btn btn-sm btn-info">Editar</a>
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
