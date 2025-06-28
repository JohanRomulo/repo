<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        require_once 'db.php';
        $idclie=$_GET["idclie"];
        $sql="select * from cliente where idcliente=:idclie";
        $ps=$cn->prepare($sql);
        $ps->bindParam(":idclie", $idclie);
        $ps->execute();
        $fila=$ps->fetch();
    ?>
    <div>
        <h1>Modificación de Familias</h1>
        <hr>
        <form action="" method="post">
            <input type="hidden" name="txtId" value="<?=$fila[0]?>"> 
            <input type="text" name="txtNom" value="<?=$fila[1]?>">
            <input type="text" name="txtApe" value="<?=$fila[2]?>">
            <input type="text" name="txtDni" value="<?=$fila[3]?>">
            <input type="submit" value="Guardar">
        </form>
    </div>
</body>
</html>
<?php

    require_once 'db.php';
    
    if($_POST){
        $sql="update cliente set nombres=:nom, apellidos=:ape, dni=:dni where idcliente=:idclie";
        $ps=$cn->prepare($sql);
        $ps->bindParam(":nom", $_POST["txtNom"]);
        $ps->bindParam(":ape", $_POST["txtApe"]);
        $ps->bindParam(":dni", $_POST["txtDni"]);
        $ps->bindParam(":idclie", $_POST["txtId"]);
        $ps->execute();
        header('Location: cargarclientes.php');
    }
?>
