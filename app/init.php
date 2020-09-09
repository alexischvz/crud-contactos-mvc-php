<?php 

require_once 'config/config.php';
require_once 'helpers/routes.php';
// require_once 'libs/Conexion.php';
// require_once 'libs/Controlador.php';
// require_once 'libs/Core.php';

spl_autoload_register(function($lib){
    require_once 'libs/' . $lib . '.php';
});