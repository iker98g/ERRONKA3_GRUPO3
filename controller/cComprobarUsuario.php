<?php
include_once ("../model/usuarioModel.php");

$username=filter_input(INPUT_POST, 'username');

$registro=new usuarioModel();

$registro->comprobarUsuario($username); //function comprobarDisponibilidad en reserva_model

$listaReservasJSON=$registro->getListJsonString(); //attributes PRIVATEs or PROTECTED

echo $listaReservasJSON;

unset ($registro);
?>