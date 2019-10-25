<?php

include_once ("../model/habitacion_model.php");

$tipo=filter_input(INPUT_GET,"tipo");

$habitacion= new habitacion_model();
$habitacion->setTipo($tipo);

$habitacion->findByType();

$listaHabitacionJSON=$habitacion->getListJsonString(); //attributes PRIVATEs or PROTECTED

echo $listaHabitacionJSON;

unset ($habitacion);

?>