<?php
$conexion = mysqli_connect('localhost', 'Agenda', 'agenda', 'dwes');


    $resultado = $conexion->stmt_init();
    $resultado->prepare('Select * from producto');
    $resultado->execute();
    $resultado->bind_result($cod, $Nombre, $nombreCorto, $descripcion, $pvp,$familia);

    while ($resultado->fetch()) {
        echo 'Nombre ' . $nombreCorto . ' Precio ' . $pvp . ' Familia:'.$familia.'  <a href="./stock.php?id=' . $cod . '"> Mostrar stock </a>  </br> ';
    }
    $resultado->close();

?>