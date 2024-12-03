<?php

require('conexion.php');
$db=new Conexion();
$conexion=$db->getConexion();

$sql4="SELECT* FROM usuarios";
$bandera4=$conexion->prepare($sql4);
$bandera4 ->execute();
$usuarios=$bandera4->fetchAll();
?>




<table border="solid 1px">
    <tr>
        <td>ID USUARIO</td>
        <td>NOMBRE USUARIO</td>
        <td>APELLIDO USUARIO</td>
        <td>CORREO USUARIO</td>
        <td>FECHA NACIMIENTO USUARIO</td>
        <td>GENERO</td>
        <td>CIUDAD</td>
    </tr>
    <?php
    foreach ($usuarios as $key => $value) 
    {
        ?>
        <tr>
            <td><?=$value ["id"]?></td>
            <td><?=$value ["nombre_usuario"]?></td>
            <td><?=$value ["apellido_usuario"]?></td>
            <td><?=$value ["correo_usuario"]?></td>
            <td><?=$value ["fecha_nacimiento_usuario"]?></td>
            <td><?=$value ["genero"]?></td>
            <td><?=$value ["ciudad"]?></td>
            <td><a href="actualizar.php"><?$value ["id"]?>ACTUALIZAR</a></td>
        </tr>
    <?php
    }
    ?>
</table>

<a href="index.php">registro</a>