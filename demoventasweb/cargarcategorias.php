<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
        <h1>Carga de Categorías</h1>
        <hr>
        <a href="guardarcategoria.php">Crear nuevo</a>
        <table border="1">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Familia</th>
                </tr>
   
            </thead>
            <tbody>
                <?php
                    require_once 'db.php';
                    $sql="select * from categoría";
                    $ps=$cn->prepare($sql);
                    $ps->execute();
                    $filas=$ps->fetchall();
                    foreach($filas as $f){
                ?>
                <tr>
                    <td><?=$f[0] ?> </td>
                    <td><?=$f[1] ?> </td>
                    <td><?=$f[2] ?> </td>
                    <td> <a href="borrarcategoria.php?idcat=<?=$f[0] ?>"> Borrar</a></td>
                    <td> <a href="modificarcategoria.php?idcat=<?=$f[0] ?>"> Modificar</a></td>
                </tr>
                <?php
                    }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
