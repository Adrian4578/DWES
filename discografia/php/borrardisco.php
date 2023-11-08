<?php
include("./confirmAuth.php");
$opc = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');
$conexion = new PDO('mysql:host=localhost;dbname=discografia', 'discografia', 'discografia', $opc);
$ok = true;
$conexion->beginTransaction(); // Devuelve true o false, si cambia o no el modo
if ($conexion->exec('DELETE FROM cancion WHERE album='.$_GET['codigoDisco'].';')){
    $conexion->exec('DELETE FROM album WHERE cod='.$_GET['codigoDisco'].';') ;
}else{
    $ok = false;
}

if ($ok){
    $conexion->commit(); // Si todo fue bien, confirma los cambios
    header('Location: ./index.php ');
}
else{
    $conexion->rollback(); // y si no, los revierte
}

?>