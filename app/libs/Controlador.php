<?php

class Controlador { // se encarga de cargar modelos y vistas

    public function cargarModel($model){

        require_once '../app/models/' . $model . '.php';

        return new $model();

    }

    public function cargarView($view, $datos = []){

        if (file_exists('../app/views/pages/' . $view . '.php')) {

            require_once '../app/views/pages/' . $view . '.php';

        } else {
            die('La pagina ' . $view . ' no se ha encontrado');
        }

    }
    
}