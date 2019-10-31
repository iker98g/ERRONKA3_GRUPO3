<?php

include_once ("../model/reservaModel.php");

$fechaInicio=filter_input(INPUT_GET, 'fechaInicio');
$fechaFin=filter_input(INPUT_GET, 'fechaFin');

$reserva=new reservaModel();

$reserva->comprobarDisponibilidad($fechaInicio, $fechaFin); //function comprobarDisponibilidad en reserva_model

$listaReservasJSON=$reserva->getListJsonString(); //attributes PRIVATEs or PROTECTED

echo $listaReservasJSON;

unset ($reserva);

?>