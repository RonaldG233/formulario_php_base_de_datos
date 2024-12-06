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

$sql13="SELECT * FROM usuarios WHERE id=$usuario_id";
$bandera13=$conexion->prepare($sql10);
$bandera13 ->execute();
$len_usu=$bandera13->fetch();
?>

<link rel="stylesheet" href="esilos.css">
<fieldset>
<form action="control_actuali.php" method="post">

    <div>
        <h3>REGISTRO DE USUARIOS</h3>
    </div>
    <div>
        <label for="nombre">nombre: </label>
        <input type="text" name="nombre" value="<?=$usuario['nombre_usuario']?>" required pattern="[a-zA-Z]+" autocomplete="off" placeholder="Ingresar su nombre">
    </div>  

    <input type="hidden" name="id" value="<?=$usuario_id?>">
    <br>
    <div>
        <label for="apellido">apellido: </label>
        <input type="text" name="apellido" required value="<?=$usuario['apellido_usuario']?>" pattern="[a-zA-Z]+" autocomplete="off" placeholder="Ingresar su apellido">> 
    </div>
    <br>
    <div>
        <label for="correo">correo: </label>
        <input type="email" name="correo" required value="<?=$usuario['correo_usuario']?>" pattern="[a-zA-Z1-9]+@[A-Za-z]+[.][a-z]+" placeholder="Ingresar su correo">
    </div>
    <br>
    <div>
        <label for="fecha_nac">fecha de nacimiento: </label>
        <input type="date" name="fecha_nac" value="<?=$usuario['fecha_nac']?>" required >
    </div>  
    
    <br>

    <div>
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
    <div>
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

    <div>
        <label for="lenguaje_id">Lenguajes: </label>
            <div>
            <?php

            foreach($len_usu as $key=> $len){
                ?>
                <label for="len_<?=$len['id'] ?>"  ><?=$value['nombre_lenguaje']?></label>
                <input type="checkbox" name="nombre_lenguaje_id[]" id="len_<?=$len['id'] ?>"  value="<?=$len['id']?> "
                <?php foreach ($len_usu as $key => $l){
                    if ($len['id']==$l['id']){ ?>
                    checkdate
                    <?php }
                } ?>>
                
                
            <?php
            }
            ?>
            </div>
    </div>

    <br>
    <input type="submit" value="Actualizar" >
    <br>
    
    

</form>
</fieldset>
