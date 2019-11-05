<?php
include_once ("../model/reservaModel.php");

$reserva= new reservaModel();
$reserva->setList();

$listaReservasJSON=$reserva->getListJsonString(); //attributes PRIVATEs or PROTECTED

echo $listaReservasJSON;

unset ($reserva);
?>