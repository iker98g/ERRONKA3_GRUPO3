<?php

include_once ("../model/reserva_model.php");

$reserva=new reserva_model();

$idReserva=filter_input(INPUT_GET,"idReserva");

if ($idReserva!=null)
{
    $reserva->setIdReserva($idReserva);
    $resultado=$reserva->delete();
} else{
    $resultado="No se ha pasado id";
}
echo $resultado;


?>