<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        require_once 'DB.php';
        $idfam=$_GET["idfam"];
        $sql="select * from familia where idfamilia=:idfam";
        $ps=$cn->prepare($sql);
        $ps->bindParam(":idfam", $idfam);
        $ps->execute();
        $fila=$ps->fetch();
    ?>
    <div>
        <h1>Modificación de Familias</h1>
        <hr>
        <form action="" method="post">
            <input type="hidden" name="txtId" value="<?=$fila[0]?>"> 
            <input type="text" name="txtNom" value="<?=$fila[1]?>">
            <input type="text" name="txtDes" value="<?=$fila[2]?>">
            <input type="submit" value="Guardar">
        </form>
    </div>
</body>
</html>
<?php

    require_once 'db.php';
    
    if($_POST){
        $sql="update familia set nombre=:nom, descripcion=:des where idfamilia=:idfam";
        $ps=$cn->prepare($sql);
        $ps->bindParam(":nom", $_POST["txtNom"]);
        $ps->bindParam(":des", $_POST["txtDes"]);
        $ps->bindParam(":idfam", $_POST["txtId"]);
        $ps->execute();
        header('Location: cargarfamilias.php');
    }
?>
