<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
        <h1>Inserción de Familias</h1>
        <hr>
        <form action="" method="post">
            <input type="text" name="txtNom" placeHolder="Nombre">
            <input type="text" name="txtDes" placeHolder="Descripción">
            <input type="submit" value="Guardar">
        </form>
    </div>
</body>
</html>
<?php

    require_once 'db.php';
    if($_POST){
        $sql="insert into familia (nombre, descripcion) values (:nom, :des)";
        $ps=$cn->prepare($sql);
        $ps->bindParam(":nom", $_POST["txtNom"]);
        $ps->bindParam(":des", $_POST["txtDes"]);
        $ps->execute();
        header('Location: cargarfamilias.php');
    }
?>
