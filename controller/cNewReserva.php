<?php

include_once ("../model/reservaModel.php");

$idHabitacion=filter_input(INPUT_GET, 'idHabitacion');
$idUsuario=filter_input(INPUT_GET, 'idUsuario');
$fechaInicio=filter_input(INPUT_GET, 'fechaInicio');
$fechaFin=filter_input(INPUT_GET, 'fechaFin');
$precioTotal=filter_input(INPUT_GET, 'precioTotal');

$reserva=new reservaModel();

$reserva->setIdHabitacion($idHabitacion);
$reserva->setIdUsuario($idUsuario);
$reserva->setFechaInicio($fechaInicio);
$reserva->setFechaFin($fechaFin);
$reserva->setPrecioTotal($precioTotal);

$resultado=$reserva->insertReserva(); //function insert en reserva_model

?>