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
    <nav>
        <?php
        //código con instrucciones php
        echo"<table border=1>";
        foreach($_SERVER as $clave=> $valor) {
            echo"<tr>";
            echo "<td>[". $clave ."]</td> <td>". $valor ."<td>";
            echo"</tr>";
        }
        echo"</table>";
        ?>
        
    </nav>

    <?php
    //código con instrucciones php
    require("footer.inc.php");
    ?>
</body>

</html>