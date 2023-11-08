<?php
include("./confirmAuth.php");


$opc = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');
$conexion = new PDO('mysql:host=localhost;dbname=discografia', 'discografia', 'discografia', $opc);
if ($_POST) {
    switch ($_POST['BuscarEn']) {
        case 'Titulo':
            if ($_POST['genero'] != "") {
                $resultado = $conexion->query('SELECT *  FROM cancion where titulo like "%' . $_POST['Texto'] . '%" && genero="' . $_POST['genero'] . '";');
                if ($registro = $resultado->fetch(PDO::FETCH_ASSOC)) {
                    do {
                        echo "Titulo " . $registro['titulo'] . ' album  ' . $registro['album'] . " duracion " . $registro['duracion'] . " Genero " . $registro['genero'] . "</BR>";
                    } while ($registro = $resultado->fetch(PDO::FETCH_ASSOC));
                }
            } else {
                $resultado = $conexion->query('SELECT *  FROM cancion where titulo like "%' . $_POST['Texto'] . '%";');
                if ($registro = $resultado->fetch(PDO::FETCH_ASSOC)) {
                    do {
                        echo "Titulo " . $registro['titulo'] . ' album  ' . $registro['album'] . " duracion " . $registro['duracion'] . " Genero " . $registro['genero'] . "</BR>";
                    } while ($registro = $resultado->fetch(PDO::FETCH_ASSOC));
                }
            }

            break;
        case 'Nombre de album':
            $conexion2 = new PDO('mysql:host=localhost;dbname=discografia', 'discografia', 'discografia', $opc);
            $resultado2 = $conexion2->query('SELECT *  FROM album where titulo like "%' . $_POST['Texto'] . '%";');

            if ($_POST['genero'] != "") {
                $registroAlt = $resultado2->fetch(PDO::FETCH_ASSOC);
                do {
                    $resultado = $conexion->query('SELECT *  FROM cancion where album = "' . $registroAlt['cod'] . '" && genero="' . $_POST['genero'] . '";');
                    if ($registro = $resultado->fetch(PDO::FETCH_ASSOC)) {
                        do {
                            echo "Titulo " . $registro['titulo'] . ' album  ' . $registroAlt['titulo'] . " duracion " . $registro['duracion'] . " Genero " . $registro['genero'] . "</BR>";
                        } while ($registro = $resultado->fetch(PDO::FETCH_ASSOC));

                    }

                } while ($registroAlt = $resultado2->fetch(PDO::FETCH_ASSOC));

            } else {

                $registroAlt = $resultado2->fetch(PDO::FETCH_ASSOC);
                do {
                    $resultado = $conexion->query('SELECT *  FROM cancion where album = "' . $registroAlt['cod'] . '";');
                    if ($registro = $resultado->fetch(PDO::FETCH_ASSOC)) {
                        do {
                            echo "Titulo " . $registro['titulo'] . ' album  ' . $registroAlt['titulo']  . " duracion " . $registro['duracion'] . " Genero " . $registro['genero'] . "</BR>";
                        } while ($registro = $resultado->fetch(PDO::FETCH_ASSOC));

                    }

                } while ($registroAlt = $resultado2->fetch(PDO::FETCH_ASSOC));
            }
            break;

            case 'ambos':
                $conexion2 = new PDO('mysql:host=localhost;dbname=discografia', 'discografia', 'discografia', $opc);
                $resultado2 = $conexion2->query('SELECT *  FROM album where titulo like "%' . $_POST['Texto'] . '%";');
    
                if ($_POST['genero'] != "") {
                    $registroAlt = $resultado2->fetch(PDO::FETCH_ASSOC);
                    do {
                        $resultado = $conexion->query('SELECT *  FROM cancion where album = "' . $registroAlt['cod'] . '" && genero="' . $_POST['genero'] . '" && titulo LIKE "%'.$_POST['Texto'].'%";');
                        if ($registro = $resultado->fetch(PDO::FETCH_ASSOC)) {
                            do {
                                echo "Titulo " . $registro['titulo'] . ' album  ' . $registroAlt['titulo'] . " duracion " . $registro['duracion'] . " Genero " . $registro['genero'] . "</BR>";
                            } while ($registro = $resultado->fetch(PDO::FETCH_ASSOC));
    
                        }
    
                    } while ($registroAlt = $resultado2->fetch(PDO::FETCH_ASSOC));
    
                } else {
    
                    $registroAlt = $resultado2->fetch(PDO::FETCH_ASSOC);
                    do {
                        $resultado = $conexion->query('SELECT *  FROM cancion where album = "' . $registroAlt['cod'] . '" && titulo LIKE "%'.$_POST['Texto'].'%";');

                        if ($registro = $resultado->fetch(PDO::FETCH_ASSOC)) {
                            do {
                                echo "Titulo " . $registro['titulo'] . ' album  ' . $registroAlt['titulo']  . " duracion " . $registro['duracion'] . " Genero " . $registro['genero'] . "</BR>";
                            } while ($registro = $resultado->fetch(PDO::FETCH_ASSOC));
    
                        }
    
                    } while ($registroAlt = $resultado2->fetch(PDO::FETCH_ASSOC));
                }
                break;
        default:
            # code...
            break;
    }

    if (isset($_COOKIE['MicockieBusqueda'])) {
        $numL=sizeof($_COOKIE['MicockieBusqueda'])+1;
        setcookie('MicockieBusqueda['.$numL.']','Texto '. $_POST['Texto'].' Genero '.$_POST['genero']. 'Buscado en/por '.$_POST['BuscarEn'], time() + 3600);

    }



} else {
    showForm();
    if (isset($_COOKIE['MicockieBusqueda'])) {
        foreach ($_COOKIE['MicockieBusqueda'] as $nombre => $valor) {
           echo ''. $valor .'<br>';
        }
       }
}
function showForm()
{
    echo '<form method="POST" action="#" >
    <table border="1">';
    echo "<tr class='table-primary'>
            <th colspan='5' id='cabecera'>Nueva Cancion</th>
        </tr>";
    echo "<tr>
            <th>Texto a buscar</th>
            <th>Genero</th>
            <th>Buscar por</th>
        </tr>&nbsp;</td>";
    echo "<td><input type='text' name='Texto'></td>";
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
        <td><select name='BuscarEn'>
                <option selected>Titulo</option>
                <option >Nombre de album</option>
                <option >ambos</option>
        </td>
        </tr>
    </table><br>";
    echo "<input type='submit' ><br>";
    echo "<a href=\"index.php\"><input type='button' name='volver' value='Pagina Principal'></a>
</form>";
}

?>