<?php

class Conexion
{
    private $conexion;
    private $host="localhost";
    private $db="adso2894667";
    private $usuario="ronald_g";
    private $contrasena="1098072646";

    public function __construct()
    {
        try {
            $opciones =[
                PDO ::ATTR_ERRMODE => PDO :: ERRMODE_EXCEPTION,
                PDO ::ATTR_DEFAULT_FETCH_MODE => PDO ::FETCH_ASSOC
            ];
            $this->conexion = "mysql:host=" . $this->host . ";dbname=" . $this->db . ";charset=utf8mb4";
            $this->conexion = new PDO($this->conexion, $this->usuario, $this->contrasena, $opciones);
            $this->conexion ->exec("SET CHARACTER SET utf8");
        }   catch (Exception $e){
            echo $e->getMessage();
        }
    }
    function getConexion()
    {
        return $this->conexion;
    }
    function cerrarConexion()
    {
        $this->conexion=null;
    }
}