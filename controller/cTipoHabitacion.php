<?php

include_once ("../model/habitacionModel.php");

$tipo=filter_input(INPUT_GET,"tipo");

$habitacion= new habitacionModel();
$habitacion->setTipo($tipo);

$habitacion->findByType();

$listaHabitacionJSON=$habitacion->getListJsonString(); //attributes PRIVATEs or PROTECTED

echo $listaHabitacionJSON;

unset ($habitacion);

?>