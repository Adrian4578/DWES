<?php
setcookie("cookie[tres]", "valor tres");
setcookie("cookie[dos]", "valor dos");
setcookie("cookie[uno]", "valor uno");
// imprimirlas
if (isset($_COOKIE['cookie'])) {
 foreach ($_COOKIE['cookie'] as $nombre => $valor) {
 $name = htmlspecialchars($nombre);
 $value = htmlspecialchars($valor);
 echo '$nombre: '. $valor .'<br>';
 }
}

?>