<?php

include_once ("../model/usuarioModel.php");

$user=new usuarioModel();

$nombre=filter_input(INPUT_GET,"nombre");
$apellido= filter_input(INPUT_GET,"apellido");
$usuario=filter_input(INPUT_GET,"usuario");
$contrasena=filter_input(INPUT_GET,"contrasena");
$admin=filter_input(INPUT_GET,"admin");

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