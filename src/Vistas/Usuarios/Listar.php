<!--Usuarios en la base de datos-->
<section class="container">
    <div class="row">
        <div class="col-sm-12 col-md-12  col-lg-12  shadow-sm p-3 mb-5 rounded">
            <h6 class="mb-3"> Usuarios en la base de datos</h6>
            <table class="table table-sm table-hover border border-success">
                <thead>
                    <tr class="bg-success text-white">
                        <th>Id</th>
                        <th>Rol</th>
                        <th>Apellidos</th>
                        <th>Nombre</th>
                        <th>Móvil</th>
                        <th>Email</th>
                        <th colspan="2">Acción</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($datos["usuarios"] as $usuario): ?>
                        <tr>
                            <td><?php echo $usuario->obtenerId(); ?></td>
                            <td><?php echo $usuario->obtenerRol(); ?></td>

                            <td><?php echo $usuario->obtenerApellidos(); ?></td>
                            <td><?php echo $usuario->obtenerNombre(); ?></td>
                            <td><?php echo $usuario->obtenerMovil(); ?></td>
                            <td><?php echo $usuario->obtenerEmail(); ?></td>
                            
                            <td>
                                <a href="/usuarios/editar/<?php echo($usuario->obtenerId(
                                )); ?>" class="btn btn-sm btn-info">Editar
                                </a>
                            </td>
                            <td>
                                <a href="/usuarios/eliminar/<?php echo($usuario->obtenerId(
                            )); ?>" class="btn btn-sm btn-danger">Eliminar</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</section>