<?php
include_once ("../model/habitacion_model.php");

$habitaciones= new habitacion_model();
$habitaciones->setList();

session_start();
$_SESSION["habitaciones"] = $habitaciones;

header("Location: ../view/hotel.php");
?>