<?php require_once RUTA_APP . '/views/includes/header.php'; ?>

<div class="jumbotron">
    <div class="container">
        <h1 class="display-4 text-center"><?= $datos['titulo'] ?></h1>
    </div>
</div>

<div class="container">

    <div class="row mb-3">
        
        <a href="<?= RUTA_URL ?>/contactos/create" class="btn btn-success btn-sm ml-3">Nuevo Contacto</a>

    </div>

    <table class="table text-center table-hover">
    
        <thead class="bg-light">
            <tr>
            
                <th>Id</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Telefono</th>
                <th></th>
            
            </tr>
        </thead>
        <tbody>
            
            <?php
                
            foreach ($datos['registros'] as $reg) { ?>

                <tr>
                    <td><?= $reg->id_usuario ?></td>
                    <td><?= $reg->nombre ?></td>
                    <td><?= $reg->email ?></td>
                    <td><?= $reg->telefono ?></td>
                    <td>
                        <a href="<?= RUTA_URL ?>/contactos/update/<?= $reg->id_usuario ?>">Editar</a>
                        <a href="<?= RUTA_URL ?>/contactos/delete/<?= $reg->id_usuario ?>">Eliminar</a>
                    </td>
                </tr>
                    
            <?php } ?>

        </tbody>
    
    </table>

</div>

<?php require_once RUTA_APP .'/views/includes/footer.php'; ?>