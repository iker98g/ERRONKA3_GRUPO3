<?php

include_once ("../model/habitacion_model.php");

$habitaciones= new habitacion_model();
$habitaciones->setList();

$listaHabitacionesJSON=$habitaciones->getListJsonString(); //attributes PRIVATEs or PROTECTED

echo $listaHabitacionesJSON;

unset ($habitaciones);