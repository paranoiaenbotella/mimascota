<section class="container">
    <div class="row">
        <div class="col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-4 offset-lg-4 shadow-sm p-3 mb-5 rounded">
            <h6 class="mb-3"> Tipos de animales registrados en la base de datos</h6>
            <table class="table table-sm table-hover border border-success">
                <thead>
                    <tr class="bg-success text-white">
                        <th>Id</th>
                        <th>Nombre</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($datos["animalesTipo"] as $animalTipo): ?>
                        <tr>
                            <td><?php echo $animalTipo->obtenerId(); ?></td>
                            <td><?php echo $animalTipo->obtenerNombre(); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</section>
