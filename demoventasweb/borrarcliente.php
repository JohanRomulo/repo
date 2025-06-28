<?php
    require_once 'db.php';
    $idclie=$_GET["idclie"];
    $sql="delete from cliente where idcliente=:idclie";
    $ps=$cn->prepare($sql);
    $ps->bindParam(":idclie", $idclie);
    $ps->execute();
    header("Location: cargarclientes.php");
?>