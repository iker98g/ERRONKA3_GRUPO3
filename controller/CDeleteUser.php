<?php

include_once ("../model/usuario_model.php");

$user=new usuario_model();

$idUsuario=filter_input(INPUT_GET,"idUsuario");

if ($idUsuario!=null)
{   
    $user->setIdUsuario($idUsuario);
    $resultado=$user->delete();
} else{
    $resultado="No se ha pasado id";
}
echo $resultado;


?>