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
<fieldset class="tabla">
<form action="controlador.php" method="post" class="formulario">

    <div class="titulo">
        <h3>REGISTRO DE USUARIOS</h3>
    </div>
    <div class="registro__nombre">
        <label class="registro__nombre__titulo"  for="nombre">NOMBRE </label>
        <input type="text" class="registro__nombre__input" autocomplete="off" name="nombre" required pattern="[a-zA-Z]+" placeholder="Ingresar nombre">
    </div>  
    <br>
    <div class="registro__apellido">
        <label class="registro__apellido__titulo" for="apellido">APELLIDO </label>
        <input type="text" class="registro__apellido__input" autocomplete="off" name="apellido" required pattern="[a-zA-Z]+" placeholder="Ingresar apellido">
    </div>
    <br>
    <div class="registro__correo">
        <label for="correo" class="registro__correo__titulo">CORREO </label>
        <input type="email" class="registro__correo__input" autocomplete="off" name="correo" required placeholder="Ingresar correo">
    </div>
    <br>
    <div class="registro__nacimiento">
        <label class="registro__nacimiento__titulo" for="fecha_nac">FECHA DE NACIMIENTO: </label>
        <input class="registro__nacimiento__input" type="date" name="fecha_nac" required>
    </div>  
    <br>

    <div class="registro__ciudad">
        <label for="ciudad_id">CIUDADES</label>
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
    <div class="registro__genero">
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

    <div class="registro__lenguajes">
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
    <button class="boton__guardar">GUARDAR DATOS</button>
    
    

</form>
</fieldset>
<a href="tabla.php" class="tabla__registros">VER TABLA DE REGISTROS</a>

