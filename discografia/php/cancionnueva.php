<?php
include("./confirmAuth.php");


$opc = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');
$conexion = new PDO('mysql:host=localhost;dbname=discografia', 'discografia', 'discografia', $opc);
if ($_POST) {
    // Opción 1
    $consulta = $conexion->prepare('INSERT INTO cancion (titulo,album,posicion,duracion,genero) VALUES ("'.$_POST['titulo'].'",'.$_GET['codigoDisco'].','.$_POST['posicion'].',"'.$_POST['duracion'].'","'.$_POST['genero'].'");');
    $consulta->execute();
    showForm();

} else {
    showForm();
}

function showForm()
{
    echo '<form method="POST" action="#" >
    <table border="1">';
    echo "<tr class='table-primary'>
            <th colspan='5' id='cabecera'>Nueva Cancion</th>
        </tr>";
    echo "<tr>
            <th>Titulo</th>
            <th>Album</th>
            <th>Posicion</th>
            <th>Duracion</th>
            <th>Genero</th>
        </tr>&nbsp;</td>";
    echo "<td><input type='text' name='titulo'></td>";
    echo "<td>" . $_GET['codigoDisco'] . "</td>";
    echo "<td><input type='text' name='posicion'></td>";
    echo "<td><input type='time' name='duracion'></td>";
    echo "<td><select name='genero'>
                <option>Acustica</option>
                <option>BSO</option>
                <option>Blues</option>
                <option>Folk</option>
                <option>Jazz</option>
                <option>New age</option>
                <option>Pop</option>
                <option>Rock</option>
                <option>Electronica</option>
                <option></option>
        </td>
        </tr>
    </table><br>";
    echo "<input type='submit' ><br>";
    echo "<a href=\"index.php\"><input type='button' name='volver' value='Pagina Principal'></a>
</form>";
}

?>