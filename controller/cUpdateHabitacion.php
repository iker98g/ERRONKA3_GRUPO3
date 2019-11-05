<?php
include_once ("../model/habitacionModel.php");

$room=new habitacionModel();

$idHabitacion=filter_input(INPUT_GET,"idHabitacion");
$tipo=filter_input(INPUT_GET,"tipo");
$imagen= filter_input(INPUT_GET,"imagen");
$precio=filter_input(INPUT_GET,"precio");


if ($idHabitacion!=null)
{
    $room->setIdHabitacion($idHabitacion);
    
    if ($tipo!=null)
    {
        $room->setTipo($tipo);
    }
    
    if ($imagen!=null)
    {
        $room->setImagen($imagen);
    }
    
    if ($precio!=null)
    {
        $room->setPrecio($precio);
    }
    
    $resultado=$room->update();
} else{
    $resultado="No se ha pasado id";
}
echo $resultado;
?>