<?php
require('conexion.php');

$db= new Conexion();
$conexion = $db -> getConexion();

$id_usuario=$_REQUEST['id'];
$nombre=$_REQUEST['nombre'];
$apellido=$_REQUEST['apellido'];
$correo=$_REQUEST['correo'];
$fecha=$_REQUEST['fecha_nac'];
$genero_id=$_REQUEST['genero_id'];
$ciudad_id=$_REQUEST['ciudad_id'];
$lenguajes = $_REQUEST['nombre_lenguaje_id'];

$sqlActu="UPDATE usuarios set nombre_usuario=:nombre_usuario,apellido_usuario=:apellido_usuario,correo_usuario=:correo_usuario,fecha_nacimiento_usuario=:fecha_nacimiento_usuario,genero=:id_genero,ciudad=:id_ciudad WHERE id=:id_usuario";

$stmActu = $conexion->prepare($sqlActu);

$stmActu->bindParam(":nombre_usuario",$nombre);
$stmActu->bindParam(":apellido_usuario",$apellido);
$stmActu->bindParam(":correo_usuario",$correo);
$stmActu->bindParam(":fecha_nacimiento_usuario",$fecha);
$stmActu->bindParam(":id_genero",$genero_id);
$stmActu->bindParam(":id_ciudad",$ciudad_id);
$stmActu->bindParam(":id_usuario",$id_usuario);

$stmActu->execute();

$sql_elimin="DELETE FROM lenguaje_usuario WHERE nombre_usuario=:id_usuario";
$stm_elimin = $conexion->prepare($sql_elimin);

$stm_elimin->bindParam(":id_usuario",$id_usuario);
$stm_elimin->execute();

$sql_insertlen= "INSERT INTO lenguaje_usuario(nombre_usuario,nombre_lenguaje) VALUES (:id_usuario,:id_lenguaje)";
$stm2_insertlen = $conexion->prepare($sql_insertlen);
foreach ($lenguajes as $key => $value) {
    $stm2_insertlen->bindParam(":id_usuario",$id_usuario);
    $stm2_insertlen->bindParam(":id_lenguaje",$value);
    $stm2_insertlen->execute();
}
header("Location: tabla.php");