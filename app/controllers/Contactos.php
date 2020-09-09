<?php

class Contactos extends Controlador{ // controller por defecto

    public function __construct(){

        $this->modelRegistro = $this->cargarModel('Registro');

    }

    public function index(){

        // mostrar registros
        $registros = $this->modelRegistro->readRegistro();

        $datos = [
            'titulo' => 'Contactos',
            'registros' => $registros
        ];

        $this->cargarView('inicio', $datos);
        
    }

    public function create(){

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            // recibimos los datos del formulario
            $datos = [
                'nombre' => trim($_POST['nombre']),
                'email' => trim($_POST['email']),
                'telefono' => trim($_POST['telefono'])
            ];

            if ($this->modelRegistro->createRegistro($datos)) {

                redireccionar('/contactos');

            } else {

                die('Algo salio mal!');

            }

        } else {

            $datos = [
                'nombre' => '',
                'email' => '',
                'telefono' => ''
            ];

            $this->cargarView('registro', $datos);

        }

    }

    public function update($id_usuario){

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $datos = [
                'id_usuario' => $id_usuario,
                'nombre' => trim($_POST['nombre']),
                'email' => trim($_POST['email']),
                'telefono' => trim($_POST['telefono'])
            ];

            if ($this->modelRegistro->updateRegistro($datos)) {

                redireccionar('/contactos');

            } else {

                die('Algo salio mal perro');

            }

        } else {

            // obtener datos del modelo
            $usuario = $this->modelRegistro->findById($id_usuario);

            $datos = [
                'id_usuario' => $usuario->id_usuario,
                'nombre' => $usuario->nombre,
                'email' => $usuario->email,
                'telefono' => $usuario->telefono
            ];

            $this->cargarView('editar', $datos);

        }

    }

    public function delete($id_usuario){

        $this->modelRegistro->deleteRegistro($id_usuario);

        redireccionar('/paginas');

    }

}