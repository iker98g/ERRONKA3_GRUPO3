<?php
class habitacion_class {
    
    protected $idHabitacion;
    protected $tipo;
    protected $imagen;
    protected $precio;
    
    public function getIdHabitacion()
    {
        return $this->idHabitacion;
    }

    public function getTipo()
    {
        return $this->tipo;
    }

    public function getImagen()
    {
        return $this->imagen;
    }

    public function getPrecio()
    {
        return $this->precio;
    }

    public function setIdHabitacion($idHabitacion)
    {
        $this->idHabitacion = $idHabitacion;
    }

    public function setTipo($tipo)
    {
        $this->tipo = $tipo;
    }

    public function setImagen($imagen)
    {
        $this->imagen = $imagen;
    }

    public function setPrecio($precio)
    {
        $this->precio = $precio;
    }

    function getObjectVars()
    {
        $vars = get_object_vars($this);
        return $vars;
    }    
}
?>