<?php
class Conexion{
    protected $dbh;
    public $conexion;

    Public function Conectar(){
        define('servidor','localhost');
        define('nombre_bd','citasmedicas');
        define('usuario','root');
        define('password','');



        try {
            $conectar = $this->dbh = new PDO("mysql:host=".servidor.";dbname=".nombre_bd, usuario, password);

            return $conectar;
        } catch (Exception $e) {
            print "Â¡Error Mesa de Partes BD!: " . $e->getMessage() . "<br/>";
            die();
        }
    }

    public function set_names(){
        return $this->dbh->query("SET NAMES 'utf8'");
    }

    public function desconectarDB()
    {
        die($this->dbh);
    }
}