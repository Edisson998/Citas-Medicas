<?php
class Conexion{
    protected $dbh;
    

    Public function Conectar(){
        define('servidor','azcitasmedicas.mysql.database.azure.com');
        define('nombre_bd','citasmedicas');
        define('usuario','azadmin@azcitasmedicas');
        define('password','Efnc@1726');

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
