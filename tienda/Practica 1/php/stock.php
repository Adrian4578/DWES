<?php
if ($_POST) {

    $conexion = new mysqli('localhost', 'Agenda', 'agenda', 'dwes');
    $conexion2 = mysqli_connect('localhost', 'Agenda', 'agenda', 'dwes');

    $resultado = $conexion->stmt_init();
    $resultado->prepare('UPDATE stock SET unidades=? WHERE producto="' . $_GET['id'] . '" and tienda=?');



    $resultado2 = $conexion2->stmt_init();
    $resultado2->prepare('Select * from stock where producto="' . $_GET['id'] . '"');
    $resultado2->execute();
    $resultado2->bind_result($prod, $tienda, $unidades);


    while ($resultado2->fetch()) {
        $Unidades = $_POST[$tienda];
        $resultado->bind_param('ii', $Unidades, $tienda);
        $resultado->execute();

    }
    $resultado2->close();
    $resultado->close();
    header("Location: ./main.php");
} else {
    $id = $_GET["id"];
    $conexion = mysqli_connect('localhost', 'Agenda', 'agenda', 'dwes');
    $conexion2 = mysqli_connect('localhost', 'Agenda', 'agenda', 'dwes');
    $resultado = $conexion->stmt_init();
    $resultado->prepare('Select * from stock where producto="' . $id . '"');
    $resultado->execute();
    $resultado->bind_result($prod, $tienda, $unidades);
    echo ('
    <h1>Stock</h1>
    <form action="#" method="post">
        <fieldset>
         
        ');

    while ($resultado->fetch()) {
        $resultado2 = $conexion2->stmt_init();
        $resultado2->prepare('Select nombre from tienda where cod=' . $tienda . '');
        $resultado2->execute();
        $resultado2->bind_result($Nomtienda);
        $resultado2->fetch();

        echo ('<label>En tienda : ' . $Nomtienda . ' Numero de unidades : <input type="num" name="' . $tienda . '" required value="' . $unidades . '"></label>

        <br>');

    }

    echo ('
     <label><input type="submit"></label>
        </fieldset>
    </form></br>');
    $resultado->close();
    $resultado2->close();

}


?>