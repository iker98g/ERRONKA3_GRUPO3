<?php
include_once ("../model/reservaModel.php");

$reserva= new reservaModel();
$reserva->setList();

$listaReservasJSON=$reserva->getListJsonStringObject(); //attributes PRIVATEs or PROTECTED

echo $listaReservasJSON;

unset ($reserva);
?>