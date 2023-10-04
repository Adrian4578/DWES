<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Principal</title>
</head>

<body>
    <?php
    //código con instrucciones php
    require("cabecera.inc.php");
    ?>
    <nav>
        <p>Hola me llamo adrian y soy tecnico superior de desarrollo de aplicaciones multiplataforma</p>
        <img src="../IMGS/ElNano.jfif" alt="">
        <br>
        <a href="./tecnologias.php">Tecnologias</a>
        <br>
        <a href="./rrss.php">RRSS</a>
        <br>
        <a href="./contar.php">Contar</a>
        <br>
        <a href="./server.php">Server</a>
        <br>
        <a href="mailto:correodeejemplo@gmail.com">MAIL</a>

        <form action="consulta.php" method="post">
            <fieldset>
                <legend>Datos</legend>
                <label>Nombre:<input type="text" name="Nombre"></label>
                <br>
                <label>Apellidos:<input type="text" name="Apellidos"></label>
                <br>
                <label><input type="submit"></label>
            </fieldset>
        </form>
    </nav>
  
    <?php
    //código con instrucciones php
    require("footer.inc.php");
    ?>
</body>

</html>