<?php

// Se comprueba si la variable ya existe

session_start();
session_destroy();

require_once('Conexion.inc.php');
require_once('Usuario.inc.php');




error_reporting(E_ERROR | E_PARSE);
if ($_POST) {
    echo $_SESSION['usuario'];


    $CONEXION = new Conexion("tareasdb", "root");
    $CONEXION->conectar();
    if ($CONEXION->__get("conexion") != null) {
        $resultado = $CONEXION->__get("conexion")->query('SELECT *  FROM usuarios where nombre="' . $_POST['usuario'] . '";');
        if ($resultado) {
            $registro = $resultado->fetch(PDO::FETCH_ASSOC);
            if (password_verify($_POST['contraseña'], $registro['contrasena'])) {
                echo "Login correcto";
                session_start();
                $usuario = new Usuario($_POST['usuario'],$registro['correo'],$registro['contrasena']);
                $_SESSION['usuario'] = $usuario->__get("nombre");
                $_SESSION['usrId'] = $registro['id'];
                header('Location: ./index.php ');

            } else {
                echo "Login fallido";
                session_destroy();
                header('Location: ./login.php ');
            }
        }
    }
} else {
    showForm();
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
    echo '<button onclick=location.href="./Register.php">Registro </button>'
    ;
    echo "</form>";
}

?>