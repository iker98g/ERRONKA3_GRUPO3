<?php
include_once ("../model/reservaModel.php");

$idHabitacion=filter_input(INPUT_POST, 'idHabitacion');
$idUsuario=filter_input(INPUT_POST, 'idUsuario');
$fechaInicio=filter_input(INPUT_POST, 'fechaInicio');
$fechaFin=filter_input(INPUT_POST, 'fechaFin');
$precioTotal=filter_input(INPUT_POST, 'precioTotal');

$reserva=new reservaModel();

$reserva->setIdHabitacion($idHabitacion);
$reserva->setIdUsuario($idUsuario);
$reserva->setFechaInicio($fechaInicio);
$reserva->setFechaFin($fechaFin);
$reserva->setPrecioTotal($precioTotal);

$resultado=$reserva->insertReserva(); //function insert en reserva_model
?>