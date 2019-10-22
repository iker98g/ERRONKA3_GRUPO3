<?php

include_once ("../model/usuario_model.php");

$usuario=filter_input(INPUT_POST,"usuario");
$contrasena=filter_input(INPUT_POST,"contrasena");

$user=new usuario_model();
$user->setUsuario($usuario);
$user->setContrasena($contrasena);

$result = $user->findUsersAdmin();

if ($result==1) {
    header('Location: ../view/admin.php');
}else if($result==0){
    alert("No es admin");
}else {
    alert($result);
}



?>