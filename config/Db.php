<?php
require_once __DIR__ . '/config.php';

class Db
{


    private $conexion;
    public function __construct(){
        $this->conexion();
    }
    public function conexion()
    {
        try {
            $dns = "mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME .";charset=utf8mb4";
            $this->conexion = new PDO($dns, DB_USER, DB_PASS);
            $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch (PDOException $e){
            echo "Error: " . $e->getMessage();
            exit();
        }
    }

    public function lanzar_consulta($sql,$parametros=[]){
        $sentencia=$this->conexion->prepare($sql);
        $sentencia->execute($parametros);
        return $sentencia;
    }

    public function getConexion() {
        return $this->conexion;
    }
    public function lastInsertId() {
        return $this->conexion->lastInsertId();
    }
}