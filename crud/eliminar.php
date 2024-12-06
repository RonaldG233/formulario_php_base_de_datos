<?php

require('conexion.php');
$db=new Conexion();
$conexion=$db->getConexion();

$id_usuario=$_REQUEST['id'];

$sql_elimin="DELETE FROM lenguaje_usuario WHERE id=:id_usuario";
$stm_elimin=$conexion->prepare($sql_elimin);
$stm_elimin->bindParam(":id_usuario",$id_usuario);
$stm_elimin->execute();

$sql_elimin2="DELETE FROM usuarios WHERE id=:id_usuario";
$stm_elimin2=$conexion->prepare($sql_elimin2);
$stm_elimin2->bindParam(":id_usuario",$id_usuario);
$stm_elimin2->execute();

header("Location: tabla.php")