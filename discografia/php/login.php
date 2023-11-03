<?php
error_reporting(E_ERROR | E_PARSE);
if ($_POST) {
    $opc = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');
    $conexion = new PDO('mysql:host=localhost;dbname=discografia', 'discografia', 'discografia', $opc);
    $resultado = $conexion->query('SELECT *  FROM tabla_usuarios where usuario="' . $_POST['usuario'] . '";');
    if ($resultado) {
        $registro = $resultado->fetch(PDO::FETCH_ASSOC);

        if (password_verify($_POST['contraseña'], $registro['password'])) {
            echo "Login correcto";
          
            setcookie('Micockie[0]', $_POST['usuario'], time() + 3600);
            setcookie('Micockie[1]', $registro['password'], time() + 3600);

        } else {
            echo "Login fallido";
        }
    }
} else {
    if (isset($_COOKIE["Micockie"])) {
        echo '<form method="Get" action="#" >';
        echo "<input type='submit' name='si'  class='btn btn-primary' value='si'>  
        ";
        echo "<input type='submit' name='no'  class='btn btn-primary' value='no'>  
                            ";
        echo "</form>";

        if ($_GET['si'] ||$_GET['no'] ) {
            echo $_COOKIE["Micockie"][0];
            if ($_GET['si']=="si") {
                echo"Login correcto";
            }else{
                setcookie('Micockie[0]', "", time() - 3600);
                setcookie('Micockie[1]', "", time() - 3600);
                header('Location: ./login.php ');
            }
        }
    } else {
        showForm();
    }

}

function showForm()
{
    echo '<form method="POST" action="#" >';
    echo "<table border='1'>";
    echo "<tr class='table-primary'><th colspan='7' id='cabecera'> Login</th></tr>";
    echo "<tr><th>Usuario</th><th>Contraseña</th></tr>";
    echo "<tr>";
    echo "<td><input type='text' name='usuario' required></td>";
    echo "<td><input type='password' name='contraseña' required></td>";

    echo "</table>";
    echo "<br>";
    echo "<input type='submit' name='login'  class='btn btn-primary' value='login '>  
                        ";
    echo "</form>";
}

?>