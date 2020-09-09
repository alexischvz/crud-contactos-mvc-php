<?php require_once RUTA_APP . '/views/includes/header.php' ?>

<div class="container mt-5">

    <form action="<?= RUTA_URL ?>/contactos/create" method="POST">
    
        <div class="row">
        
            <div class="form-group col-4">

                <label for="name">Nombre de Usuario</label>
                <input type="text" name="nombre" id="name" class="form-control form-control-sm">
            
            </div>

            <div class="form-group col-4">

                <label for="email">Correo electronico</label>
                <input type="email" name="email" id="email" class="form-control form-control-sm">
            
            </div>

            <div class="form-group col-4">

                <label for="tel">Telefono</label>
                <input type="tel" name="telefono" id="tel" class="form-control form-control-sm">
            
            </div>
        
        </div>

        <div class="row">

            <div class="btn-group">
            
                <input type="submit" value="Guardar Contacto" class="btn btn-success btn-sm ml-3">
                <a href="<?= RUTA_URL ?>/contactos/index" class="btn btn-danger btn-sm">Regresar</a>
            
            </div>
        
        </div>
    
    </form>

</div>

<?php require_once RUTA_APP . '/views/includes/footer.php' ?>