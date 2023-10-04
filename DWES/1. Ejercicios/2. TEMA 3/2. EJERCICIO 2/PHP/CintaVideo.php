<?php
class CintaVideo extends Soporte {
public $duracion;


public function __construct ($titulo,$numero,$precio,$duracion) {
    parent::__construct($titulo,$numero,$precio);
    $this->duracion=$duracion;
}
public function muestraResumen()
{
    echo(parent::muestraResumen()."</br> Duracion:".$this->duracion."minutos");
}

}


?>