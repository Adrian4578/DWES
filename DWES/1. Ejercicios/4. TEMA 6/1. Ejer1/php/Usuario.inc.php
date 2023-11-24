<?php
class Usuario
{


    private $nombre;
    private $correo;
    private $contraseña;


    public function __construct($nombre, $correo, $contraseña)
    {
        $this->nombre = $nombre;
        $this->correo = $correo;
        $this->contraseña = $contraseña;
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
 
}
?>