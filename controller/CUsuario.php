<?php
include_once ("../model/usuario_model.php");

$usuarios= new usuario_model();
$usuarios->setList();

foreach ($usuarios->list as $object){
    if($object->getUsuario()==$_POST["usuario"] && $object->getContrasena()==$_POST["contrasena"]){
        session_start();       
        $_SESSION["usuario"] = $object->getUsuario();
        
        if($object->getAdmin()==1){
            header("Location: CAdmin.php");
        }else {
            header("Location: CHotel.php");
        }
    }
}
?>