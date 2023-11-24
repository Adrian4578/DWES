<?php
require_once('Conexion.inc.php');
// En cada visita se añade un valor al array "visitas"
try {
    if ($_POST) {
        $opc = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');
        $CONEXION = new Conexion("tareasdb", "root");
        $CONEXION->conectar();
        if ($CONEXION->__get("conexion") != null) {
            $consulta = $CONEXION->__get("conexion")->prepare('INSERT INTO usuarios (nombre,correo,contrasena,imgGrande,imgPequeña) VALUES (?,?,?,?,?);');
            $NOMBRE = $_POST['usuario'];
            $CORREO = $_POST['correo'];


            $CONEXION2 = new Conexion("tareasdb", "root");
            $CONEXION2->conectar();
            $resultado = $CONEXION2->__get("conexion")->query('SELECT *  FROM usuarios where nombre="' . $_POST['usuario'] . '";');
            $bool = $resultado->fetchObject();
            if ($bool) {
                echo "usuario ya existe eljie otro nombre";
            } else {

                if ($_FILES['img']['error'] != UPLOAD_ERR_OK) {
                    switch ($_FILES['img']['error']) {
                        case UPLOAD_ERR_INI_SIZE:
                        case UPLOAD_ERR_FORM_SIZE:
                            echo 'El fichero es demasiado grande';
                            break;
                        case UPLOAD_ERR_PARTIAL:
                            echo 'El fichero no se ha podido subir entero';
                            break;
                        case UPLOAD_ERR_NO_FILE:
                            echo 'No se ha podido subir el fichero';
                            break;
                        default:
                            echo 'Error indeterminado.';
                    }
                } {
                    if ($_FILES['img']['type'] != 'image/jpeg' && $_FILES['img']['type'] != 'image/png' && $_FILES['img']['type'] != 'image/jpg') { // Se comprueba que sea del tipo esperado

                        echo 'Error: No se trata de un fichero .jpg o .png. ' . $_FILES['img']['type'];
                    } else {
                        $tamaño = getimagesize($_FILES['img']['tmp_name']);
                        if ($tamaño[0] > 360 || $tamaño[1] > 480) {
                            echo 'La imagen es muy grande';

                        } else {

                            $imageGrande = imagecreate(360, 480);
                            $imagePequeña = imagecreate(72, 96);

                            $thumbG = imagecreatetruecolor(360, 480);
                            $thumbP = imagecreatetruecolor(72, 96);

                            
                            switch ($_FILES['img']['type']) {
                                case 'image/jpeg':
                                    
                                    imagecopyresized($thumbP, imagecreatefromjpeg($_FILES['img']['tmp_name']), 0, 0, 0, 0, 72, 96, $tamaño[0], $tamaño[1]);
                                    if (!is_dir('fotos/img/users/' . $NOMBRE . '')) {
                                        mkdir('fotos/img/users/' . $NOMBRE . '',0777,true);
                                    }
                                    imagepng($thumbP, 'fotos/img/users/' . $NOMBRE . '/'.$NOMBRE.'Small.png');
                                    imagecopyresized($thumbG, imagecreatefromjpeg($_FILES['img']['tmp_name']), 0, 0, 0, 0, 360, 480, $tamaño[0], $tamaño[1]);
                                    imagepng($thumbG, 'fotos/img/users/' . $NOMBRE . '/'.$NOMBRE.'Big.png');
                                    break;

                                case 'image/jpg':
                             
                                    imagecopyresized($thumbP, imagecreatefromjpeg($_FILES['img']['tmp_name']), 0, 0, 0, 0, 72, 96, $tamaño[0], $tamaño[1]);
                                    if (!is_dir('fotos/img/users/' . $NOMBRE . '')) {
                                        mkdir('fotos/img/users/' . $NOMBRE . '',0777,true);
                                    }
                                    imagepng($thumbP, 'fotos/img/users/' . $NOMBRE . '/'.$NOMBRE.'Small.png');
                                    imagecopyresized($thumbG, imagecreatefromjpeg($_FILES['img']['tmp_name']), 0, 0, 0, 0, 360, 480, $tamaño[0], $tamaño[1]);
                                    imagepng($thumbG, 'fotos/img/users/' . $NOMBRE . '/'.$NOMBRE.'Big.png');
                                    break;


                                case 'image/png':

                                    imagecopyresized($thumbP, imagecreatefromjpeg($_FILES['img']['tmp_name']), 0, 0, 0, 0, 72, 96, $tamaño[0], $tamaño[1]);
                                    if (!is_dir('fotos/img/users/' . $NOMBRE . '')) {
                                        mkdir('fotos/img/users/' . $NOMBRE . '',0777,true);
                                    }
                                    imagepng($thumbP, 'fotos/img/users/' . $NOMBRE . '/'.$NOMBRE.'Small.png');
                                    imagecopyresized($thumbG, imagecreatefromjpeg($_FILES['img']['tmp_name']), 0, 0, 0, 0, 360, 480, $tamaño[0], $tamaño[1]);
                                    imagepng($thumbG, 'fotos/img/users/' . $NOMBRE . '/'.$NOMBRE.'Big.png');
                                    break;

                                default:
                                    # code...
                                    break;
                            }

                            $pathG='fotos/img/users/' . $NOMBRE . '/'.$NOMBRE.'Big.png';
                            $pathS='fotos/img/users/' . $NOMBRE . '/'.$NOMBRE.'Small.png';
                            $consulta->bindParam(1, $NOMBRE);
                            $consulta->bindParam(2, $CORREO);
                            $pass = $_POST['contraseña'];
                            $hash = password_hash($pass, PASSWORD_DEFAULT);
                            $consulta->bindParam(3, $hash);
                            $consulta->bindParam(4, $pathG);
                            $consulta->bindParam(5, $pathS);
                            $consulta->execute();
                            header('Location: ./login.php ');
                        }

                    }


                }




            }
        }

    } {
        showForm();
    }
} catch (\Throwable $th) {
    echo $th->getMessage();
}


function showForm()
{
    echo '<form method="POST" action="#" enctype="multipart/form-data" >';
    echo "<table border='1'>";
    echo "<tr class='table-primary'><th colspan='7' id='cabecera'> Register</th></tr>";
    echo "<tr><th>Usuario</th><th>correo</th><th>Contraseña</th><th>Imagen</th></tr>";
    echo "<tr>";
    echo "<td><input type='text' name='usuario' required></td>";
    echo "<td><input type='mail' name='correo' required></td>";
    echo "<td><input type='password' name='contraseña' required></td>";
    echo "<td><input type='file' name='img' id='archivo' required></td>";

    echo "</table>";
    echo "<br>";
    echo "<input type='submit' name='login'  class='btn btn-primary' value='Registrar '>  
                        ";
    echo "</form>";
}

?>