<?php
require_once('Contacto.inc.php');
require_once('Agenda.inc.php');

$miAgenda = new Agenda();


$Contacto1 = new Contacto("juan","manolo","alvarez",64440542);
$Contacto2 = new Contacto("pedro","sanchez","almillan",64324542);
$Contacto3= new Contacto("alejadro","muñoz","alvarez",64440542);

$miAgenda->AñadirContacto($Contacto1);
$miAgenda->AñadirContacto($Contacto2);
$miAgenda->AñadirContacto($Contacto3);
$miAgenda->MostrarContactos();
echo("</br>");
$miAgenda->EliminarContacto($Contacto1);
$miAgenda->MostrarContactos();
?>
