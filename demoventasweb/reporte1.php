<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
        <h1>Generación de reporte (CATEGORÍAS POR FAMILIA)</h1>
        <hr>
        Seleccione Familia <br>
        <select name="cbxFam" id="cbxFam" onchange="enviar()">
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
    </div>
</body>
</html>

<script>
    function enviar(){
        idfam=document.getElementById('cbxFam').value;
        window.locaton.href="generarreporte1.php?idfam=" + idfam;
    }
</script>