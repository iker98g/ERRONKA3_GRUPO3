<?php
include_once ("../model/usuarioModel.php");

$user=new usuarioModel();

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