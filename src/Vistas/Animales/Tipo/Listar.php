<!--Tabla con los tipos de animales-->
<section class="container">
    <div class="row">
        <div class="col-sm-12 col-md-12  col-lg-12  shadow-sm p-3 mb-5 rounded">
            <h6 class="mb-3"> Tipos de animales:</h6>
            <table class="table table-sm table-hover border border-success">
                <thead>
                    <tr class="bg-success text-white">
                        <th>Id</th>
                        <th>Nombre</th>
                        <th colspan="2">Acción</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($datos["animalesTipo"] as $animalTipo): ?>
                        <tr>
                            <td><?php echo $animalTipo->obtenerId(); ?></td>
                            <td><?php echo $animalTipo->obtenerNombre(); ?></td>
                            <td>
                                <a href="/animales/tipos/editar/<?php echo ($animalTipo->obtenerId());?>" class="btn btn-sm btn-info">Editar</a>
                            </td>
                            <td>
                                <a href="/animales/tipos/eliminar/<?php echo ($animalTipo->obtenerId());?>" class="btn btn-sm btn-danger">Eliminar</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</section>
