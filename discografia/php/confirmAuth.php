<?php
session_start();
    if ($_SESSION['usuario']) {
        echo"Sesion iniciada en el usuario ".$_SESSION['usuario']  ;
    }else{
        header('Location: ./login.php ');
    }

    echo '    <button onclick=location.href="./login.php?no=no">Cerrar sesion </button> </br>'  
    ;
?>