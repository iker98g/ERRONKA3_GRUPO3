<?php

include_once ("../model/reserva_model.php");

$reserva= new reserva_model();
$reserva->setList();

$listaReservasJSON=$reserva->getListJsonString(); //attributes PRIVATEs or PROTECTED

echo $listaReservasJSON;

unset ($reserva);