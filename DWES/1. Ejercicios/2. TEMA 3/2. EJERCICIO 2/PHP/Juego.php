<?php
class Juego extends Soporte
{
    public $consola;
    private $minNumJugadores;
    private $maxNumJugadores;


    public function __construct($titulo, $numero, $precio, $consola, $minNumJugadores, $maxNumJugadores)
    {
        parent::__construct($titulo, $numero, $precio);
        $this->consola = $consola;
        $this->minNumJugadores = $minNumJugadores;
        $this->maxNumJugadores = $maxNumJugadores;
    }

    public function muestraJugadoresPosibles()
    {
        if ($this->minNumJugadores == $this->maxNumJugadores) {
            if ($this->minNumJugadores == 1) {
                echo (" </br> Para 1 jugador");
            } else {
                echo (" </br> Para" . $this->maxNumJugadores . "Jugadores");
            }
        } else {
            echo ("</br> De" . $this->minNumJugadores . "a" . $this->maxNumJugadores);

        }
    }

    public function muestraResumen()
    {
        echo (parent::muestraResumen() . "</br>" . $this->muestraJugadoresPosibles());
    }
}


?>