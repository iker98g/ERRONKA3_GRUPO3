<?php

include_once ("../model/usuario_model.php");

$user= new usuario_model();
$user->setList();

foreach ($user->list as $object){
    if($object->getUsuario()==$_POST["usuario"] && $object->getContrasena()==$_POST["contrasena"]){
        session_start();       
        $_SESSION["usuario"] = $_POST["usuario"];
        
        if($object->getAdmin()==1){
            header("Location: CAdmin.php");
        }else {
            header("Location: CHotel.php");
        }
    }
}
?>