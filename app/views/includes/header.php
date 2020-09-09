<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= RUTA_URL ?>/css/bootstrap.min.css">
    <title><?= TITLE ?></title>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">

    <a href="<?= RUTA_URL ?>" class="navbar-brand">Contactos</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mobile">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="mobile">

        <ul class="navbar-nav">
            <li class="nav-item">
                <a href="<?= RUTA_URL ?>" class="nav-link">Inicio</a>
            </li>
            <li class="nav-item">
                <a href="<?= RUTA_URL ?>/contactos/create" class="nav-link">Nuevo Contacto</a>
            </li>
        </ul>

    </div>

</nav>