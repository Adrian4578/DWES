<?php
class Dvd extends Soporte {
public $idiomas;
public $formatPantalla;


public function __construct ($titulo,$numero,$precio,$idiomas,$formatPantalla) {
    parent::__construct($titulo,$numero,$precio);
    $this->idiomas=$idiomas;
    $this->formatPantalla=$formatPantalla;
}

public function muestraResumen()
{
    echo(parent::muestraResumen()."</br>"."idiomas:".$this->idiomas."</br> 
    Formato pantalla".$this->formatPantalla);
}
}


?>