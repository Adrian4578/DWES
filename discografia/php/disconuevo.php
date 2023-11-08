<?php
include("./confirmAuth.php");


$opc = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');
$conexion = new PDO('mysql:host=localhost;dbname=discografia', 'discografia', 'discografia', $opc);
if ($_POST) {
    // Opción 1
    $consulta = $conexion->prepare('INSERT INTO album (titulo,discografia,formato,fechaLanzamiento,fechaCompra,precio) VALUES ("'.$_POST['titulo'].'","'.$_GET['discografica'].'","'.$_POST['formato'].'","'.$_POST['fechaLanzamiento'].'","'.$_POST['fechaCompra'].'",'.$_POST['precio'].');');
    $consulta->execute();

    header('Location: ./index.php ');

} else {
    showForm();
}


function showForm()
{
    echo '<form method="POST" action="#" >';
    echo "<table border='1'>";
    echo "<tr class='table-primary'><th colspan='7' id='cabecera'>Nuevo Disco</th></tr>";
    echo "<tr><th>Titulo</th><th>Discografica</th><th>Formato</th><th>Fecha Lanzamiento</th><th>Fecha Compra</th><th>Precio</th></tr>";
    echo "<tr>";
    echo "<td><input type='text' name='titulo' required></td>";
    echo "<td><input type='text' name='discografica' required></td>";
    echo "<td><select name='formato' required>
                    <option>vinilo</option>
                    <option selected>cd</option>
                    <option>dvd</option>
                    <option>mp3</option></td>";
    echo "<td><input type='date' name='fechaLanzamiento' ></td>";
    echo "<td><input type='date' name='fechaCompra' ></td>";
    echo "<td><input type='text' name='precio' ></td>";
    echo "</tr>";
    echo "</table>";
    echo "<br>";
    echo "<input type='submit' name='guardar'  class='btn btn-primary' value='Guardar Datos'>  
                          <a href=\"index.php\"><input type='button' name='volver' class='btn btn-primary' value='Pagina Principal'></a>";
    echo "</form>";
}

?>