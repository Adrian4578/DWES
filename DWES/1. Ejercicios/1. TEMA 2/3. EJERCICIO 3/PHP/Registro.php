<?php
//código con instrucciones php
require("cabecera.inc.php");
if ($_POST) {

    $Mal=false;
    if ($_POST['Contraseña'] != $_POST['Contraseña2']) {
        echo("La contraseña no coincide</br>");
        $_POST['Contraseña'] = "";
        $_POST['Contraseña2'] = "";
        $Mal=true;
    }
    if (!preg_match("'^(.+)@(\\S+)$'", $_POST["Email"])) {
        $_POST['Email'] = "";
        $Mal=true;
    }
    if (preg_match('~[0-9]+~', $_POST["Nombre"])) {
        echo("El nombre no puede contener numeros</br>");
        $_POST['Nombre'] = "";
        $Mal=true;
    }
    if (preg_match('~[0-9]+~', $_POST["Apellidos"])) {
        echo("Los apellidos no pueden contener numeros</br>");
        $_POST['Apellidos'] = "";
        $Mal=true;
    }

    if ($Mal) {
        ImprimirForm();
    }else{
     echo("El registro se a realizado correctamente  </br>");   
    }


} else {
    echo ('
        <form action="#" method="post">
            <fieldset>
                <legend>Datos</legend>
                <label>Nombre:<input type="text" name="Nombre" required></label>
                <br>
                <label>Apellidos:<input type="text" name="Apellidos" required ></label>
                <br>
                <label>Nombre de usuario:<input type="text" name="NombreUsuario" required></label>
                <br>
                <label>Constraseña:<input type="password" name="Contraseña" required></label>
                <br>
                <label>Repite Constraseña:<input type="password" name="Contraseña2" required></label>
                <br>
                <label>Email:<input type="email" name="Email" required></label>
                <br>
                <label>Fecha de nacimiento:<input type="date" name="FechaNacimiento" required></label>
                <br>
                <label>Genero:<input type="text" name="Genero" required></label>
                <br>
                <label>Terminos y condiciones:<input type="checkbox" name="Terminos" required></label>
                <br>
                <label>Quiere que le enviemos publicidad?:<input type="checkbox" name="Publi" required></label>
                <br>
                <label><input type="submit"></label>
            </fieldset>
        </form>');

}
function ImprimirForm()
{
    echo("Hay errores en el formulario porfavor rellene los campos vacios de nuevo" );
    echo ('
        <form action="#" method="post">
            <fieldset>
                <legend>Datos</legend>
                <label>Nombre:<input type="text" name="Nombre" required value="' . $_POST["Nombre"] . '"></label>
                <br>
                <label>Apellidos:<input type="text" name="Apellidos" required value="' . $_POST["Apellidos"] . '"></label>
                <br>
                <label>Nombre de usuario:<input type="text" name="NombreUsuario" required value="' . $_POST["NombreUsuario"] . '"></label>
                <br>
                <label>Constraseña:<input type="password" name="Contraseña" required value="' . $_POST["Contraseña"] . '"></label>
                <br>
                <label>Repite Constraseña:<input type="password" name="Contraseña2" required value="' . $_POST["Contraseña2"] . '"></label>
                <br>
                <label>Email:<input type="email" name="Email" required value="' . $_POST["Email"] . '"></label>
                <br>
                <label>Fecha de nacimiento:<input type="date" name="FechaNacimiento" required value="' . $_POST["FechaNacimiento"] . '"></label>
                <br>
                <label>Genero:<input type="text" name="Genero" required value="' . $_POST["Genero"] . '"></label>
                <br>
                <label>Terminos y condiciones:<input type="checkbox" name="Terminos" required value="' . $_POST["Terminos"] . '"></label>
                <br>
                <label>Quiere que le enviemos publicidad?:<input type="checkbox" name="Publi" required value="' . $_POST["Publi"] . '"></label>
                <br>
                <label><input type="submit"></label>
            </fieldset>
        </form></br>');
}

//código con instrucciones php
require("footer.inc.php");
?>