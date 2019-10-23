<?php

include_once ("../model/habitacion_model.php");

$habitacion= new habitacion_model();
$habitacion->setList();

$listaHabitacionJSON=$habitacion->getListJsonString(); //attributes PRIVATEs or PROTECTED

echo $listaHabitacionJSON;

unset ($habitacion);