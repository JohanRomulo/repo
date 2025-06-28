<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
        <h1>Inserción de Categorías</h1>
        <hr>
        <form action="" method="post">
            <input type="text" name="txtNom" placeHolder="Nombre">
            <select name="cbxFam" id="cbxFam">
                <option value="">Seleccione familia</option>
                <?php
                    require_once 'db.php';
                    $sql="select * from familia";
                    $ps=$cn->prepare($sql);
                    $ps->execute();
                    $filas=$ps->fetchall();
                    foreach($filas as $f){
                ?>
                <option value="<?=$f[0] ?>"><?=$f[1] ?></option>
                <?php
                    }
                ?>
            </select>
            <input type="submit" value="Guardar">
        </form>
    </div>
</body>
</html>
<?php

    require_once 'db.php';
    if($_POST){
        $sql="insert into categoría (nombre, idfamilia) values (:nom, :idF)";
        $ps=$cn->prepare($sql);
        $ps->bindParam(":nom", $_POST["txtNom"]);
        $ps->bindParam(":idF", $_POST["cbxFam"]);
        $ps->execute();
        header('Location: cargarcategorias.php');
    }
?>
