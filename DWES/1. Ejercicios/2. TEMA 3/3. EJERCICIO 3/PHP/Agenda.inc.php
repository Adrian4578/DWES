
<?php 
class Agenda {
   
    private $Contactos;
    public function __construct() {
        $this->Contactos =  []  ;
    }

    public function __set($propiedad ,$valor)
    {
        # code...
        $this->$propiedad = $valor;
    }
    
    public function __get($propiedad)
    {
        # code...
       return $this->$propiedad ;
    }

    public function AñadirContacto(Contacto $contacto)
    {
        # code...
        $this->Contactos[]=$contacto;
    }
    public function MostrarContactos()
    {
        # code...
       foreach ($this->Contactos as $key => $value) {
        echo( $value);
       }
    }
    public function EliminarContacto(Contacto $contacto)
    {
        # code...
        foreach ($this->Contactos as $key => $value) {
            if ($value==$contacto) {
                unset($this->Contactos[$key]);
            }
        }
       
    }
}
?>