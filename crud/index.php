<?php

require('conexion.php');
$db=new Conexion();
$conexion=$db->getConexion();

$sql="SELECT* FROM ciudades";
$bandera=$conexion->prepare($sql);
$bandera ->execute();
$ciudades=$bandera->fetchAll();

$sql2="SELECT* FROM generos";
$bandera2=$conexion->prepare($sql2);
$bandera2 ->execute();
$generos=$bandera2->fetchAll();

$sql3="SELECT* FROM lenguajes";
$bandera3=$conexion->prepare($sql3);
$bandera3 ->execute();
$lenguajes=$bandera3->fetchAll();

$sql6="SELECT* FROM usuarios";
$bandera6=$conexion->prepare($sql6);
$bandera6 ->execute();
$usuarios=$bandera6->fetchAll();
?>


<link rel="stylesheet" href="estilos.css">
<fieldset>
<form action="controlador.php" method="post">

    <div>
        <h3>REGISTRO DE USUARIOS</h3>
    </div>
    <div>
        <label for="nombre">nombre: </label>
        <input type="text" autocomplete="off" name="nombre" required pattern="[a-zA-Z]+">
    </div>  
    <br>
    <div>
        <label for="apellido">apellido: </label>
        <input type="text" autocomplete="off" name="apellido" required pattern="[a-zA-Z]+">
    </div>
    <br>
    <div>
        <label for="correo">correo: </label>
        <input type="text" autocomplete="off" name="correo" required pattern="[a-zA-Z1-9]+@[A-Za-z]+[.][a-z]">
    </div>
    <br>
    <div>
        <label for="fecha_nac">fecha de nacimiento: </label>
        <input type="date" name="fecha_nac" required>
    </div>  
    <br>

    <div>
        <label for="ciudad_id">ciudades</label>
        <select name="ciudad_id" id="ciudad_id" required>
            <?php
            foreach ($ciudades as $key => $value){
                ?>
                <option id="<?= $value['id'] ?>" value="<?= $value['id'] ?>">
                    <?= $value['ciudad'] ?>
                </option>
            <?php    
            }
            ?>
        </select>
    </div>
            <br>
    <div>
        <label for="genero_id">genero: </label>
            <div>
            <?php

            foreach($generos as $key=> $value){
                ?>
                <label for="<?=$value['id'] ?>"  ><?=$value['genero']?></label>
                <input type="radio" name="genero_id" id="<?=$value['id'] ?>"  value="<?=$value['id']?>" required    >
                

            <?php
            }
            ?>
            </div>
    </div>

    <br>

    <div>
        <label for="lenguaje_id">Lenguajes: </label>
            <div>
            <?php

            foreach($lenguajes as $key=> $value){
                ?>
                <label for="<?=$value['id'] ?>"  ><?=$value['nombre_lenguaje']?></label>
                <input type="checkbox" name="nombre_lenguaje_id[]" id="<?=$value['id'] ?>"  value="<?=$value['id']?> ">
                 
            <?php
            }
            ?>
            </div>
    </div>

    <br>
    <button>GUARDAR DATOS</button>
    
    

</form>
</fieldset>
<a href="tabla.php">VER TABLA DE REGISTROS</a>

