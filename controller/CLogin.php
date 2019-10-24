<?php 

include_once ("../model/usuario_model.php");

$login = new usuario_model();

$usuario=filter_input(INPUT_GET, 'user');
$contrasena=filter_input(INPUT_GET, 'pass');

$login->setUsuario($usuario);
$login->setContrasena($contrasena);

$resultado=$login->comprobarUser();

echo $resultado;