<?php

include_once ("../model/usuario_model.php");

$user=new usuario_model();

$idUsuario=filter_input(INPUT_GET,"idUsuario");
$nombre=filter_input(INPUT_GET,"nombre");
$apellido= filter_input(INPUT_GET,"apellido");
$usuario=filter_input(INPUT_GET,"usuario");
$admin=filter_input(INPUT_GET,"admin");

if ($idUsuario!=null)
{
    $user->setIdUsuario($idUsuario);
    
    if ($nombre!=null)
    {
        $user->setNombre($nombre);
    }
    
    if ($apellido!=null)
    {
        $user->setApellido($apellido);
    }
    
    if ($usuario!=null)
    {
        $user->setUsuario($usuario);
    }
    
    if ($admin!=null)
    {
        $user->setAdmin($admin);
    }
    
    $resultado=$user->update();
} else{
    $resultado="No se ha pasado id";
}
echo $resultado;


?>