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

$id=$_REQUEST['id'];

$sql10="SELECT * FROM usuarios WHERE id=$id";
$bandera10=$conexion->prepare($sql10);
$bandera10 ->execute();
$actuali=$bandera10->fetch();

$sql4="SELECT* FROM usuarios";
$bandera4=$conexion->prepare($sql4);
$bandera4 ->execute();
$usuarios=$bandera4->fetchAll();

?>

<fieldset>
<form action="controlador.php" method="post">

    <div>
        <h3>REGISTRO DE USUARIOS</h3>
    </div>
    <div>
        <label for="nombre">nombre: </label>
        <input type="text" name="nombre" required     value="<?=$usuarios['nombre']?>">
    </div>  
    <br>
    <div>
        <label for="apellido">apellido: </label>
        <input type="text" name="apellido" required>
    </div>
    <br>
    <div>
        <label for="correo">correo: </label>
        <input type="email" name="correo" required>
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
                <input type="checkbox" name="nombre_lenguaje_id[]" id="<?=$value['id'] ?>"  value="<?=$value['id']?> "     >
                
                
            <?php
            }
            ?>
            </div>
    </div>

    <br>
    <button>ACTUALIZAR DATOS</button>
    
    

</form>
</fieldset>
