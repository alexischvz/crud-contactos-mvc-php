<?php

class Conexion { // clase conexion a la base de datos

    private $user = DB_USER;
    private $pass = DB_PASS;
    private $host = DB_HOST;
    private $db = DB_NAME;

    private $dbh;
    private $statement;
    private $error;

    public function __construct(){

        // driver
        $dsn = "mysql:host=" . $this->host . ";dbname=" . $this->db;
        // options adicionales
        $options = array(
            PDO::ATTR_PERSISTENT,
            PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION
        );

        //conexion
        try {

            $this->dbh = new PDO($dsn, $this->user, $this->pass, $options);

        } catch(Exception $e) {

            $this->error = $e->getMessage();
            echo $this->error;

        }

    }

    // obtener consulta
    public function query($sql){

        $this->statement = $this->dbh->prepare($sql);

    }

    // vincular consulta
    public function bind($parametro, $valor){

        // if (is_null($tipo)) {

        //     switch (true) {
        //         case is_int($valor):
        //             $tipo = PDO::PARAM_INT;
        //             break;
        //         case is_bool($valor):
        //             $tipo = PDO::PARAM_BOOL;
        //             break;
        //         case is_null($valor):
        //             $tipo = PDO::PARAM_NULL;
        //             break;
        //         default:
        //             $tipo = PDO::PARAM_STR;
        //             break;
        //     }

        // }

        $this->statement->bindValue($parametro, $valor);

    }

    // ejecutar consulta
    public function execute(){

        return $this->statement->execute();

    }

    // obtener todos los registros
    public function findAll(){

        $this->execute();
        return $this->statement->fetchAll(PDO::FETCH_OBJ);

    }

    // obtener un solo registro
    public function findOne(){

        $this->execute();
        return $this->statement->fetch(PDO::FETCH_OBJ);

    }

    // obtener cantidad de filas
    public function rowCount(){
        return $this->statement->rowCount();
    }

}