<?php
include_once ("../model/habitacionModel.php");

$habitaciones= new habitacionModel();
$habitaciones->setList();

$listaHabitacionesJSON=$habitaciones->getListJsonString(); //attributes PRIVATEs or PROTECTED

echo $listaHabitacionesJSON;

unset ($habitaciones);
?>