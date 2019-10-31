<?php 

include_once ("../model/usuarioModel.php");

$login = new usuarioModel();

$usuario=filter_input(INPUT_GET, 'user');
$contrasena=filter_input(INPUT_GET, 'pass');

$login->setUsuario($usuario);
$login->setContrasena($contrasena);

$resultado=$login->comprobarUser();

echo $resultado;