<?php

class Core {

    protected $controllerActual = "contactos";
    protected $metodoActual = "index";
    protected $parametros = [];

    public function __construct(){

        // print_r($this->getUrl()); // para testear que funcione la obtencion de url

        $url = $this->getUrl();

        // evaluamos que el controlador exista
        if (file_exists('../app/controllers/' . ucwords($url[0]) . '.php')) {

            // si existe se remplaza al controllerActual
            $this->controllerActual = $url[0];
            unset($url[0]); // destruimos el elemento 0 actual, por el que se ha ingresado en la url 

        }

        require_once '../app/controllers/' . $this->controllerActual . '.php';
        $this->controllerActual = new $this->controllerActual;

        // evaluamos que el metodo se alla enviado e la url
        if (isset($url[1])) {

            if (method_exists($this->controllerActual, $url[1])) {

                $this->metodoActual = $url[1];
                unset($url[1]);

            }

        }

        // obteniendo parametros
        $this->parametros = $url ? array_values($url) : [];
        call_user_func_array([$this->controllerActual, $this->metodoActual], $this->parametros);

    }

    public function getUrl(){

        if (isset($_GET['url'])) {

            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);

            return $url;

        }

    }

}