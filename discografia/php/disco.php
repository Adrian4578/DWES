<?php
include("./confirmAuth.php");


$opc = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');
$conexion = new PDO('mysql:host=localhost;dbname=discografia', 'discografia', 'discografia', $opc);
$resultado = $conexion->query('SELECT *  FROM cancion where album='. $_GET['codigoDisco'] .';');
$conexion2 = new PDO('mysql:host=localhost;dbname=discografia', 'discografia', 'discografia', $opc);
$resultado2 = $conexion->query('SELECT *  FROM album where cod='.$_GET['codigoDisco'] .';');

while ($registro = $resultado2->fetch(PDO::FETCH_ASSOC)) {
    echo 'Titulo: '.$registro['titulo']. ' Discografia: '.$registro['discografia'].' Formato: '.$registro['formato']
    .' FechaLanzamiento: '.$registro['fechaLanzamiento'].' FechaCompra: '.$registro['fechaCompra'] 
    .' precio: '.$registro['precio'] .'</BR> <a href="./cancionnueva.php?codigoDisco='.$registro['cod'].'">Añadir Cancion </a></BR> <a href="./borrardisco.php?codigoDisco='.$registro['cod'].'">Borrar Disco </a> </BR> </br>  </br><h2>Canciones</h2>';
};
while ($registro = $resultado->fetch(PDO::FETCH_ASSOC)) {
echo $registro['titulo'] .'</BR>';
}
?>