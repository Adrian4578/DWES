<?php

$id = $_GET["ID"];

@$BBDD = new mysqli('localhost', 'agenda', '', 'agenda');
if ($BBDD->connect_errno != null) {
    echo 'Error conectando a la base de datos: ';
    echo '$BBDD->connect_error';
};


 echo ('Se ha borrado el contacto con la ID: ' . $id);

$BBDD->query('DELETE FROM contacto WHERE contacto.ID = '.$id.'');
 echo('<br><a href="contactonuevo_2.php"><button>Volver</button></a>');
