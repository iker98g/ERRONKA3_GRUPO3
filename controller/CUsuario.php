<?php
session_start();
include_once ("../model/usuario_model.php");
include_once ("../model/habitacion_model.php");

$usuario= new usuario_model();
$usuario->setList();

$usuarios = $usuario->getList();

foreach ($usuarios as $object){
    if($object->getUsuario()==$_GET["user"] && $object->getContrasena()==$_GET["pass"]){
               
        $_SESSION["usuario"] = $object->getUsuario();
        $_SESSION["id"] = $object->getIdUsuario();
        
        if($object->getAdmin()==1){
            echo "http://tres.fpz1920.com/view/admin.php";
        }else {
            $habitaciones= new habitacion_model();
            $habitaciones->setList();
            
            $_SESSION["habitaciones"] = $habitaciones->getList();
            
            echo "http://tres.fpz1920.com/view/hotel.php";
        }
    }
}
?>