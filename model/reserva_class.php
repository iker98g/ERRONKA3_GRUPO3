<?php
class reserva_class {
    
    protected $idReserva;
    protected $idHabitacion;
    protected $idUsuario;
    protected $fechaInicio;
    protected $fechaFin;
    protected $precioTotal;
    
    public function getIdReserva()
    {
        return $this->idReserva;
    }

    public function getIdHabitacion()
    {
        return $this->idHabitacion;
    }

    public function getIdUsuario()
    {
        return $this->idUsuario;
    }

    public function getFechaInicio()
    {
        return $this->fechaInicio;
    }

    public function getFechaFin()
    {
        return $this->fechaFin;
    }

    public function getPrecioTotal()
    {
        return $this->precioTotal;
    }

    public function setIdReserva($idReserva)
    {
        $this->idReserva = $idReserva;
    }

    public function setIdHabitacion($idHabitacion)
    {
        $this->idHabitacion = $idHabitacion;
    }

    public function setIdUsuario($idUsuario)
    {
        $this->idUsuario = $idUsuario;
    }

    public function setFechaInicio($fechaInicio)
    {
        $this->fechaInicio = $fechaInicio;
    }

    public function setFechaFin($fechaFin)
    {
        $this->fechaFin = $fechaFin;
    }

    public function setPrecioTotal($precioTotal)
    {
        $this->precioTotal = $precioTotal;
    }

    function getObjectVars()
    {
        $vars = get_object_vars($this);
        return $vars;
    }
}
?>