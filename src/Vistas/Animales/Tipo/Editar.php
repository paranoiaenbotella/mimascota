<!--Form para editar tipos de animales-->
<section class="container">
    <div class="row">
        <div class="col-sm-10 offset-sm-1 col-md-10 offset-md-1 col-lg-6 offset-lg-3">
            <h4>Editar tipos de animales</h4>
            <form method="POST" novalidate>
                <div class="form-group mb-1">
                    
                    <label for="nombre" class="mb-0">Nombre:</label>
                    <input class="form-control my-0" id="nombre" name="nombre" type="text" value="<?php echo($datos["animalTipo"]->obtenerNombre()); ?>">
                    </div> 
                    <div class="input-group input-group-sm my-2">
                        <buton class="btn btn-info btn-block btn-sm" type="submit">Guardar</buton>
                    </div>
                    <div class="input-group input-group-sm mt-4">
                     <a href="/animales/tipos" class="btn btn-block btn-sm btn-secondary">Regresar a la lista de tipos</a>
                 </div>
            </form>
        </div>
    </div>
</section>