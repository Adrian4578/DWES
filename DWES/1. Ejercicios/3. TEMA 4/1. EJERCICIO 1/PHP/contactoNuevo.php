<?php
//código con instrucciones php
if ($_POST) {

    $Mal = false;

    if (preg_match('~[0-9]+~', $_POST["Nombre"])) {
        echo ("El nombre no puede contener numeros</br>");
        $_POST['Nombre'] = "";
        $Mal = true;
    }
    if (preg_match('~[0-9]+~', $_POST["Apellido1"])) {
        echo ("Los apellidos no pueden contener numeros</br>");
        $_POST['Apellidos'] = "";
        $Mal = true;
    }

    if (preg_match('~[0-9]+~', $_POST["Apellido2"])) {
        echo ("Los apellidos no pueden contener numeros</br>");
        $_POST['Apellidos'] = "";
        $Mal = true;
    }

    if ($Mal) {
        ImprimirForm();
    } else {

        $conexion = new mysqli('localhost', 'Agenda', 'agenda', 'agenda');
        //$resultado = $conexion->query('INSERT INTO agenda (Nombre,Apellido_1,Apellido_2,Numero_Telf) VALUES("juan","alberto","gimenez",213)');
        $resultado = $conexion->query('INSERT INTO agenda (Nombre,Apellido_1,Apellido_2,Numero_Telf) VALUES ("' . $_POST["Nombre"] . '","' . $_POST["Apellido1"] . '","' . $_POST["Apellido2"] . '",' . $_POST["Numero"] . ')');

    

        $resultado = $conexion->query('Select * from agenda');
        $stock = $resultado->fetch_object();
        while ($stock != null) {
            echo 'Nombre ' . $stock->Nombre . ' ' . $stock->Apellido_1 . ' '. $stock->Apellido_2 . '   <a href="./borrarContacto.php?id='.$stock->Id_Contacto.'" > borrar </a>   </br> ';
            $stock = $resultado->fetch_object();
        }

    }


} else {
    echo ('
    <form action="#" method="post">
        <fieldset>
            <legend>Datos</legend>
            <label>Nombre:<input type="text" name="Nombre" required "></label>
            <br>
            <label>Apellido 1:<input type="text" name="Apellido1" required "></label>
            <br>
            <label>Apellido 2:<input type="text" name="Apellido2" required "></label>
             <br>
            <label>Numero:<input type="number" name="Numero" required "></label>
            <label><input type="submit"></label>
        </fieldset>
    </form></br>');

    $conexion = new mysqli('localhost', 'Agenda', 'agenda', 'agenda');
    $resultado = $conexion->query('Select * from agenda');
    $stock = $resultado->fetch_object();
    while ($stock != null) {
        echo 'Nombre ' . $stock->Nombre . ' ' . $stock->Apellido_1 . ' '. $stock->Apellido_2 . '   <a href="./borrarContacto.php?id='.$stock->Id_Contacto.'" > borrar </a>   </br> ';
        $stock = $resultado->fetch_object();
    }
    
}
function ImprimirForm()
{
    echo ("Hay errores en el formulario porfavor rellene los campos vacios de nuevo");
    echo ('
        <form action="#" method="post">
            <fieldset>
                <legend>Datos</legend>
                <label>Nombre:<input type="text" name="Nombre" required value="' . $_POST["Nombre"] . '"></label>
                <br>
                <label>Apellido 1:<input type="text" name="Apellido1" required value="' . $_POST["Apellido1"] . '"></label>
                <br>
                <label>Apellido 2:<input type="text" name="Apellido2" required value="' . $_POST["Apellido2"] . '"></label>
                 <br>
                <label> Numero:<input type="number" name="Numero" required value="' . $_POST["Numero"] . '"></label>
                <label><input type="submit"></label>
            </fieldset>
        </form></br>');
}

//código con instrucciones php

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<a href="./borrarContacto.php" ></a>
</body>
</html>