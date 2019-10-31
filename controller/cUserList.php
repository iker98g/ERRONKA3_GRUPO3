<?php

include_once ("../model/usuarioModel.php");

$user= new usuarioModel();
$user->setList();

$listaUsersJSON=$user->getListJsonString(); //attributes PRIVATEs or PROTECTED

echo $listaUsersJSON;

unset ($user);

?>