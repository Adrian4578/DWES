<?php
include("./confirmAuth.php");


$opc = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');
$conexion = new PDO('mysql:host=localhost;dbname=discografia', 'discografia', 'discografia', $opc);
$resultado = $conexion->query('SELECT *  FROM album;');
echo ' <a href="./disconuevo.php">Disco Nuevo </a> </BR>
<a href="./canciones.php">Canciones </a></BR> ';
while ($registro = $resultado->fetch(PDO::FETCH_ASSOC)) {
echo 'Titulo: '.$registro['titulo'] ;
echo ' <a href="./disco.php?codigoDisco='.$registro['cod'].'">Ver </a> </BR>';
}
?>
