<?php
class Conexion{
    protected $dbh;
    

    Public function Conectar(){
        define('servidor','az-bd-facelect.mysql.database.azure.com');
        define('nombre_bd','az-citasmedicas');
        define('usuario','vmadmin@az-bd-facelect');
        define('password','1750871863Ale');

        try {
            $conectar = $this->dbh = new PDO("mysql:host=".servidor.";charset=utf8;dbname=".nombre_bd,usuario, password) ;
            return $conectar;
            
        } catch (Exception $e) {
            print "Error de base de datos: " . $e->getMessage() . "<br/>";
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
?>
