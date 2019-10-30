<?php

include_once ("../model/usuario_model.php");

$username=filter_input(INPUT_GET, 'username');

$registro=new usuario_model();

$registro->comprobarUsuario($username); //function comprobarDisponibilidad en reserva_model

$listaReservasJSON=$registro->getListJsonString(); //attributes PRIVATEs or PROTECTED

echo $listaReservasJSON;

unset ($registro);

?>