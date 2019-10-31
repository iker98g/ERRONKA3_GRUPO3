<?php

include_once ("../model/usuarioModel.php");

$user=new usuarioModel();

$nombre=filter_input(INPUT_POST,"nombre");
$apellido= filter_input(INPUT_POST,"apellido");
$usuario=filter_input(INPUT_POST,"usuario");
$contrasena=filter_input(INPUT_POST,"contrasena");
$admin=filter_input(INPUT_POST,"admin");

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
    
    if ($contrasena!=null)
    {
        $user->setContrasena($contrasena);
    }
    
    if ($admin!=null)
    {
        $user->setAdmin($admin);
    }
    
    $resultado=$user->insert();

echo $resultado;

?>