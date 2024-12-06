<?php

// echo "<pre>";
// print_r($_REQUEST); 
// echo "</pre>";

require('conexion.php');

$db=new Conexion();
$conexion=$db->getConexion();

$nombre=$_POST['nombre'];
$apellido=$_POST['apellido'];
$correo=$_POST['correo'];
$fecha_nac=$_POST['fecha_nac'];
$genero_id=$_POST['genero_id'];
$ciudad_id=$_POST['ciudad_id'];
$lenguajes=$_POST['nombre_lenguaje_id'];



$sql="INSERT INTO USUARIOS (nombre_usuario,apellido_usuario,correo_usuario,fecha_nacimiento_usuario,genero,ciudad)
 VALUES (:nombre_usuario,:apellido_usuario,:correo_usuario,:fecha_nacimiento_usuario,:genero_id,:ciudad_id)";
 
$stm=$conexion ->prepare($sql);

$stm ->bindParam(":nombre_usuario",$nombre);
$stm ->bindParam(":apellido_usuario",$apellido);
$stm ->bindParam(":correo_usuario",$correo);
$stm ->bindParam(":fecha_nacimiento_usuario",$fecha_nac);
$stm ->bindParam(":genero_id",$genero_id);
$stm ->bindParam(":ciudad_id",$ciudad_id);




$usuario= $stm ->execute();

$id_usuario=$conexion->lastInsertId();

var_dump($id_usuario);
// echo "<pre>";
// print_r($_REQUEST);
// echo "</pre>";

$sql4="INSERT INTO lenguaje_usuario (nombre_usuario,nombre_lenguaje)
VALUES (:id_usuario,:id_lenguaje)";
$stm4=$conexion ->prepare($sql4);{
    foreach ($lenguajes as $key => $value) {
        $stm4->bindParam(":id_usuario",$id_usuario);
        $stm4->bindParam(":id_lenguaje",$value);
        $stm4->execute();
    }
    

}
header("Location: index.php");





