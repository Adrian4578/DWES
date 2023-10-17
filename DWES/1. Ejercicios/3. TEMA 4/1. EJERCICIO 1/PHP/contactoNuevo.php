<?php
//código con instrucciones php
error_reporting(0);
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
        if ($_GET['action'] == 'mod') {
            # code...
            $conexion = new mysqli('localhost', 'Agenda', 'agenda', 'agenda');
            // $resultado = $conexion->query('UPDATE  agenda SET Nombre="' . $_POST["Nombre"] . ',Apellido_1="' . $_POST["Apellido1"] . ',Apellido_2="' . $_POST["Apellido1"] . ',Numero_Telf="' . $_POST["Numero"] . ' WHERE WHERE Id_contacto=' . $_GET['id']);
            $resultado = $conexion->stmt_init();
            $resultado->prepare('UPDATE agenda SET Nombre=?,Apellido_1=?,Apellido_2=?,Numero_Telf=? WHERE Id_contacto="' . $_GET['id'] . '"');
            $nombre = $_POST["Nombre"];
            $Apellido1 = $_POST["Apellido1"];
            $Apellido2 = $_POST["Apellido2"];
            $Numero = $_POST["Numero"];
            $resultado->bind_param('sssi', $nombre, $Apellido1, $Apellido2, $Numero);
            $resultado->execute();
            $resultado->close();
            //$resultado = $conexion->stmt_init();
            //$resultado->prepare();
            header("Location: ./contactoNuevo.php");

        } else {
            $conexion = new mysqli('localhost', 'Agenda', 'agenda', 'agenda');
            //$resultado = $conexion->query('INSERT INTO agenda (Nombre,Apellido_1,Apellido_2,Numero_Telf) VALUES("juan","alberto","gimenez",213)');
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
            //   $resultado = $conexion->query('INSERT INTO agenda (Nombre,Apellido_1,Apellido_2,Numero_Telf) VALUES ("' . $_POST["Nombre"] . '","' . $_POST["Apellido1"] . '","' . $_POST["Apellido2"] . '",' . $_POST["Numero"] . ')');
            $resultado = $conexion->stmt_init();
            $resultado->prepare('INSERT INTO agenda (Nombre,Apellido_1,Apellido_2,Numero_Telf) VALUES (?,?,?,?)');
            $nombre = $_POST["Nombre"];
            $Apellido1 = $_POST["Apellido1"];
            $Apellido2 = $_POST["Apellido2"];
            $Numero = $_POST["Numero"];
            $resultado->bind_param('sssi', $nombre, $Apellido1, $Apellido2, $Numero);
            $resultado->execute();
            $resultado->close();


            lista_contacto();
        }



    }


} else {
    if ($_GET['action'] == 'borrar') {
        $conexion = new mysqli('localhost', 'Agenda', 'agenda', 'agenda');
        $resultado = $conexion->query('Select * from agenda where Id_contacto="' . $_GET['id'] . '"');
        if ($resultado) {
            $resultado = "";
            $resultado = $conexion->query('DELETE FROM agenda WHERE Id_Contacto= ' . $_GET['id'] . ';');
        }
        header("Location: ./contactoNuevo.php");
    } elseif ($_GET['action'] == 'mod') {
        //     $conexion = new mysqli('localhost', 'Agenda', 'agenda', 'agenda');
        //     $resultado = $conexion->query('Select * from agenda where Id_contacto="' . $_GET['id'] . '"');
        //     $stock = $resultado->fetch_object();
        $conexion = new mysqli('localhost', 'Agenda', 'agenda', 'agenda');
        $resultado = $conexion->query('Select * from agenda where Id_contacto="' . $_GET['id'] . '"');
        $resultado = $conexion->stmt_init();
        $resultado->prepare('Select * from agenda');
        $resultado->execute();
        $resultado->bind_result($Id_Contacto, $Nombre, $Apellido_1, $Apellido_2, $Numero);
        $resultado->fetch();
        echo ('
        <form action="#" method="post">
            <fieldset>
                <legend>Datos</legend>
                <label>Nombre:<input type="text" name="Nombre" required value="' . $Nombre . '"></label>
                <br>
                <label>Apellido 1:<input type="text" name="Apellido1" required value="' . $Apellido_1 . '"></label>
                <br>
                <label>Apellido 2:<input type="text" name="Apellido2" required value="' . $Apellido_2 . '"></label>
                 <br>
                <label> Numero:<input type="number" name="Numero" required value="' . $Numero . '"></label>
                <label><input type="submit"></label>
            </fieldset>
        </form></br>');
        $resultado->close();
    } else {
        ImprimirFormVacio();

    }
    lista_contacto();

}

function lista_contacto()
{
    $conexion = new mysqli('localhost', 'Agenda', 'agenda', 'agenda');
    $resultado = $conexion->query('Select * from agenda');
    $resultado = $conexion->stmt_init();
    $resultado->prepare('Select * from agenda');
    $resultado->execute();
    $resultado->bind_result($Id_Contacto, $Nombre, $Apellido_1, $Apellido_2, $Numero);

    while ($resultado->fetch()) {
        echo 'Nombre ' . $Nombre . ' ' . $Apellido_1 . ' ' . $Apellido_2 . ' num telefono:'.$Numero.'  <a href="./contactoNuevo.php?id=' . $Id_Contacto . '&action=borrar"> borrar </a>  <a href="./contactoNuevo.php?id=' . $Id_Contacto . '&action=mod" > modificar </a>  </br> ';

    }
    $resultado->close();
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

function ImprimirFormVacio()
{
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
}

//código con instrucciones php

?>