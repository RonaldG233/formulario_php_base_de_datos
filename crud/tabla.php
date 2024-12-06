<?php

require('conexion.php');
$db=new Conexion();
$conexion=$db->getConexion();

$sql6="SELECT u.id, u.nombre_usuario, u.apellido_usuario, u.correo_usuario, u.fecha_nacimiento_usuario,
g.genero, c.ciudad FROM usuarios u INNER JOIN generos g ON u.genero=g.id INNER JOIN ciudades c ON u.ciudad= c.id ORDER BY u.id;";
$bandera6=$conexion->prepare($sql6);
$bandera6->execute();
$usuarios=$bandera6->fetchAll();
?>



<table border="solid 1px">
    <tr>
        <td>ID_USUARIO</td>
        <td>NOMBRE_USUARIO</td>
        <td>APELLIDO_USUARIO</td>
        <td>CORREO_USUARIO</td>
        <td>FECHA_NACIMIENTO_USUARIO</td>
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
            <td><a href="actualizar.php? id=<?=$value ["id"]?>">ACTUALIZAR</a></td>
            <td><a href="eliminar.php? id=<?=$value ["id"]?>">ELIMINAR</a></td>
        </tr>
    <?php
    }
    ?>
</table>

<a href="index.php">registro</a>