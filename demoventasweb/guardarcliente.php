<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
        <h1>Inserción de Clientes</h1>
        <hr>
        <form action="" method="post">
            <input type="text" name="txtNom" placeHolder="Nombres">
            <input type="text" name="txtApe" placeHolder="Apellidos">
            <input type="text" name="txtDni" placeHolder="DNI">
            <input type="submit" value="Guardar">
        </form>
    </div>
</body>
</html>
<?php

    require_once 'db.php';
    if($_POST){
        $sql="insert into cliente (nombres, apellidos, dni) values (:nom, :ape, :dni)";
        $ps=$cn->prepare($sql);
        $ps->bindParam(":nom", $_POST["txtNom"]);
        $ps->bindParam(":ape", $_POST["txtApe"]);
        $ps->bindParam(":dni", $_POST["txtDni"]);
        $ps->execute();
        header('Location: cargarclientes.php');
    }
?>
