<?php
// En cada visita se añade un valor al array "visitas"

if ($_POST) {
    $opc = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');
    $conexion = new PDO('mysql:host=localhost;dbname=discografia', 'discografia', 'discografia', $opc);

    $consulta = $conexion->prepare('INSERT INTO tabla_usuarios (usuario,password) VALUES (?,?);');
    $NOMBRE = $_POST['usuario'];
    $conexion2 = new PDO('mysql:host=localhost;dbname=discografia', 'discografia', 'discografia', $opc);
    $resultado = $conexion2->query('SELECT *  FROM tabla_usuarios where usuario="' . $_POST['usuario'] . '";');
    if ($resultado) {
        echo "usuario ya existe eljie otro nombre";
    }else{
        $consulta->bindParam(1, $NOMBRE);
        $pass = $_POST['contraseña'];
        $hash = password_hash($pass, PASSWORD_DEFAULT);
        $consulta->bindParam(2, $hash);
        $consulta->execute();
        header('Location: ./login.php ');
    }
}{
    showForm();
}

function showForm()
{
    echo '<form method="POST" action="#" >';
    echo "<table border='1'>";
    echo "<tr class='table-primary'><th colspan='7' id='cabecera'> Register</th></tr>";
    echo "<tr><th>Usuario</th><th>Contraseña</th></tr>";
    echo "<tr>";
    echo "<td><input type='text' name='usuario' required></td>";
    echo "<td><input type='password' name='contraseña' required></td>";

    echo "</table>";
    echo "<br>";
    echo "<input type='submit' name='login'  class='btn btn-primary' value='Registrar '>  
                        ";
    echo "</form>";
}

?>