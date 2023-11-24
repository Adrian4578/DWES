<?php
require_once('Conexion.inc.php');

    session_start();

    $CONEXION = new Conexion("tareasdb", "root");
    $CONEXION->conectar();

    $resultado = $CONEXION->__get("conexion")->query('SELECT *  FROM usuarios where nombre="' . $_SESSION['usuario'] . '";');
    $registro = $resultado->fetch(PDO::FETCH_ASSOC);

    
    echo('<div> <p>'.$registro['nombre'].'</p> <img src="'.$registro['imgPequeña'].'" alt=""></div> </br>');
    echo('<div> <img src="'.$registro['imgGrande'].'" alt=""></div> </br> <p>'.$registro['nombre'].'</p></br> <p>'.$registro['correo'].'</p>');

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
    <div> <p></p> <img src="" alt=""></div>

    <div><p></p> <p></p> <img src="" alt=""></div>
</body>
</html>