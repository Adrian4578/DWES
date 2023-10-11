<?php
echo $_GET['id'];

$conexion = new mysqli('localhost', 'Agenda', 'agenda', 'agenda');
$resultado = $conexion->query('Select * from agenda where Id_contacto="'.$_GET['id'].'"');
if ($resultado) {
   $resultado="";
   $resultado = $conexion->query('DELETE FROM agenda WHERE Id_Contacto= ' . $_GET['id'] . ';');
}

if ($resultado) {
    header("Location: ./contactoNuevo.php");
    die();
}
?>