<?php
include_once ("../model/reservaModel.php");

$reserva= new reservaModel();
$userId=filter_input(INPUT_GET,"userId");

$reserva->setReservasUser($userId);

$listaReservasJSON=$reserva->getListJsonStringObject(); //attributes PRIVATEs or PROTECTED

echo $listaReservasJSON;

unset ($reserva);
?>