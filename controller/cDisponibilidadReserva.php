<?php

include_once ("../model/reservaModel.php");

$fechaInicio=filter_input(INPUT_POST, 'fechaInicio');
$fechaFin=filter_input(INPUT_POST, 'fechaFin');

$reserva=new reservaModel();

$reserva->comprobarDisponibilidad($fechaInicio, $fechaFin); //function comprobarDisponibilidad en reserva_model

$listaReservasJSON=$reserva->getListJsonString(); //attributes PRIVATEs or PROTECTED

echo $listaReservasJSON;

unset ($reserva);

?>