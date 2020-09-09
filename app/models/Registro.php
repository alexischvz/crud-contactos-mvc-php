<?php

class Registro {

    private $db;

    public function __construct(){

        $this->db = new Conexion;

    }

    public function readRegistro(){

        $this->db->query('SELECT * FROM usuarios');

        return $this->db->findAll();

    }

    public function createRegistro($datos){

        $this->db->query('INSERT INTO usuarios(nombre, email, telefono) VALUES(:nombre, :email, :telefono)');

        $this->db->bind(':nombre', $datos['nombre']);
        $this->db->bind(':email', $datos['email']);
        $this->db->bind('telefono', $datos['telefono']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }

    }

    public function findById($id_usuario){

        $this->db->query('SELECT * FROM usuarios WHERE id_usuario = :id_usuario');
        $this->db->bind(':id_usuario', $id_usuario);
        $fila = $this->db->findOne();

        return $fila;

    }

    public function updateRegistro($datos){

        $this->db->query('UPDATE usuarios SET nombre = :nombre, email = :email, telefono = :telefono WHERE id_usuario = :id_usuario');

        $this->db->bind(':id_usuario', $datos['id_usuario']);
        $this->db->bind(':nombre', $datos['nombre']);
        $this->db->bind(':email', $datos['email']);
        $this->db->bind(':telefono', $datos['telefono']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }

    }

    public function deleteRegistro($id_usuario){

        $this->db->query('DELETE FROM usuarios WHERE id_usuario = :id_usuario');
        $this->db->bind(':id_usuario', $id_usuario);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }

    }

}