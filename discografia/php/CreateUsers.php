<?php
$opc = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');
$conexion = new PDO('mysql:host=localhost;dbname=discografia', 'discografia', 'discografia', $opc);

$consulta = $conexion->prepare('INSERT INTO tabla_usuarios (usuario,password) VALUES (?,?);');
$NOMBRE = "cuki";
$consulta->bindParam(1, $NOMBRE);
$pass = 'aymicuki';
$hash = password_hash($pass, PASSWORD_DEFAULT);
$consulta->bindParam(2, $hash);
$consulta->execute();
?>