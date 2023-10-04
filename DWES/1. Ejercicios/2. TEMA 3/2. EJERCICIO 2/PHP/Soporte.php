<?php
include "Resumible.php";
abstract class Soporte implements Resumible {
public $titulo;

protected $numero;

private $precio;
 private  CONST IVA =1.21;

public function __construct ($titulo,$numero,$precio) {
$this->titulo = $titulo;
$this->numero = $numero;
$this->precio = $precio;
}

public function getPrecioConIVA()
{
    return $this->precio*self::IVA;
}

public function getPrecio()
{
    return $this->precio;
}

public function muestraResumen()
{
    echo("</br>".$this->titulo."</br>".$this->precio ."€ (IVA NO INCLUIDO)");
}

}

?>