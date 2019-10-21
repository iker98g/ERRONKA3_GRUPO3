<?php

include_once ("../model/usuario_model.php");

$user= new usuario_model();
$user->setList();

$listaUsersJSON=$user->getListJsonString(); //attributes PRIVATEs or PROTECTED

echo $listaUsersJSON;

unset ($user);

?>