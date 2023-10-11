<?php
class Contacto
{

    private  $idContacto = 0;
    private $nombre;
    private $apellido1;
    private $apellido2;
    private $telefono;


    public function __construct($nombre, $apellido1, $apellido2, $telefono)
    {
        $this->nombre = $nombre;
        $this->idContacto=rand (1,1000);
        $this->telefono = $telefono;
        $this->apellido1 = $apellido1;
        $this->apellido2 = $apellido2;
    }

    public function __set($propiedad, $valor)
    {
        # code...
        $this->$propiedad = $valor;
    }

    public function __get($propiedad)
    {
        # code...
        return $this->$propiedad;
    }
    public function __toString()
    {
        return 'Nombre: ' . $this->nombre
            . ' ID: ' .  $this->idContacto
            . ' Apellidos: ' . $this->apellido1
            . ' ' . $this->apellido2
            . ' Telefono:' . $this->telefono . '</br>';
    }
}
?>