<?php

require('conexion.php');
$db=new Conexion();
$conexion=$db->getConexion();

$sql="SELECT* FROM ciudades";
$bandera=$conexion->prepare($sql);
$bandera ->execute();
$ciudades=$bandera->fetchAll();

$sql2="SELECT * FROM generos";
$bandera2=$conexion->prepare($sql2);
$bandera2 ->execute();
$generos=$bandera2->fetchAll();

$sql3="SELECT* FROM lenguajes";
$bandera3=$conexion->prepare($sql3);
$bandera3 ->execute();
$lenguajes=$bandera3->fetchAll();

$usuario_id=$_REQUEST['id'];

$sql6="SELECT* FROM usuarios WHERE id=$usuario_id";
$bandera6=$conexion->prepare($sql6);
$bandera6 ->execute();
$usuario=$bandera6->fetch();

$sql13="SELECT * FROM lenguaje_usuario WHERE nombre_usuario=$usuario_id";
$bandera13=$conexion->prepare($sql13);
$bandera13 ->execute();
$len_usu=$bandera13->fetchAll();

?>

<link rel="stylesheet" href="estilos.css">
<fieldset class="tabla">
<form action="control_actuali.php" method="post" class="formulario">

    <div class="titulo">
        <h3>REGISTRO DE USUARIOS</h3>
    </div>
    <div class="registro__nombre">
        <label class="registro__nombre__titulo" for="nombre">nombre: </label>
        <input  type="text" class="registro__nombre__input" name="nombre" value="<?=$usuario['nombre_usuario']?>" required pattern="[a-zA-Z]+" autocomplete="off" placeholder="Ingresar su nombre">
    </div>  

    <input type="hidden" name="id" value="<?=$usuario_id?>">
    <br>
    <div class="registro__apellido">
        <label class="registro__apellido__titulo" for="apellido">apellido: </label>
        <input type="text" class="registro__apellido__input" name="apellido" required value="<?=$usuario['apellido_usuario']?>" pattern="[a-zA-Z]+" autocomplete="off" placeholder="Ingresar su apellido">
    </div>
    <br>
    <div class="registro__correo">
        <label class="registro__correo__titulo" for="correo">correo: </label>
        <input type="email" class="registro__correo__input" name="correo" required value="<?=$usuario['correo_usuario']?>" pattern="[a-zA-Z1-9]+@[A-Za-z]+[.][a-z]+" placeholder="Ingresar su correo">
    </div>
    <br>
    <div class="registro__nacimiento">
        <label for="fecha_nac" class="registro__nacimiento__titulo" >fecha de nacimiento: </label>
        <input type="date"  class="registro__nacimiento__input" name="fecha_nac" required value="<?=$usuario['fecha_nacimiento_usuario']?>"  >
    </div>  
    
    <br>

    <div class="registro__ciudad">
        <label for="ciudad_id">ciudades</label>
        <select name="ciudad_id" id="ciudad_id" required>
            <?php
            foreach ($ciudades as $key => $ciu){
                ?>
                <option id="<?= $ciu['id'] ?>" value="<?= $ciu['id'] ?>"
                <?php if($usuario['ciudad']==$ciu['id']){ ?>
                    selected <?php } ?> >
                    <?= $ciu['ciudad'] ?>
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

            foreach($generos as $key=> $gen){
                ?>
                <label for="gen_<?=$gen['id'] ?>"  ><?=$gen['genero']?></label>
                <input type="radio" name="genero_id" id="gen_<?=$gen['id'] ?>"  value="<?=$gen['id']?>" required 
                <?php if($usuario['genero']== $gen['id']){?>
                checked <?php
                } ?>>  
                
                
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

            foreach($lenguajes as $key=> $len){
                ?>
                <label for="len_<?=$len['id'] ?>"  ><?=$len['nombre_lenguaje']?></label>
                <input type="checkbox" name="nombre_lenguaje_id[]" id="len_<?=$len['id'] ?>"  value="<?=$len['id']?> "
                <?php foreach ($len_usu as $key => $l){
                    if ($len['id']==$l['nombre_lenguaje']){ ?>
                    checked
                    <?php }
                } ?>>
                
                
            <?php
            }
            ?>
            </div>
    </div>

    <br>
    <input class="boton__guardar" type="submit" value="Actualizar" >
    <br>
    
    

</form>
</fieldset>
