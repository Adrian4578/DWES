<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    //código con instrucciones php
    require("cabecera.inc.php");
    ?>
    <?php
    
    echo $_POST['Nombre'] . '  ' . $_POST['Apellidos'];
    ?>
    <?php
    //código con instrucciones php
    require("footer.inc.php");
    ?>
</body>

</html>