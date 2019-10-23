<?php

include_once ("../model/reserva_model.php");

$reserva=new reserva_model();

$idReserva=filter_input(INPUT_GET,"idReserva");
$idHabitacion=filter_input(INPUT_GET,"idHabitacion");
$idUsuario= filter_input(INPUT_GET,"idUsuario");
$fechaInicio=filter_input(INPUT_GET,"fechaInicio");
$fechaFin=filter_input(INPUT_GET,"fechaFin");
$precioTotal=filter_input(INPUT_GET,"precioTotal");


if ($idReserva!=null)
{
    $reserva->setIdReserva($idReserva);
    
    if ($idHabitacion!=null)
    {
        $reserva->setIdHabitacion($idHabitacion);
    }
    
    if ($idUsuario!=null)
    {
        $reserva->setIdUsuario($idUsuario);
    }
    
    if ($fechaInicio!=null)
    {
        $reserva->setFechaInicio($fechaInicio);
    }
    
    if ($fechaFin!=null)
    {
        $reserva->setFechaFin($fechaFin);
    }
    
    if ($precioTotal!=null)
    {
        $reserva->setPrecioTotal($precioTotal);
    }
    
    
    
    $resultado=$reserva->update();
} else{
    $resultado="No se ha pasado id";
}
echo $resultado;


?>