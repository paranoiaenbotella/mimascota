<!--Tabla con direcciones-->
<section class="container">
    <div class="row">
        <div class="col-sm-12 col-md-12  col-lg-12  shadow-sm p-3 mb-5 rounded">
            <h6 class="mb-3"> Direcciones en la base de datos</h6>
            <table class="table table-sm table-hover border border-success">
                <thead>
                    <tr class="bg-success text-white">
                        <th>Id</th>
                        <th>País</th>
                        <th>Ciudad</th>
                        <th>Código Postal</th>
                        <th>Calle</th>
                        <th colspan="2">Acción</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($datos["direcciones"] as $direccion): ?>
                        <tr>
                            <td><?php echo $direccion->obtenerId(); ?></td>
                            <td><?php echo $direccion->obtenerPais(); ?></td>
                            <td><?php echo $direccion->obtenerCiudad(); ?></td>
                            <td><?php echo $direccion->obtenerCodigoPostal(); ?></td>
                            <td><?php echo $direccion->obtenerCalle(); ?></td>
                            <td>
                                <a href="/direcciones/editar/<?php echo($direccion->obtenerId()); ?>" class="btn btn-sm btn-info">Editar</a>
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