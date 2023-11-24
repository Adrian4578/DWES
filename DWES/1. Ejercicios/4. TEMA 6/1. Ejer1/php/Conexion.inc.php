<?php
class Conexion
{


    private $conexion;
    private $bd;
    private $usuario;

    


    public function __construct( $bd, $usuario)
    {
        $this->bd = $bd;
        $this->usuario = $usuario;
       
    }

    public function conectar(){
        try {
            $opc = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');
            $this->conexion = new PDO('mysql:host=localhost;dbname='.$this->bd.'', $this->usuario, '', $opc);
        } catch (\Throwable $th) {
            //throw $th;
        }

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