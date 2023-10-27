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
    include_once("cabecera.inc.php")
    ?>
    <section>
        <article>
            <h3>Inserte los datos nuevos del contacto q quiere crear</h3>
            <form action="#" method="post">
                <label for="nombre">Nombre</label>
                <input type="text" required name="nombre" id="Name">
                <br>
                <label for="apellidos">Primer apellido</label>
                <input type="text" name="apellido1" id="apellido1">
                <br>
                <label for="apellidos">Segundo apellido</label>
                <input type="text" name="apellido2" id="apellido2">
                <br>
                <label for="telefono">Telefono</label>
                <input type="text" name="telefono" id="telefono" required>
                <br><br>
                <input type="submit" value="Enviar formulario">
            </form>
        </article>
    </section>
    <?php

    @$BBDD = new mysqli('localhost', 'agenda', '', 'agenda');
    if ($BBDD->connect_errno != null) {
        echo 'Error conectando a la base de datos: ';
        echo '$BBDD->connect_error';
    };
    if (isset($_POST['nombre'])) {
        $BBDD->query('INSERT INTO contacto (nombre, apellido1, apellido2, telefono) VALUES ( \'' . $_POST['nombre'] . '\', \'' . $_POST['apellido1'] . '\', \'' . $_POST['apellido2'] . '\', \'' . $_POST['telefono'] . '\')');
    }
    $contactos = $BBDD->query('SELECT * FROM contacto');
    while ($rw = $contactos->fetch_assoc()) {
        echo ("<ul>");
        echo ('<li>' . $rw["ID"] . ' ' . $rw['nombre'] . ' ' . $rw['apellido1'] . ' ' . $rw['apellido2'] . ' ' . $rw['telefono'].' <a href="borrarcontacto.php?ID='.$rw["ID"].'"><img src="borrarcontacto.png" width="25px"></a>');
        echo ('</ul>');
    }




    include_once("footer.inc.php");
    ?>
</body>

</html>