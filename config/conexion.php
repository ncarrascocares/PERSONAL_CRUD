<?php

class Conectar{
    protected $dbh;


    protected function Conexion(){
        try {
            //cadena de conexión
            $conectar = $this->dbh = new PDO("mysql:local=localhost; dbname=crud", "root", "");

            return $conectar;

        } catch (Exception $e) {
            print "Error BD: " . $e->getMessage() . "</br>";
            die();
        }
    }

    public function set_names(){
        return $this->dbh->query("SET NAMES 'utf8'");
    }
}

?>