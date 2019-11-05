<?php
include_once ("../model/reservaModel.php");

$reserva=new reservaModel();

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